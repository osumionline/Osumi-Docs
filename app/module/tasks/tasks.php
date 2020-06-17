<?php declare(strict_types=1);
class tasks extends OModule {
	/**
	 * Página de Tareas
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function esTasks(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'tasks', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Tareas');
	}

	/**
	 * Página de Tareas (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function enTasks(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'tasks', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Tasks');
	}

	/**
	 * Página de Tareas (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 *
	 * @return void
	 */
	function euTasks(ORequest $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'tasks', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Atazak');
	}
}