<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Shared\Tabs;

use Osumi\OsumiFramework\Core\OComponent;

class TabsComponent extends OComponent {
  public array $tabs = [];

  public function __construct(array $data) {
		parent::__construct($data);
		$this->addInlineCss('tabs.min');
    $this->addInlineJs('tabs.min');
	}
}
