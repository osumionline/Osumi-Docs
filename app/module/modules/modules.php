<?php declare(strict_types=1);
class modules extends OModule {
	/**
	 * Página de Módulos
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function esModules(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'modules', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Módulos');
	}

	/**
	 * Página de Módulos (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function enModules(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'modules', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Modules');
	}

	/**
	 * Página de Módulos (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function euModules(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'modules', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Moduloak');
	}
}