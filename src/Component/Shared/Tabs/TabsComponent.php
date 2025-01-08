<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Shared\Tabs;

use Osumi\OsumiFramework\Core\OComponent;

class TabsComponent extends OComponent {
  public array $tabs = [];

  public function __construct($tabs) {
		parent::__construct($tabs);
		$this->addInlineCss('tabs');
    $this->addInlineJs('tabs');
	}
}
