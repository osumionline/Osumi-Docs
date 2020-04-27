<?php declare(strict_types=1);
class installation extends OController {
	/**
	 * Página de Instalación
	 *
	 * @return void
	 */
	function esInstallation(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'installation', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'installation', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Instalación');
		$this->getTemplate()->add('version', OTools::getVersion());
	}

	/**
	 * Página de Instalación (inglés)
	 *
	 * @return void
	 */
	function enInstallation(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'installation', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'installation', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Installation');
		$this->getTemplate()->add('version', OTools::getVersion());
	}

	/**
	 * Página de Instalación (euskara)
	 *
	 * @return void
	 */
	function euInstallation(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'installation', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'installation', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Instalazioa');
		$this->getTemplate()->add('version', OTools::getVersion());
	}
}