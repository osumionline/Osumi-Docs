<?php declare(strict_types=1);

namespace OsumiFramework\App\Module\Action;

use OsumiFramework\OFW\Routing\OModuleAction;
use OsumiFramework\OFW\Routing\OAction;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\App\Component\Common\HeaderComponent;
use OsumiFramework\App\Component\Common\MenuComponent;
use OsumiFramework\App\Component\Common\FooterComponent;

#[OModuleAction(
	url: '/eu/itzulpenak',
	services: ['utils']
)]
class euTranslationsAction extends OAction {
	/**
	 * Página de Traducciones (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->getTemplate()->setTitle('Osumi Framework - Itzulpenak');
		$this->getTemplate()->add('header',   new HeaderComponent(['page' => 'translations', 'lang' => 'eu']));
		$this->getTemplate()->add('menu',     new MenuComponent(['page' => 'translations', 'lang' => 'eu']));
		$this->getTemplate()->add('footer',   new FooterComponent());
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}
}
