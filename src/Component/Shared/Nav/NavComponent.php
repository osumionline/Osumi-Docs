<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Shared\Nav;

use Osumi\OsumiFramework\Core\OComponent;

class NavComponent extends OComponent {
	public function __construct() {
		parent::__construct();
		$this->addInlineCss('nav');
	}
}
