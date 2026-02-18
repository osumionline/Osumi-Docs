<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Layout;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\App\Service\SeoSchemaService;

class SeoLayoutComponent extends OComponent {
  public ?SeoSchemaService $seo = null;

  public array  $schemas      = [];
  public string $title        = 'Osumi Framework';
  public string $body         = '';
  public string $lang         = 'es';
  public string $desc         = '';
  public string $canonical    = '';
  public string $href_en      = '';
  public string $href_es      = '';
  public string $href_eu      = '';
  public string $href_default = '';

  public function __construct() {
    parent::__construct();
    $this->seo = inject(SeoSchemaService::class);
  }

  public function run(): void {
    if ($this->seo->getLoaded()) {
      $this->schemas = [
        $this->seo->websiteJsonLd(),
        $this->seo->organizationJsonLd(),
        $this->seo->breadcrumbJsonLd(),
        $this->seo->techArticleJsonLd()
      ];

      $this->lang      = $this->seo->getLang();
      $this->title     = $this->seo->getTitle();
      $this->desc      = $this->seo->getDescription();
      $this->canonical = $this->seo->getCanonical();

      $this->href_en = str_replace("/".$this->lang."/", "/en/", $this->canonical);
      $this->href_es = str_replace("/".$this->lang."/", "/es/", $this->canonical);
      $this->href_eu = str_replace("/".$this->lang."/", "/eu/", $this->canonical);
      $this->href_default = $this->href_en;
    }
  }
}
