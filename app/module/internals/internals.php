<?php declare(strict_types=1);
class internals extends OModule {
	/**
	 * Página de Funciones Internas
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function esInternals(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'internals', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Funciones internas');
	}

	/**
	 * Página de Funciones Internas (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function enInternals(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'internals', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Internal functions');
	}

	/**
	 * Página de Funciones Internas (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function euInternals(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'internals', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Barruko funtzioak');
	}
}