<?php
class home extends OController {
	/*
	 * Página de inicio
	 *
	 * @return void
	 */
	function esStart(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'start', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'start', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/*
	 * Página de inicio (inglés)
	 *
	 * @return void
	 */
	function enStart(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'start', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'start', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/*
	 * Página de inicio (euskara)
	 *
	 * @return void
	 */
	function euStart(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'start', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'start', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}
}