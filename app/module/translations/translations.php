<?php declare(strict_types=1);
class translations extends OModule {
	/**
	 * Página de Traducciones
	 *
	 * @url /es/traducciones
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function esTranslations(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'translations', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Traducciones');
	}

	/**
	 * Página de Traducciones (inglés)
	 *
	 * @url /en/translations
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function enTranslations(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'translations', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Translations');
	}

	/**
	 * Página de Traducciones (euskara)
	 *
	 * @url /eu/itzulpenak
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function euTranslations(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'translations', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Itzulpenak');
	}
}