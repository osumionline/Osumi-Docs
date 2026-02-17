<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Task;

use Osumi\OsumiFramework\Core\OTask;

class BuildDocsIndexTask extends OTask {
  public function __toString() {
    return "buildDocsIndex: Builds /public/search-index.json from /docs/* with correct URL mapping and deduped headings";
  }

  public function run(array $options = []): void {
    $config    = $this->getConfig();
    $baseDir   = $config->getDir('ofw_base');
    $docsDir   = $baseDir . 'docs/';
    $publicDir = $config->getDir('public');
    $baseUrl   = rtrim($config->getUrl('base'), '/');

    $langs = ['en','es','eu'];
    $index = [];

    foreach ($langs as $lang) {
      $langDir = $docsDir . $lang;
      if (!is_dir($langDir)) {
        continue;
      }

      $it = new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator($langDir, \FilesystemIterator::SKIP_DOTS)
      );

      foreach ($it as $file) {
        if (!$file->isFile() || $file->getExtension() !== 'md') {
          continue;
        }

        $path = $file->getRealPath();
        $relative      = str_replace($docsDir, '', $path);       // ej: en/concepts/routing.md
        $relativeNoExt = str_replace('.md', '', $relative);      // ej: en/concepts/routing

        // Ignorar /docs/<lang>/index.md
        if (preg_match('#^'.$lang.'/index$#', $relativeNoExt)) {
          continue;
        }

        // Partes: ["en","concepts","routing"]
        $parts = explode('/', $relativeNoExt);
        array_shift($parts); // quitar el lang

        $isInRoot    = count($parts) === 1;
        $isMigration = (count($parts) > 1 && $parts[0] === 'migrations');

        // Slug final según reglas
        if ($isMigration) {
          // migrations: reemplazar puntos del nombre
          $slug = "migrations/" . str_replace('.', '-', $parts[1]);
        } else {
          $slug = implode('/', $parts);
        }

        // URL final según reglas
        if ($isMigration) {
          // migrations → NO llevan /docs/
          $url = $baseUrl . '/' . $lang . '/' . $slug;
        } else if ($isInRoot) {
          // raíz → NO llevan /docs/
          $url = $baseUrl . '/' . $lang . '/' . $slug;
        } else {
          // subcarpetas normales → SI llevan /docs/
          $url = $baseUrl . '/docs/' . $lang . '/' . $slug;
        }

        // --- PARSEO DEL CONTENIDO ---
        $content = file_get_contents($path) ?: '';

        // Título (# ...)
        preg_match('/^#\s+(.+)$/m', $content, $mTitle);
        $title = $mTitle[1] ?? basename($path, '.md');

        // Extracto: primer párrafo no vacío que no sea título
        $excerpt = '';
        foreach (preg_split("/\R/", $content) as $line) {
          $trim = trim($line);
          if ($trim === '' || str_starts_with($trim, '#')) {
            continue;
          }
          $excerpt = mb_substr($trim, 0, 240);
          break;
        }

        // Headings (## y ###) —> normalizar y deduplicar (case-insensitive, orden estable)
        preg_match_all('/^##\s+(.+)$/m', $content, $h2);
        preg_match_all('/^###\s+(.+)$/m', $content, $h3);
        $rawHeadings = array_merge($h2[1] ?? [], $h3[1] ?? []);

        $headings = [];
        $seen = []; // set case-insensitive
        foreach ($rawHeadings as $h) {
          // Normalización ligera:
          // - trim
          // - colapso de espacios múltiples
          // - quitar backticks o comillas invertidas habituales en MD
          $norm = trim($h);
          $norm = preg_replace('/\s+/u', ' ', $norm);
          $norm = str_replace('`', '', $norm);

          $key = mb_strtolower($norm);
          if ($norm !== '' && !isset($seen[$key])) {
            $headings[] = $norm;   // mantener la primera ocurrencia con su casing original
            $seen[$key] = true;
          }
        }

        // LASTMOD
        $lastmod = date('Y-m-d', filemtime($path));

        // Añadir entrada al índice
        $index[] = [
          'lang'     => $lang,
          'title'    => $title,
          'url'      => $url,
          'excerpt'  => $excerpt,
          'headings' => $headings,
          'lastmod'  => $lastmod
        ];
      }
    }

    // Escribir fichero final
    $out = $publicDir . 'search-index.json';
    file_put_contents($out, json_encode($index, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    echo "Docs index generated at: $out\n";
  }
}
