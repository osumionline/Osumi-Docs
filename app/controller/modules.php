<?php
class modules extends OController {
	/*
	 * Página de Módulos
	 *
	 * @return void
	 */
	function esModules(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'modules', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/*
	 * Página de Módulos (inglés)
	 *
	 * @return void
	 */
	function enModules(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'modules', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/*
	 * Página de Módulos (euskara)
	 *
	 * @return void
	 */
	function euModules(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'modules', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}
}