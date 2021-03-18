<?php declare(strict_types=1);

namespace OsumiFramework\App\Module;

use OsumiFramework\OFW\Core\OModule;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\OFW\Routing\ORoute;
use OsumiFramework\App\Service\utilsService;

class internals extends OModule {
	private ?utilsService $utils_service;

	function __construct() {
		$this->utils_service  = new utilsService();
	}

	/**
	 * Página de Funciones Internas
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/es/funciones-internas')]
	public function esInternals(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'internals', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Funciones internas');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}

	/**
	 * Página de Funciones Internas (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/en/internal-functions')]
	public function enInternals(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'internals', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Internal functions');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}

	/**
	 * Página de Funciones Internas (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/eu/barruko-funtzioak')]
	public function euInternals(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'internals', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Barruko funtzioak');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}
}