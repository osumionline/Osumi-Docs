<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Shared\Header;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Tools\OTools;

class HeaderComponent extends OComponent {
	public string $version = '';
	
	public function __construct() {
		parent::__construct();
		$this->addInlineCss('header');
		$this->version = OTools::getVersion();
	}
}
