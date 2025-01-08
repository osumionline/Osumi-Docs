<?php declare(strict_types=1);

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Layout\DefaultLayoutComponent;
use Osumi\OsumiFramework\App\Module\Documentacion\Componentes\ComponentesComponent;

ORoute::layout(DefaultLayoutComponent::class, function() {
  ORoute::get('/documentacion/componentes', ComponentesComponent::class);
});
