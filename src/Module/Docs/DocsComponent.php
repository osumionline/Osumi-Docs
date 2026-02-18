<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Docs;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Service\SeoSchemaService;
use Osumi\OsumiFramework\App\Component\Header\HeaderComponent;
use Osumi\OsumiFramework\App\Component\Footer\FooterComponent;
use Osumi\OsumiFramework\App\Component\Nav\NavComponent;
use Osumi\OsumiFramework\App\Component\Markdown\MarkdownComponent;
use Osumi\OsumiFramework\App\Utils\Utils;

class DocsComponent extends OComponent {
	private ?SeoSchemaService  $seo     = null;
	public  ?HeaderComponent   $header  = null;
	public  ?FooterComponent   $footer  = null;
	public  ?NavComponent      $nav     = null;
	public  ?MarkdownComponent $content = null;

	public function __construct() {
		parent::__construct();
		$this->seo     = inject(SeoSchemaService::class);
		$this->header  = new HeaderComponent();
		$this->footer  = new FooterComponent();
		$this->nav     = new NavComponent();
		$this->content = new MarkdownComponent();
	}

	/**
	 * Página de documentación
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$lang   = $req->getParamString('lang');
		$folder = $req->getParamString('folder');
		$file   = $req->getParamString('file');
		if (is_null($lang)) {
			$lang = 'es';
		}
		$this->nav->lang = $lang;
		$this->nav->selected = $file;
		$this->content->lang = $lang;

		$file_md = $this->getConfig()->getDir('ofw_base').'docs/'.$lang.'/'.$folder.'/'.$file.'.md';
		if (file_exists($file_md)) {
			$utils = new Utils();

			// Contenido de la página
			$this->content->file = $file_md;
			$this->content->loadFile();

			// Añado contenido al SeoSchemaService
			$canonical = $utils->buildCanonicalFromPath($this->getConfig(), $this->content->file, $this->content->lang);
			$pathParts = $utils->computePathPartsFromCanonical($canonical);

			$this->seo->setTitle($this->content->title);
			$this->seo->setDescription($this->content->description);
			$this->seo->setLang($this->content->lang);
			$this->seo->setCanonical($canonical);
			$this->seo->setLastmod($this->content->lastmod);
			$this->seo->setHeadings($this->content->headings);
			$this->seo->setPathParts($pathParts);
			$this->seo->setLoaded(true);

			// Enlaces de navegación a otros idiomas
			$this->header->es_link = 'https://framework.osumi.dev/docs/es/'.$folder.'/'.$file;
			$this->header->en_link = 'https://framework.osumi.dev/docs/en/'.$folder.'/'.$file;
			$this->header->eu_link = 'https://framework.osumi.dev/docs/eu/'.$folder.'/'.$file;

			// Footer
			$this->footer->lang = $lang;
			$this->footer->link = 'https://framework.osumi.dev/md/'.$lang.'/'.$folder.'/'.$file;

			// Añado librerías PrismJS
			$this->addCss('/css/prism-toolbar.min.css');
			$this->addCss('/css/prism-tomorrow.min.css');
			$this->addJs('/js/prism.min.js');
			$this->addJs('/js/prism-autoloader.min.js');
			$this->addJs('/js/prism-toolbar.min.js');
			$this->addJs('/js/prism-copy-to-clipboard.min.js');
			$this->addJs('/js/prism-show-language.min.js');
			$this->addJs('/js/prism-languages.js');
		}
		else {
			$this->footer->lang = '';
			http_response_code(404);
			header('X-Robots-Tag: noindex');
		}
	}
}
