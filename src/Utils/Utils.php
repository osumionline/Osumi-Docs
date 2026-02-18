<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Utils;

use Osumi\OsumiFramework\Core\OConfig;

class Utils {
  /**
   * Genera la URL canónica de un documento de /docs aplicando las reglas:
   * - Ignora /docs/<lang>/index.md
   * - Raíz (p.ej. /docs/en/quickstart.md)  -> /en/quickstart
   * - Subcarpetas normales                 -> /docs/<lang>/<slug>
   * - Migrations (/docs/en/migrations/X)  -> /en/migrations/<X (puntos->guiones)>
   *
   * @param OConfig $cfg Configuración de la aplicación
   * @param string $absoluteMdPath Ruta absoluta o relativa al archivo .md
   * @param string $lang            Idioma 'en'|'es'|'eu'
   * @return string URL canónica ABSOLUTA (incluye base_url)
   */
  public function buildCanonicalFromPath(OConfig $cfg, string $absoluteMdPath, string $lang): string {
    $baseUrl = $cfg->getUrl('base');         // ej: https://framework.osumi.dev
    $docsDir = rtrim($cfg->getDir('ofw_base'), '/').'/docs/'; // ej: /var/www/.../docs/

    // Normalizar a ruta relativa desde /docs
    $path = $absoluteMdPath;
    if (str_starts_with($path, $docsDir)) {
      $path = substr($path, strlen($docsDir));           // ej: en/concepts/routing.md
    }
    $pathNoExt = preg_replace('/\.md$/i', '', $path);     // ej: en/concepts/routing
    $parts = array_values(array_filter(explode('/', $pathNoExt)));

    // Validaciones mínimas
    if (count($parts) === 0) {
      // Caso raro: si no hay partes, devolvemos base del idioma
      return $baseUrl . $lang;
    }

    // /docs/<lang>/index.md -> ignorar (devuelve base del idioma por seguridad)
    if (count($parts) === 2 && $parts[0] === $lang && $parts[1] === 'index') {
      return $baseUrl . $lang;
    }

    // Quitar lang de las partes de trabajo
    if ($parts[0] === $lang) {
      array_shift($parts);
    }

    $isInRoot     = (count($parts) === 1);
    $isMigration  = (count($parts) > 1 && $parts[0] === 'migrations');

    // Slug final
    if ($isMigration) {
      // /docs/en/migrations/9.7.4-to-9.8.0.md -> /en/migrations/9-7-4-to-9-8-0
      $version = str_replace('.', '-', $parts[1] ?? '');
      $slug = 'migrations/' . $version;
    } else {
      $slug = implode('/', $parts); // quickstart, concepts/routing, ...
    }

    // Construcción final según reglas
    if ($isMigration) {
      return $baseUrl . $lang . '/' . $slug;
    }
    if ($isInRoot) {
      return $baseUrl . $lang . '/' . $slug;
    }
    return $baseUrl . 'docs/' . $lang . '/' . $slug;
  }

  /**
   * A partir de la canónica absoluta, devuelve los pathParts que usará el SeoSchemaService.
   * Ej:
   *  https://.../en/quickstart                 -> ['en','quickstart']
   *  https://.../docs/en/concepts/routing      -> ['docs','en','concepts','routing']
   *  https://.../en/migrations/9-7-4-to-9-8-0  -> ['en','migrations','9-7-4-to-9-8-0']
   *
   * @param string $canonicalUrl URL canónica ABSOLUTA
   * @return array pathParts
   */
  public function computePathPartsFromCanonical(string $canonicalUrl): array {
    $path  = parse_url($canonicalUrl, PHP_URL_PATH) ?? '/';
    $parts = array_values(array_filter(explode('/', $path))); // sin vacíos
    return $parts;
  }
}
