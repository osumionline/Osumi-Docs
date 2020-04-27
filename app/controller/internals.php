<?php declare(strict_types=1);
class internals extends OController {
	/**
	 * Página de Funciones Internas
	 *
	 * @return void
	 */
	function esInternals(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'internals', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de Funciones Internas (inglés)
	 *
	 * @return void
	 */
	function enInternals(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'internals', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de Funciones Internas (euskara)
	 *
	 * @return void
	 */
	function euInternals(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'internals', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}
}