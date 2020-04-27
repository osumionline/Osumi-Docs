<?php declare(strict_types=1);
class urls extends OController {
	/**
	 * Página de URLs
	 *
	 * @return void
	 */
	function esUrls(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'urls', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de URLs (inglés)
	 *
	 * @return void
	 */
	function enUrls(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'urls', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de URLs (euskara)
	 *
	 * @return void
	 */
	function euUrls(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'urls', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}
}