<?php declare(strict_types=1);

namespace OsumiFramework\App\Module\Action;

use OsumiFramework\OFW\Routing\OModuleAction;
use OsumiFramework\OFW\Routing\OAction;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\OFW\Tools\OTools;
use OsumiFramework\App\Component\HeaderComponent;
use OsumiFramework\App\Component\MenuComponent;
use OsumiFramework\App\Component\FooterComponent;

#[OModuleAction(
	url: '/es/instalacion',
	services: ['utils'],
	components: ['common/header', 'common/menu', 'common/footer']
)]
class esInstallationAction extends OAction {
	/**
	 * Página de Instalación
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->getTemplate()->setTitle('Osumi Framework - Instalación');
		$this->getTemplate()->add('header',   new HeaderComponent(['page' => 'installation', 'lang' => 'es']));
		$this->getTemplate()->add('menu',     new MenuComponent(['page' => 'installation', 'lang' => 'es']));
		$this->getTemplate()->add('footer',   new FooterComponent());
		$this->getTemplate()->add('version',  OTools::getVersion());
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}
}
