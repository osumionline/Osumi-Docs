<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Quickstart;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Header\HeaderComponent;
use Osumi\OsumiFramework\App\Component\Footer\FooterComponent;
use Osumi\OsumiFramework\App\Component\Nav\NavComponent;
use Osumi\OsumiFramework\App\Component\Markdown\MarkdownComponent;

class QuickstartComponent extends OComponent {
	public ?HeaderComponent   $header  = null;
	public ?FooterComponent   $footer  = null;
	public ?NavComponent      $nav     = null;
	public ?MarkdownComponent $content = null;

	public function __construct() {
		parent::__construct();
		$this->header  = new HeaderComponent();
		$this->footer  = new FooterComponent();
		$this->nav     = new NavComponent(['selected' => 'quickstart']);
		$this->content = new MarkdownComponent();
	}

	/**
	 * Página de "cómo empezar"
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$lang = $req->getParamString('lang');
		if (is_null($lang)) {
			$lang = 'es';
		}
		$this->nav->lang = $lang;
		$this->content->lang = $lang;

		$file = $this->getConfig()->getDir('ofw_base').'docs/'.$lang.'/quickstart.md';
		if (file_exists($file)) {
			// Contenido de la página
			$this->content->file = $file;
			// Enlaces de navegación a otros idiomas
			$this->header->es_link = 'https://framework.osumi.dev/es/quickstart';
			$this->header->en_link = 'https://framework.osumi.dev/en/quickstart';
			$this->header->eu_link = 'https://framework.osumi.dev/eu/quickstart';
			// Footer
			$this->footer->lang = $lang;
			$this->footer->link = 'https://framework.osumi.dev/md/'.$lang.'/quickstart';
			// Canonicals
			$this->getConfig()->addHeadElement([
				'item' => 'link',
				'attributes' => [
					'rel' => 'canonical',
					'href' => 'https://framework.osumi.dev/'.$lang.'/quickstart'
				]
			]);
			$this->getConfig()->addHeadElement([
				'item' => 'link',
				'attributes' => [
					'rel' => 'alternate',
					'hreflang' => 'es',
					'href' => 'https://framework.osumi.dev/es/quickstart'
				]
			]);
			$this->getConfig()->addHeadElement([
				'item' => 'link',
				'attributes' => [
					'rel' => 'alternate',
					'hreflang' => 'en',
					'href' => 'https://framework.osumi.dev/en/quickstart'
				]
			]);
			$this->getConfig()->addHeadElement([
				'item' => 'link',
				'attributes' => [
					'rel' => 'alternate',
					'hreflang' => 'eu',
					'href' => 'https://framework.osumi.dev/eu/quickstart'
				]
			]);
			$this->getConfig()->addHeadElement([
				'item' => 'link',
				'attributes' => [
					'rel' => 'alternate',
					'hreflang' => 'x-default',
					'href' => 'https://framework.osumi.dev/es/quickstart'
				]
			]);
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
