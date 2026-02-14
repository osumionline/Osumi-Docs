<?php declare(strict_types=1);

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Layout\DefaultLayoutComponent;
use Osumi\OsumiFramework\App\Module\Docs\DocsComponent;

ORoute::layout(DefaultLayoutComponent::class, function() {
  ORoute::get('/docs/:lang/:folder/:file', DocsComponent::class);
});
