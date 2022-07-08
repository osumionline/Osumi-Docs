<?php declare(strict_types=1);

namespace OsumiFramework\App\Module\Action;

use OsumiFramework\OFW\Routing\OModuleAction;
use OsumiFramework\OFW\Routing\OAction;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\App\Component\Common\HeaderComponent;
use OsumiFramework\App\Component\Common\MenuComponent;
use OsumiFramework\App\Component\Common\FooterComponent;

#[OModuleAction(
	url: '/eu/filtroak',
	services: ['utils']
)]
class euFiltersAction extends OAction {
	/**
	 * Página de Filtros (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->getTemplate()->setTitle('Osumi Framework - Filtroak');
		$this->getTemplate()->add('header',   new HeaderComponent(['page' => 'filters', 'lang' => 'eu']));
		$this->getTemplate()->add('menu',     new MenuComponent(['page' => 'filters', 'lang' => 'eu']));
		$this->getTemplate()->add('footer',   new FooterComponent());
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}
}
