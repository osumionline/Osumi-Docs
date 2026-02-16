<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Start;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Header\HeaderComponent;
use Osumi\OsumiFramework\App\Component\Nav\NavComponent;

class StartComponent extends OComponent {
	public ?HeaderComponent $header = null;
	public ?NavComponent    $nav    = null;
	public ?string          $lang   = 'es';

	public function __construct() {
		parent::__construct();
		$this->header = new HeaderComponent();
		$this->nav    = new NavComponent();
	}

	/**
	 * Start page
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->lang = $req->getParamString('lang');
		if (is_null($this->lang)) {
			$this->lang = 'es';
		}
		$this->nav->lang = $this->lang;
		// Enlaces de navegación a otros idiomas
		$this->header->es_link = 'https://framework.osumi.dev/';
		$this->header->en_link = 'https://framework.osumi.dev/en';
		$this->header->eu_link = 'https://framework.osumi.dev/eu';
	}
}
