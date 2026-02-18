<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Service;

use Osumi\OsumiFramework\Core\OService;

class SeoSchemaService extends OService {
  // ============================================================
  // INTERNAL SEO DATA (filled by DocsComponent)
  // ============================================================
  private bool   $loaded = false;
  private string $title = '';
  private string $description = '';
  private string $canonical = '';
  private string $lang = 'en';
  private string $lastmod = '';
  private array  $headings = [];
  private array  $pathParts = [];   // for breadcrumbs


  // ============================================================
  // SETTERS (called by DocsComponent)
  // ============================================================
  public function setLoaded(bool $l): void { $this->loaded = $l; }
  public function setTitle(string $t): void { $this->title = $t; }
  public function setDescription(string $d): void {
    if (strlen($d) > 150) {
      $this->description = mb_substr($d, 0, 145, "UTF-8") . '...';
    }
    else {
      $this->description = $d;
    }
  }
  public function setCanonical(string $c): void { $this->canonical = $c; }
  public function setLang(string $l): void { $this->lang = $l; }
  public function setLastmod(string $lm): void { $this->lastmod = $lm; }
  public function setHeadings(array $h): void { $this->headings = $h; }

  /**
   * Save the URL path parts for breadcrumbs.
   * Example: ["docs","en","concepts","routing"]
   */
  public function setPathParts(array $pp): void {
    $this->pathParts = $pp;
  }


  // ============================================================
  // GETTERS (read by Layout)
  // ============================================================
  public function getLoaded(): bool { return $this->loaded; }
  public function getTitle(): string { return $this->title; }
  public function getDescription(): string { return $this->description; }
  public function getCanonical(): string { return $this->canonical; }
  public function getLang(): string { return $this->lang; }
  public function getLastmod(): string { return $this->lastmod; }
  public function getHeadings(): array { return $this->headings; }


  // ============================================================
  // JSON-LD: WebSite
  // ============================================================
  public function websiteJsonLd(): array {
    $cfg  = $this->getConfig();
    $name = $cfg->getName() ?? 'Osumi Framework';
    $url  = $cfg->getUrl('base');

    return [
      '@context' => 'https://schema.org',
      '@type'    => 'WebSite',
      'name'     => $name,
      'url'      => $url,
    ];
  }


  // ============================================================
  // JSON-LD: Organization
  // ============================================================
  public function organizationJsonLd(): array {
    $cfg = $this->getConfig();
    $base = $cfg->getUrl('base');

    return [
      '@context' => 'https://schema.org',
      '@type'    => 'Organization',
      'name'     => $cfg->getName() ?? 'Osumi Framework',
      'url'      => $base,
      'logo'     => $base . 'img/osumi.png',
      'sameAs'   => array_values(array_filter([
        $cfg->getExtra('twitter') ?? null,
        $cfg->getExtra('github')  ?? null,
        $cfg->getExtra('website') ?? null
      ]))
    ];
  }


  // ============================================================
  // JSON-LD: BreadcrumbList
  // Uses $this->pathParts
  // ============================================================
  public function breadcrumbJsonLd(): array {
    $cfg = $this->getConfig();
    $base = $cfg->getUrl('base');

    $itemList = [];
    $acc = '';
    $pos = 1;

    foreach ($this->pathParts as $p) {
      $acc .= '/' . $p;

      $itemList[] = [
        '@type'    => 'ListItem',
        'position' => $pos++,
        'name'     => $this->humanize($p),
        'item'     => $base . ltrim($acc, '/')
      ];
    }

    return [
      '@context'        => 'https://schema.org',
      '@type'           => 'BreadcrumbList',
      'itemListElement' => $itemList
    ];
  }


  // ============================================================
  // JSON-LD: TechArticle (uses stored properties)
  // ============================================================
  public function techArticleJsonLd(): array {
    $cfg = $this->getConfig();
    $publisher = $cfg->getName() ?? 'Osumi Framework';
    $base      = $cfg->getUrl('base');

    return [
      '@context'     => 'https://schema.org',
      '@type'        => 'TechArticle',

      'headline'     => $this->title,
      'description'  => $this->description,
      'inLanguage'   => $this->lang,
      'url'          => $this->canonical,
      'dateModified' => $this->lastmod,

      'publisher' => [
        '@type' => 'Organization',
        'name'  => $publisher,
        'url'   => $base
      ],

      'author' => [
        '@type' => 'Person',
        'name'  => 'Iñigo Gorosabel'
      ]
    ];
  }


  // ============================================================
  // Helper for breadcrumbs: convert slug to readable
  // ============================================================
  private function humanize(string $slug): string {
    if (in_array($slug, ['en','es','eu'])) {
      return strtoupper($slug);
    }
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
