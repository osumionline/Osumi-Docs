<?php declare(strict_types=1);
class home extends OModule {
	/**
	 * Página de inicio
	 *
	 * @url /
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function esStart(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'start', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'start', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
	}

	/**
	 * Página de inicio (inglés)
	 *
	 * @url /en
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function enStart(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'start', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'start', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
	}

	/**
	 * Página de inicio (euskara)
	 *
	 * @url /eu
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function euStart(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'start', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'start', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
	}
}