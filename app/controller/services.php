<?php declare(strict_types=1);
class services extends OController {
	/**
	 * Página de Servicios
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function esServices(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Servicios');
	}

	/**
	 * Página de Servicios (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function enServices(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Services');
	}

	/**
	 * Página de Servicios (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function euServices(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Zerbitzuak');
	}
}