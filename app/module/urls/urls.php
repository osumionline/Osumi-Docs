<?php declare(strict_types=1);
class urls extends OModule {
	/**
	 * Página de URLs
	 *
	 * @url /es/urls
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function esUrls(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'urls', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - URLs');
	}

	/**
	 * Página de URLs (inglés)
	 *
	 * @url /en/urls
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function enUrls(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'urls', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - URLs');
	}

	/**
	 * Página de URLs (euskara)
	 *
	 * @url /eu/urlak
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function euUrls(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'urls', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - URLak');
	}
}