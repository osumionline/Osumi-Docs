<?php declare(strict_types=1);

namespace OsumiFramework\App\Module\Action;

use OsumiFramework\OFW\Routing\OModuleAction;
use OsumiFramework\OFW\Routing\OAction;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\App\Component\HeaderComponent;
use OsumiFramework\App\Component\MenuComponent;
use OsumiFramework\App\Component\FooterComponent;

#[OModuleAction(
	url: '/en/internal-functions',
	services: ['utils'],
	components: ['common/header', 'common/menu', 'common/footer']
)]
class enInternalsAction extends OAction {
	/**
	 * Página de Funciones Internas (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->getTemplate()->setTitle('Osumi Framework - Internal functions');
		$this->getTemplate()->add('header',   new HeaderComponent(['page' => 'internals', 'lang' => 'en']));
		$this->getTemplate()->add('menu',     new MenuComponent(['page' => 'internals', 'lang' => 'en']));
		$this->getTemplate()->add('footer',   new FooterComponent());
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}
}
