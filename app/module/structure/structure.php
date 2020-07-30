<?php declare(strict_types=1);
class structure extends OModule {
	/**
	 * Página de Estructura
	 *
	 * @url /es/estructura
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function esStructure(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'structure', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Estructura');
	}

	/**
	 * Página de Estructura (inglés)
	 *
	 * @url /en/structure
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function enStructure(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'structure', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Structure');
	}

	/**
	 * Página de Estructura (euskara)
	 *
	 * @url /eu/estruktura
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function euStructure(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'structure', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Estruktura');
	}
}