<?php declare(strict_types=1);
class urls extends OController {
	/**
	 * Página de URLs
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function esUrls(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'urls', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - URLs');
	}

	/**
	 * Página de URLs (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function enUrls(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'urls', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - URLs');
	}

	/**
	 * Página de URLs (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function euUrls(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'urls', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - URLak');
	}
}