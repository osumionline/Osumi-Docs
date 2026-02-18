<?php declare(strict_types=1);

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Layout\SeoLayoutComponent;
use Osumi\OsumiFramework\App\Module\Docs\DocsComponent;

ORoute::layout(SeoLayoutComponent::class, function() {
  ORoute::get('/docs/:lang/:folder/:file', DocsComponent::class);
});
