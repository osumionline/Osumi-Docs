<?php declare(strict_types=1);
class translations extends OController {
	/**
	 * Página de Traducciones
	 *
	 * @return void
	 */
	function esTranslations(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'translations', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Traducciones');
	}

	/**
	 * Página de Traducciones (inglés)
	 *
	 * @return void
	 */
	function enTranslations(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'translations', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Translations');
	}

	/**
	 * Página de Traducciones (euskara)
	 *
	 * @return void
	 */
	function euTranslations(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'translations', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Itzulpenak');
	}
}