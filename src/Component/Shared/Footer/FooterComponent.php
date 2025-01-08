<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Shared\Footer;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Routing\OUrl;

class FooterComponent extends OComponent {
  public string $previous      = '';
  public string $previous_name = '';
  public string $previous_url  = '';
  public string $previous_icon = '';
  public string $next      = '';
  public string $next_name = '';
  public string $next_url  = '';
  public string $next_icon = '';

  private function getComponentName($component): string {
    $parts = explode("\\", $component);
    return array_pop($parts);
  }

  public function run():void {
    if ($this->previous !== '') {
      $this->previous_url = OUrl::generateUrl($this->getComponentName($this->previous));
      $this->previous_icon = file_get_contents($this->getConfig()->getDir('public').'img/left.svg');
    }
    if ($this->next !== '') {
      $this->next_url = OUrl::generateUrl($this->getComponentName($this->next));
      $this->next_icon = file_get_contents($this->getConfig()->getDir('public').'img/right.svg');
    }
  }
}
