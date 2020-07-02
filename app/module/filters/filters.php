<?php declare(strict_types=1);
class filters extends OModule {
	/**
	 * Página de Filtros
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function esFilters(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'filters', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Filtros');
	}

	/**
	 * Página de Filtros (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function enFilters(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'filters', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Filters');
	}

	/**
	 * Página de Filtros (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function euFilters(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'filters', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Filtroak');
	}
}