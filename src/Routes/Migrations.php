<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\Routes;

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Layout\DefaultLayoutComponent;
use Osumi\OsumiFramework\App\Module\Migrations\MigrationsComponent;
use Osumi\OsumiFramework\App\Module\MigrationsFile\MigrationsFileComponent;

ORoute::layout(DefaultLayoutComponent::class, function() {
  ORoute::get('/:lang/migrations',       MigrationsComponent::class);
  ORoute::get('/:lang/migrations/:file', MigrationsFileComponent::class);
});
