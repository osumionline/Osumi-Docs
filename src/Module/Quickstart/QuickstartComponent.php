<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Quickstart;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Shared\Header\HeaderComponent;
use Osumi\OsumiFramework\App\Component\Shared\Nav\NavComponent;
use Osumi\OsumiFramework\App\Component\Shared\Markdown\MarkdownComponent;

class QuickstartComponent extends OComponent {
	public ?HeaderComponent   $header  = null;
	public ?NavComponent      $nav     = null;
	public ?MarkdownComponent $content = null;

	public function __construct() {
		parent::__construct();
		$this->header  = new HeaderComponent();
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
			$this->content->file = $file;
		}
	}
}
