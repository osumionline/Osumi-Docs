<?php declare(strict_types=1);

namespace OsumiFramework\App\Module;

use OsumiFramework\OFW\Core\OModule;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\OFW\Routing\ORoute;
use OsumiFramework\App\Service\utilsService;

class modules extends OModule {
	private ?utilsService $utils_service;

	function __construct() {
		$this->utils_service  = new utilsService();
	}

	/**
	 * Página de Módulos
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/es/modulos')]
	public function esModules(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'modules', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Módulos');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}

	/**
	 * Página de Módulos (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/en/modules')]
	public function enModules(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'modules', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Modules');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}

	/**
	 * Página de Módulos (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/eu/moduloak')]
	public function euModules(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'modules', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Moduloak');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}
}