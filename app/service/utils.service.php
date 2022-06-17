<?php declare(strict_types=1);

namespace OsumiFramework\App\Service;

use OsumiFramework\OFW\Core\OService;

class utilsService extends OService {
	function __construct() {
		$this->loadService();
	}

	/**
	 * Function to read the content's of an SVG icon
	 */
	public function getIcon(string $name): string {
		$path = $this->getConfig()->getDir('web').'img/'.$name.'.svg';
		return file_exists($path) ? file_get_contents($path) : '';
	}
}