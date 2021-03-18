<?php declare(strict_types=1);

namespace OsumiFramework\App\Module;

use OsumiFramework\OFW\Core\OModule;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\OFW\Routing\ORoute;
use OsumiFramework\App\Service\utilsService;

class translations extends OModule {
	private ?utilsService $utils_service;

	function __construct() {
		$this->utils_service  = new utilsService();
	}

	/**
	 * Página de Traducciones
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/es/traducciones')]
	public function esTranslations(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'translations', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Traducciones');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
	}

	/**
	 * Página de Traducciones (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/en/translations')]
	public function enTranslations(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'translations', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Translations');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
	}

	/**
	 * Página de Traducciones (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/eu/itzulpenak')]
	public function euTranslations(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'translations', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Itzulpenak');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
	}
}