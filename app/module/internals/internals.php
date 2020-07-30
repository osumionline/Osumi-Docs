<?php declare(strict_types=1);
class internals extends OModule {
	/**
	 * Página de Funciones Internas
	 *
	 * @url /es/funciones-internas
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function esInternals(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'internals', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Funciones internas');
	}

	/**
	 * Página de Funciones Internas (inglés)
	 *
	 * @url /en/internal-functions
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function enInternals(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'internals', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Internal functions');
	}

	/**
	 * Página de Funciones Internas (euskara)
	 *
	 * @url /eu/barruko-funtzioak
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function euInternals(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'internals', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Barruko funtzioak');
	}
}