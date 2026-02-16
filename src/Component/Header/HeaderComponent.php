<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Header;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Tools\OTools;

class HeaderComponent extends OComponent {
	public string $version = '';
	public string $es_link = '';
	public string $en_link = '';
	public string $eu_link = '';

	public function __construct() {
		parent::__construct();
		$this->version = OTools::getVersion();
	}
}
