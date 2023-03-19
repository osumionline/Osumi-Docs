<?php declare(strict_types=1);

namespace OsumiFramework\App\Module;

use OsumiFramework\OFW\Routing\OModule;

/**
 * New cli module
 */
#[OModule(
	type: 'html',
	actions: ['euCLI', 'esCLI', 'enCLI']
)]
class cliModule {}