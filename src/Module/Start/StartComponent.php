<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Start;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Shared\Header\HeaderComponent;
use Osumi\OsumiFramework\App\Component\Shared\Nav\NavComponent;

class StartComponent extends OComponent {
	public ?HeaderComponent $header = null;
	public ?NavComponent $nav = null;

	public function __construct() {
		parent::__construct();
		$this->header = new HeaderComponent();
		$this->nav    = new NavComponent();
	}

	/**
	 * Start page
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->nav->lang = 'es';
	}
}

/*
Home
Quickstart

Core Concepts
  ├─ Routing
  ├─ Components
  ├─ Templates & Pipes
  ├─ DTOs
  ├─ Requests (ORequest)
  ├─ Filters
  ├─ Services
  ├─ Model Components
  ├─ ORM (Models)
  ├─ Configuration
  ├─ CLI
  └─ Tasks

Reference
  ├─ Attributes (ORM)
  ├─ Pipe Functions
  ├─ CLI Commands
  ├─ Component Info
  ├─ ORequest Methods
  └─ Configuration Keys

Recipes
  ├─ Authentication
  ├─ File Uploads
  ├─ Pagination
  ├─ Model Lists
  ├─ Caching patterns
  └─ API patterns

Advanced
  ├─ Request Lifecycle
  ├─ Deep Dive: Routing
  ├─ Deep Dive: ORM
  ├─ Deep Dive: Components
  └─ Performance

Guides
  ├─ Building an API
  ├─ Building a CRUD module
  ├─ Authentication E2E
  └─ Creating Custom Pipes

Plugins
  └─ OToken

Migrations
Changelog
Contributing
*/
