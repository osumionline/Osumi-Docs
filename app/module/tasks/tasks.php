<?php declare(strict_types=1);

namespace OsumiFramework\App\Module;

use OsumiFramework\OFW\Core\OModule;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\OFW\Routing\ORoute;
use OsumiFramework\App\Service\utilsService;

class tasks extends OModule {
	private ?utilsService $utils_service;

	function __construct() {
		$this->utils_service  = new utilsService();
	}

	/**
	 * Página de Tareas
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/es/tareas')]
	public function esTasks(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'tasks', 'lang' => 'es']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'es']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Tareas');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}

	/**
	 * Página de Tareas (inglés)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/en/tasks')]
	public function enTasks(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'tasks', 'lang' => 'en']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'en']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Tasks');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}

	/**
	 * Página de Tareas (euskara)
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	#[ORoute('/eu/atazak')]
	public function euTasks(ORequest $req): void {
		$this->getTemplate()->addComponent('header', 'common/header', ['page' => 'tasks', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'eu']);
		$this->getTemplate()->addComponent('footer', 'common/footer');
		$this->getTemplate()->setTitle('Osumi Framework - Atazak');
		$this->getTemplate()->add('previous', $this->utils_service->getIcon('previous'));
		$this->getTemplate()->add('next',     $this->utils_service->getIcon('next'));
	}
}