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
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'start', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'start', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de inicio (inglés)
	 *
	 * @url /en
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function enStart(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'start', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'start', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de inicio (euskara)
	 *
	 * @url /eu
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function euStart(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'start', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'start', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}
}