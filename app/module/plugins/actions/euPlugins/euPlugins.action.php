<?php declare(strict_types=1);

namespace OsumiFramework\App\Module\Action;

use OsumiFramework\OFW\Routing\OModuleAction;
use OsumiFramework\OFW\Routing\OAction;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\OFW\Tools\OTools;
use OsumiFramework\App\Component\Common\HeaderComponent;
use OsumiFramework\App\Component\Common\MenuComponent;
use OsumiFramework\App\Component\Common\FooterComponent;

#[OModuleAction(
	url: '/eu/pluginak',
	services: ['utils']
)]
class euPluginsAction extends OAction {
	/**
	 * Página de Plugins (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->getTemplate()->setTitle('Osumi Framework - Pluginak');
		$this->getTemplate()->add('header',   new HeaderComponent(['page' => 'plugins', 'lang' => 'eu']));
		$this->getTemplate()->add('menu',     new MenuComponent(['page' => 'plugins', 'lang' => 'eu']));
		$this->getTemplate()->add('footer',   new FooterComponent());
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
	}
}
