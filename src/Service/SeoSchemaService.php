<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Service;

use Osumi\OsumiFramework\Core\OService;

class SeoSchemaService extends OService {
  /** WebSite + (opcional) SearchAction */
  public function websiteJsonLd(): array {
    $cfg = $this->getConfig();
    $name = $cfg->getName() ?? 'Osumi Framework';
    $url  = rtrim($this->getBaseUrl(), '/');

    $webSite = [
      '@context' => 'https://schema.org',
      '@type'    => 'WebSite',
      'name'     => $name,
      'url'      => $url,
    ];

    // Si tienes buscador en /search?q=
    $webSite['potentialAction'] = [
      '@type'       => 'SearchAction',
      'target'      => $url . '/search?q={search_term_string}',
      'query-input' => 'required name=search_term_string'
    ];

    return $webSite;
  }

  /** Organization (tu marca / autoría del framework) */
  public function organizationJsonLd(): array {
    $cfg = $this->getConfig();
    $url = rtrim($this->getBaseUrl(), '/');

    $org = [
      '@context'  => 'https://schema.org',
      '@type'     => 'Organization',
      'name'      => $cfg->getName() ?? 'Osumi Framework',
      'url'       => $url,
      // Logo opcional si lo tienes en public/img/logo.png:
      'logo'      => $url . '/img/logo.png',
      // Rellenar con tus redes si quieres
      'sameAs'    => array_values(array_filter([
        $cfg->getExtra('twitter') ?? null,
        $cfg->getExtra('github')  ?? 'https://github.com/osumionline/framework',
        $cfg->getExtra('website') ?? null
      ]))
    ];

    return $org;
  }

  /** Breadcrumbs a partir de /{lang}/docs/... */
  public function breadcrumbJsonLd(string $fullUrl, string $lang): array {
    $url = rtrim($this->getBaseUrl(), '/');
    $path = parse_url($fullUrl, PHP_URL_PATH) ?? '/';
    $parts = array_values(array_filter(explode('/', $path))); // ['en','docs','concepts','routing']

    // Construir items acumulando la ruta
    $itemList = [];
    $acc = '';
    $pos = 1;

    foreach ($parts as $p) {
      $acc .= '/' . $p;
      $itemList[] = [
        '@type'    => 'ListItem',
        'position' => $pos++,
        'name'     => $this->humanize($p),
        'item'     => $url . $acc
      ];
    }

    return [
      '@context'        => 'https://schema.org',
      '@type'           => 'BreadcrumbList',
      'itemListElement' => $itemList
    ];
  }

  /**
   * TechArticle para páginas de doc.
   * $title: título de la página (h1)
   * $description: primer párrafo o metadesc
   * $lang: 'en'|'es'|'eu'
   * $url: url canónica de la página
   * $lastmod: Y-m-d (de filemtime del .md)
   */
  public function techArticleJsonLd(
    string $title, string $description, string $lang, string $url, string $lastmod
  ): array {
    $cfg = $this->getConfig();
    $publisherName = $cfg->getName() ?? 'Osumi Framework';
    $publisherUrl  = rtrim($this->getBaseUrl(), '/');

    return [
      '@context'     => 'https://schema.org',
      '@type'        => 'TechArticle',
      'headline'     => $title,
      'inLanguage'   => $lang,
      'description'  => $description,
      'url'          => $url,
      'dateModified' => $lastmod, // YYYY-MM-DD
      'publisher'    => [
        '@type' => 'Organization',
        'name'  => $publisherName,
        'url'   => $publisherUrl
      ],
      // Opcional: autor (si quieres dejarte a ti)
      'author'       => [
        '@type' => 'Person',
        'name'  => 'Iñigo Gorosabel'
      ]
    ];
  }

  /** Helper: base_url desde extra o derivada */
  private function getBaseUrl(): string {
    $cfg = $this->getConfig();
    $base = $cfg->getExtra('base_url') ?? '';
    return $base !== '' ? rtrim($base, '/') : '';
  }

  /** Helper: convierte 'model-components' -> 'Model Components', 'es' -> 'es' */
  private function humanize(string $slug): string {
    if (in_array($slug, ['en','es','eu'])) return strtoupper($slug);
    $slug = str_replace(['-','_'], ' ', $slug);
    return ucwords($slug);
  }
}

/*
< ?php
  / * * @var SeoSchemaService $seo * /
  use Osumi\OsumiFramework\App\Service\SeoSchemaService;
  $seo = inject(SeoSchemaService::class);

  // Datos de la página (prepáralos en tu componente antes del render):
  // $pageTitle, $pageDescription, $lang, $canonicalUrl, $lastmod

  $schemas = [
    $seo->websiteJsonLd(),
    $seo->organizationJsonLd(),
    $seo->breadcrumbJsonLd($canonicalUrl, $lang),
    $seo->techArticleJsonLd($pageTitle, $pageDescription, $lang, $canonicalUrl, $lastmod)
  ];
? >
<head>
  <!-- ... tus metas, título, etc. ... -->

  <?php foreach ($schemas as $schema): ?>
    <script type="application/ld+json">
      <?= json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
    </script>
  <?php endforeach; ?>
</head>

Cómo llenar $pageTitle, $pageDescription, $lang, $canonicalUrl, $lastmod

$lang: ya lo tienes por ruta o por selección de idioma.
$canonicalUrl: $baseUrl . $_SERVER['REQUEST_URI'] (normaliza slashes).
$lastmod: con filemtime($mdAbsolutePath) → date('Y-m-d', filemtime(...)).
$pageTitle: primera línea del Markdown que empiece por # .
$pageDescription: primer párrafo no vacío tras el H1 (como hicimos en el índice de búsqueda).

Puedes usar la misma lógica que el BuildDocsIndexTask para no duplicar parsing:

O bien centralizas esa lógica en un DocParserService que devuelva: title, description, headings, lastmod.
*/
