<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Documentacion\Estructura;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Shared\Header\HeaderComponent;
use Osumi\OsumiFramework\App\Component\Shared\Nav\NavComponent;

class EstructuraComponent extends OComponent {
	public ?HeaderComponent $header = null;
	public ?NavComponent    $nav    = null;

	public function __construct() {
		parent::__construct();
		$this->header = new HeaderComponent();
		$this->nav    = new NavComponent(['title' => 'Estructura']);
	}

	/**
   * Página de documentación para estructura
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req): void {}
}
