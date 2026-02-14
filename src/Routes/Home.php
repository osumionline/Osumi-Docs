<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\Routes;

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Layout\DefaultLayoutComponent;
use Osumi\OsumiFramework\App\Module\Start\StartComponent;
use Osumi\OsumiFramework\App\Module\Quickstart\QuickstartComponent;

ORoute::layout(DefaultLayoutComponent::class, function() {
  ORoute::get('/',                 StartComponent::class);
  ORoute::get('/:lang/quickstart', QuickstartComponent::class);
});
