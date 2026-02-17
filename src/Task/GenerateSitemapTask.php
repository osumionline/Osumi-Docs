<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Task;

use Osumi\OsumiFramework\Core\OTask;

class GenerateSitemapTask extends OTask {
  public function __toString() {
    return "generateSitemap: Generates sitemap.xml and language sitemaps with <lastmod>, pretty printed";
  }

  public function run(array $options = []): void {
    $config = $this->getConfig();

    // Directorios
    $baseDir   = $config->getDir('ofw_base');
    $docsDir   = $baseDir . 'docs/';
    $publicDir = $config->getDir('public');

    // URL base (ej: https://framework.osumi.dev/)
    $baseUrl = rtrim($config->getUrl('base'), '/');

    // Idiomas soportados
    $langs = ['en', 'es', 'eu'];

    // Datos agrupados por idioma
    $sitemap_by_lang = [
      'en' => [],
      'es' => [],
      'eu' => []
    ];

    foreach ($langs as $lang) {
      $langDir = $docsDir . $lang;

      if (!is_dir($langDir)) {
        continue;
      }

      $iterator = new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator($langDir, \FilesystemIterator::SKIP_DOTS)
      );

      foreach ($iterator as $file) {
        if (!$file->isFile() || $file->getExtension() !== 'md') {
          continue;
        }

        $fullPath = $file->getRealPath();
        $relative = str_replace($docsDir, '', $fullPath); // ej: en/concepts/routing.md
        $relativeNoExt = str_replace('.md', '', $relative);

        // === 4. Ignorar index.md ===
        if (preg_match('#^'.$lang.'/index$#', $relativeNoExt)) {
          continue;
        }

        // === Partes ===
        // ej: en/concepts/routing --> ["en","concepts","routing"]
        $parts = explode('/', $relativeNoExt);

        // remover lang
        array_shift($parts);

        $isInRoot = count($parts) === 1;
        $isMigration = (count($parts) > 1 && $parts[0] === 'migrations');

        // === Construcción del slug final ===
        if ($isMigration) {
          // ej: 9.7.4-to-9.8.0 -> 9-7-4-to-9-8-0
          $version = str_replace('.', '-', $parts[1]);
          $slug = "migrations/" . $version;
        }
        else {
          // slug normal
          $slug = implode('/', $parts);
        }

        // === Construcción final de URL según reglas ===
        if ($isMigration) {
          // 3. migrations no llevan "docs" delante
          $url = $baseUrl . '/' . $lang . '/' . $slug;
        }
        else if ($isInRoot) {
          // 1. raíz -> sin "docs"
          $url = $baseUrl . '/' . $lang . '/' . $slug;
        }
        else {
          // 2. subcarpeta normal -> sí lleva docs
          $url = $baseUrl . '/docs/' . $lang . '/' . $slug;
        }

        // === LASTMOD ===
        $lastmod = date('Y-m-d', filemtime($fullPath));

        // === Valores especiales ===
        $changefreq = $isMigration ? 'never' : 'weekly';
        $priority   = $isMigration ? '0.3'   : '0.8';

        // === Guardar resultado ===
        $sitemap_by_lang[$lang][] = [
          'loc'        => $url,
          'lastmod'    => $lastmod,
          'changefreq' => $changefreq,
          'priority'   => $priority
        ];
      }
    }

    // === Función auxiliar XML bonito ===
    $generate_xml = function(array $items, string $path) {
      $xml = new \SimpleXMLElement(
        '<?xml version="1.0" encoding="UTF-8"?>'
        . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>'
      );

      foreach ($items as $u) {
        $node = $xml->addChild('url');
        $node->addChild('loc', htmlspecialchars($u['loc'], ENT_XML1 | ENT_COMPAT));
        $node->addChild('lastmod',    $u['lastmod']);
        $node->addChild('changefreq', $u['changefreq']);
        $node->addChild('priority',   $u['priority']);
      }

      $dom = new \DOMDocument('1.0', 'UTF-8');
      $dom->preserveWhiteSpace = false;
      $dom->formatOutput = true;
      $dom->loadXML($xml->asXML());
      $dom->save($path);
    };

    // === Sitemap por idioma ===
    foreach ($langs as $lang) {
      $path = $publicDir . "sitemap-{$lang}.xml";
      $generate_xml($sitemap_by_lang[$lang], $path);
      echo "Generated: $path\n";
    }

    // === Sitemap index (prueba) ===
    $indexPath = $publicDir . 'sitemap_prueba.xml';

    $indexXml = new \SimpleXMLElement(
      '<?xml version="1.0" encoding="UTF-8"?>'
      . '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></sitemapindex>'
    );

    foreach ($langs as $lang) {
      $node = $indexXml->addChild('sitemap');
      $node->addChild('loc', $baseUrl . "/sitemap-{$lang}.xml");
      $node->addChild('lastmod', date('Y-m-d'));
    }

    $dom = new \DOMDocument('1.0', 'UTF-8');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($indexXml->asXML());
    $dom->save($indexPath);

    echo "Generated index: $indexPath\n";
  }
}
