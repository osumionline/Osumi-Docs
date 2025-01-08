<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Documentacion\Componentes;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Shared\Header\HeaderComponent;
use Osumi\OsumiFramework\App\Component\Shared\Nav\NavComponent;
use Osumi\OsumiFramework\App\Component\Shared\Tabs\TabsComponent;
use Osumi\OsumiFramework\App\Component\Documentacion\Componentes\ComponentesDescripcion\ComponentesDescripcionComponent;
use Osumi\OsumiFramework\App\Component\Documentacion\Componentes\ComponentesAPI\ComponentesAPIComponent;
use Osumi\OsumiFramework\App\Component\Documentacion\Componentes\ComponentesEjemplos\ComponentesEjemplosComponent;

class ComponentesComponent extends OComponent {
	public ?HeaderComponent $header = null;
	public ?NavComponent    $nav    = null;
	public ?TabsComponent   $tabs   = null;

	public function __construct() {
		parent::__construct();
		$this->header = new HeaderComponent();
		$this->nav    = new NavComponent(['title' => 'Componentes']);
		$this->tabs   = new TabsComponent(['tabs' => [
			['label' => 'Descripción', 'content' => new ComponentesDescripcionComponent()],
			['label' => 'API',         'content' => new ComponentesAPIComponent()],
			['label' => 'Ejemplos',    'content' => new ComponentesEjemplosComponent()]
		]]);
	}

	/**
	 * Página de documentación para componentes
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {}
}
