<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\Routes;

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Layout\DefaultLayoutComponent;
use Osumi\OsumiFramework\App\Layout\SeoLayoutComponent;
use Osumi\OsumiFramework\App\Module\Start\StartComponent;
use Osumi\OsumiFramework\App\Module\Quickstart\QuickstartComponent;
use Osumi\OsumiFramework\App\Module\Migrations\MigrationsComponent;

ORoute::layout(DefaultLayoutComponent::class, function() {
  ORoute::get('/',                 StartComponent::class);
  ORoute::get('/:lang',            StartComponent::class);
});
ORoute::layout(SeoLayoutComponent::class, function() {
  ORoute::get('/:lang/quickstart', QuickstartComponent::class);
});
