<?php declare(strict_types=1);
class configuration extends OController {
	/**
	 * Página de Configuración
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function esConfiguration(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'configuration', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Configuración');
	}

	/**
	 * Página de Configuración (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function enConfiguration(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'configuration', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Configuration');
	}

	/**
	 * Página de Configuración (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function euConfiguration(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'configuration', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Konfigurazioa');
	}
}