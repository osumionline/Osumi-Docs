<?php declare(strict_types=1);
class configuration extends OController{
	/**
	 * Página de Configuración
	 *
	 * @return void
	 */
	function esConfiguration(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'configuration', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de Configuración (inglés)
	 *
	 * @return void
	 */
	function enConfiguration(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'configuration', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de Configuración (euskara)
	 *
	 * @return void
	 */
	function euConfiguration(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'configuration', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}
}