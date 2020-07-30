<?php declare(strict_types=1);
class tasks extends OModule {
	/**
	 * Página de Tareas
	 *
	 * @url /es/tareas
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function esTasks(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'tasks', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Tareas');
	}

	/**
	 * Página de Tareas (inglés)
	 *
	 * @url /en/tasks
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function enTasks(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'tasks', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Tasks');
	}

	/**
	 * Página de Tareas (euskara)
	 *
	 * @url /eu/atazak
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function euTasks(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'tasks', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Atazak');
	}
}