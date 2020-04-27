<?php declare(strict_types=1);
class services extends OController {
	/**
	 * Página de Servicios
	 *
	 * @return void
	 */
	function esServices(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Servicios');
	}

	/**
	 * Página de Servicios (inglés)
	 *
	 * @return void
	 */
	function enServices(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Services');
	}

	/**
	 * Página de Servicios (euskara)
	 *
	 * @return void
	 */
	function euServices(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Zerbitzuak');
	}
}