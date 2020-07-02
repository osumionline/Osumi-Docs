<?php declare(strict_types=1);
class structure extends OModule {
	/**
	 * Página de Estructura
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function esStructure(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'structure', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Estructura');
	}

	/**
	 * Página de Estructura (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function enStructure(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'structure', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Structure');
	}

	/**
	 * Página de Estructura (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function euStructure(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'structure', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Estruktura');
	}
}