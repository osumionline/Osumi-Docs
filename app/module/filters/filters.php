<?php declare(strict_types=1);

namespace OsumiFramework\App\Module;

use OsumiFramework\OFW\Core\OModule;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\OFW\Routing\ORoute;
use OsumiFramework\App\Service\utilsService;

class filters extends OModule {
	private ?utilsService $utils_service;

	function __construct() {
		$this->utils_service  = new utilsService();
	}

	/**
	 * Página de Filtros
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/es/filtros')]
	public function esFilters(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'filters', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Filtros');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}

	/**
	 * Página de Filtros (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/en/filters')]
	public function enFilters(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'filters', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Filters');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}

	/**
	 * Página de Filtros (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/eu/filtroak')]
	public function euFilters(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'filters', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Filtroak');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}
}