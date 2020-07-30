<?php declare(strict_types=1);
class modules extends OModule {
	/**
	 * Página de Módulos
	 *
	 * @url /es/modulos
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function esModules(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'modules', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Módulos');
	}

	/**
	 * Página de Módulos (inglés)
	 *
	 * @url /en/modules
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function enModules(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'modules', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Modules');
	}

	/**
	 * Página de Módulos (euskara)
	 *
	 * @url /eu/moduloak
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function euModules(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'modules', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Moduloak');
	}
}