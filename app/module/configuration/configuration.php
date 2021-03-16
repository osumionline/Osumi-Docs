<?php declare(strict_types=1);

namespace OsumiFramework\App\Module;

use OsumiFramework\OFW\Core\OModule;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\OFW\Routing\ORoute;

class configuration extends OModule {
	/**
	 * Página de Configuración
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/es/configuracion')]
	public function esConfiguration(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'configuration', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Configuración');
	}

	/**
	 * Página de Configuración (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/en/configuration')]
	public function enConfiguration(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'configuration', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Configuration');
	}

	/**
	 * Página de Configuración (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/eu/konfigurazioa')]
	public function euConfiguration(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'configuration', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Konfigurazioa');
	}
}