<?php declare(strict_types=1);

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Module\Md\MdComponent;

ORoute::get('/md/:lang/:folder/:file', MdComponent::class);
