<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Shared\Nav;

use Osumi\OsumiFramework\Core\OComponent;

class NavComponent extends OComponent {
	public string $title = '';

	public function __construct(array $data) {
		parent::__construct($data);
		$this->addInlineCss('nav');
		$this->addInlineJs('nav');
	}
}
