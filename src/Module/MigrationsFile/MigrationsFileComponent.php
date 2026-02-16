<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\MigrationsFile;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Header\HeaderComponent;
use Osumi\OsumiFramework\App\Component\Footer\FooterComponent;
use Osumi\OsumiFramework\App\Component\Nav\NavComponent;
use Osumi\OsumiFramework\App\Component\Markdown\MarkdownComponent;

class MigrationsFileComponent extends OComponent {
	public ?HeaderComponent   $header  = null;
	public ?FooterComponent   $footer  = null;
	public ?NavComponent      $nav     = null;
	public ?MarkdownComponent $content = null;

	public function __construct() {
		parent::__construct();
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
		$lang = $req->getParamString('lang');
		$file = $req->getParamString('file');
		if (is_null($lang)) {
			$lang = 'es';
		}
		$this->nav->lang = $lang;
		$this->nav->selected = $file;
		$this->content->lang = $lang;

    $filename = preg_replace('/(?<=\d)-(?=\d)/', '.', $file);
		$file_md = $this->getConfig()->getDir('ofw_base').'docs/'.$lang.'/migrations/'.$filename.'.md';
		if (file_exists($file_md)) {
			// Contenido de la página
			$this->content->file = $file_md;
			// Enlaces de navegación a otros idiomas
			$this->header->es_link = 'https://framework.osumi.dev/es/migrations/'.$file;
			$this->header->en_link = 'https://framework.osumi.dev/en/migrations/'.$file;
			$this->header->eu_link = 'https://framework.osumi.dev/eu/migrations/'.$file;
			// Footer
			$this->footer->lang = $lang;
			$this->footer->link = 'https://framework.osumi.dev/md/'.$lang.'/migrations/'.$file;
			// Canonicals
			$this->getConfig()->addHeadElement([
				'item' => 'link',
				'attributes' => [
					'rel' => 'canonical',
					'href' => 'https://framework.osumi.dev/'.$lang.'/migrations/'.$file
				]
			]);
			$this->getConfig()->addHeadElement([
				'item' => 'link',
				'attributes' => [
					'rel' => 'alternate',
					'hreflang' => 'es',
					'href' => 'https://framework.osumi.dev/es/migrations/'.$file
				]
			]);
			$this->getConfig()->addHeadElement([
				'item' => 'link',
				'attributes' => [
					'rel' => 'alternate',
					'hreflang' => 'en',
					'href' => 'https://framework.osumi.dev/en/migrations/'.$file
				]
			]);
			$this->getConfig()->addHeadElement([
				'item' => 'link',
				'attributes' => [
					'rel' => 'alternate',
					'hreflang' => 'eu',
					'href' => 'https://framework.osumi.dev/eu/migrations/'.$file
				]
			]);
		}
		else {
			$this->footer->lang = '';
			http_response_code(404);
			header('X-Robots-Tag: noindex');
		}
	}
}
