<?php declare(strict_types=1);
class services extends OModule {
	/**
	 * Página de Servicios
	 *
	 * @url /es/servicios
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function esServices(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Servicios');
	}

	/**
	 * Página de Servicios (inglés)
	 *
	 * @url /en/services
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function enServices(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Services');
	}

	/**
	 * Página de Servicios (euskara)
	 *
	 * @url /eu/zerbitzuak
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function euServices(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Zerbitzuak');
	}
}