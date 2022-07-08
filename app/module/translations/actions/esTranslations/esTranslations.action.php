<?php declare(strict_types=1);

namespace OsumiFramework\App\Module\Action;

use OsumiFramework\OFW\Routing\OModuleAction;
use OsumiFramework\OFW\Routing\OAction;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\App\Component\Common\HeaderComponent;
use OsumiFramework\App\Component\Common\MenuComponent;
use OsumiFramework\App\Component\Common\FooterComponent;

#[OModuleAction(
	url: '/es/traducciones',
	services: ['utils']
)]
class esTranslationsAction extends OAction {
	/**
	 * Página de Traducciones
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->getTemplate()->setTitle('Osumi Framework - Traducciones');
		$this->getTemplate()->add('header',   new HeaderComponent(['page' => 'translations', 'lang' => 'es']));
		$this->getTemplate()->add('menu',     new MenuComponent(['page' => 'translations', 'lang' => 'es']));
		$this->getTemplate()->add('footer',   new FooterComponent());
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
	}
}
