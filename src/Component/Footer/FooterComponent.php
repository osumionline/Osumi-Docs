<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Footer;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Tools\OTools;

class FooterComponent extends OComponent {
	public string $lang = '';
	public string $link = '';
	public string $link_text = '';

  public function run(): void {
    switch ($this->lang) {
      case 'es': {
        $this->link_text = 'Versión markdown';
      }
      break;
      case 'en': {
        $this->link_text = 'Markdown version';
      }
      break;
      case 'eu': {
        $this->link_text = 'Markdown bertsioa';
      }
      break;
    }
  }
}
