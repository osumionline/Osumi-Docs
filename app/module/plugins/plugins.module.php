<?php declare(strict_types=1);

namespace OsumiFramework\App\Module;

use OsumiFramework\OFW\Routing\OModule;

/**
 * New plugins module
 */
#[OModule(
	type: 'html',
	actions: ['enPlugins', 'esPlugins', 'euPlugins']
)]
class pluginsModule {}