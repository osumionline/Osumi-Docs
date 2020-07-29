<?php declare(strict_types=1);
class installation extends OModule {
	/**
	 * Página de Instalación
	 *
	 * @url /es/instalacion
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function esInstallation(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'installation', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'installation', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Instalación');
		$this->getTemplate()->add('version', OTools::getVersion());
	}

	/**
	 * Página de Instalación (inglés)
	 *
	 * @url /en/installation
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function enInstallation(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'installation', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'installation', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Installation');
		$this->getTemplate()->add('version', OTools::getVersion());
	}

	/**
	 * Página de Instalación (euskara)
	 *
	 * @url /eu/instalazioa
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function euInstallation(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'installation', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'installation', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Instalazioa');
		$this->getTemplate()->add('version', OTools::getVersion());
	}
}