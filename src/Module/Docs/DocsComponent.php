<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Docs;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Header\HeaderComponent;
use Osumi\OsumiFramework\App\Component\Nav\NavComponent;
use Osumi\OsumiFramework\App\Component\Markdown\MarkdownComponent;

class DocsComponent extends OComponent {
	public ?HeaderComponent   $header  = null;
	public ?NavComponent      $nav     = null;
	public ?MarkdownComponent $content = null;

	public function __construct() {
		parent::__construct();
		$this->header  = new HeaderComponent();
		$this->nav     = new NavComponent();
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
		$folder = $req->getParamString('folder');
		$file = $req->getParamString('file');
		if (is_null($lang)) {
			$lang = 'es';
		}
		$this->nav->lang = $lang;
		$this->nav->selected = $file;
		$this->content->lang = $lang;

		$file_md = $this->getConfig()->getDir('ofw_base').'docs/'.$lang.'/'.$folder.'/'.$file.'.md';
		if (file_exists($file_md)) {
			$this->content->file = $file_md;
			$this->getConfig()->addHeadElement([
				'item' => 'link',
				'attributes' => [
					'rel' => 'canonical',
					'href' => 'https://framework.osumi.dev/docs/'.$lang.'/'.$folder.'/'.$file
				]
			]);
		}
	}
}
