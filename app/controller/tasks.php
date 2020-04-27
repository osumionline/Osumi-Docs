<?php declare(strict_types=1);
class tasks extends OController {
	/**
	 * Página de Tareas
	 *
	 * @return void
	 */
	function esTasks(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'tasks', 'lang' => 'es']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'es']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de Tareas (inglés)
	 *
	 * @return void
	 */
	function enTasks(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'tasks', 'lang' => 'en']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'en']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}

	/**
	 * Página de Tareas (euskara)
	 *
	 * @return void
	 */
	function euTasks(array $req): void {
		$this->getTemplate()->addPartial('header', 'common/header', ['page' => 'tasks', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'eu']);
		$this->getTemplate()->addPartial('footer', 'common/footer');
	}
}