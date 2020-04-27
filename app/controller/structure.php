<?php declare(strict_types=1);
class structure extends OController {
	/**
	 * Página de Estructura
	 *
	 * @return void
	 */
	function esStructure(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'structure', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Estructura');
	}

	/**
	 * Página de Estructura (inglés)
	 *
	 * @return void
	 */
	function enStructure(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'structure', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Structure');
	}

	/**
	 * Página de Estructura (euskara)
	 *
	 * @return void
	 */
	function euStructure(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'structure', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Estruktura');
	}
}