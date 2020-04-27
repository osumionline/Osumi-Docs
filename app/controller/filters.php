<?php declare(strict_types=1);
class filters extends OController {
	/**
	 * Página de Filtros
	 *
	 * @return void
	 */
	function esFilters(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'filters', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de Filtros (inglés)
	 *
	 * @return void
	 */
	function enFilters(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'filters', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de Filtros (euskara)
	 *
	 * @return void
	 */
	function euFilters(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'filters', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}
}