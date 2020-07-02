<?php declare(strict_types=1);
class translations extends OModule {
	/**
	 * Página de Traducciones
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function esTranslations(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'translations', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Traducciones');
	}

	/**
	 * Página de Traducciones (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function enTranslations(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'translations', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Translations');
	}

	/**
	 * Página de Traducciones (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	public function euTranslations(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'translations', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Itzulpenak');
	}
}