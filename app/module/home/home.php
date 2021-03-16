<?php declare(strict_types=1);

namespace OsumiFramework\App\Module;

use OsumiFramework\OFW\Core\OModule;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\OFW\Routing\ORoute;

class home extends OModule {
	/**
	 * Página de inicio
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/')]
	public function esStart(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'start', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'start', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
	}

	/**
	 * Página de inicio (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/en')]
	public function enStart(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'start', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'start', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
	}

	/**
	 * Página de inicio (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/eu')]
	public function euStart(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'start', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'start', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
	}
}