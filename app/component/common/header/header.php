<?php
use OsumiFramework\OFW\Routing\OUrl;

$urls = [
	'es' => [
		'start'         => OUrl::generateUrl('home', 'esStart'),
		'installation'  => OUrl::generateUrl('installation', 'esInstallation'),
		'structure'     => OUrl::generateUrl('structure', 'esStructure'),
		'configuration' => OUrl::generateUrl('configuration', 'esConfiguration'),
		'modules'       => OUrl::generateUrl('modules', 'esModules'),
		'models'        => OUrl::generateUrl('models', 'esModels'),
		'dto'           => OUrl::generateUrl('dto', 'esDTO'),
		'services'      => OUrl::generateUrl('services', 'esServices'),
		'filters'       => OUrl::generateUrl('filters', 'esFilters'),
		'internals'     => OUrl::generateUrl('internals', 'esInternals'),
		'tasks'         => OUrl::generateUrl('tasks', 'esTasks'),
		'translations'  => OUrl::generateUrl('translations', 'esTranslations')
	],
	'en' => [
		'start'         => OUrl::generateUrl('home', 'enStart'),
		'installation'  => OUrl::generateUrl('installation', 'enInstallation'),
		'structure'     => OUrl::generateUrl('structure', 'enStructure'),
		'configuration' => OUrl::generateUrl('configuration', 'enConfiguration'),
		'modules'       => OUrl::generateUrl('modules', 'enModules'),
		'models'        => OUrl::generateUrl('models', 'enModels'),
		'dto'           => OUrl::generateUrl('dto', 'enDTO'),
		'services'      => OUrl::generateUrl('services', 'enServices'),
		'filters'       => OUrl::generateUrl('filters', 'enFilters'),
		'internals'     => OUrl::generateUrl('internals', 'enInternals'),
		'tasks'         => OUrl::generateUrl('tasks', 'enTasks'),
		'translations'  => OUrl::generateUrl('translations', 'enTranslations')
	],
	'eu' => [
		'start'         => OUrl::generateUrl('home', 'euStart'),
		'installation'  => OUrl::generateUrl('installation', 'euInstallation'),
		'structure'     => OUrl::generateUrl('structure', 'euStructure'),
		'configuration' => OUrl::generateUrl('configuration', 'euConfiguration'),
		'modules'       => OUrl::generateUrl('modules', 'euModules'),
		'models'        => OUrl::generateUrl('models', 'euModels'),
		'dto'           => OUrl::generateUrl('dto', 'euDTO'),
		'services'      => OUrl::generateUrl('services', 'euServices'),
		'filters'       => OUrl::generateUrl('filters', 'euFilters'),
		'internals'     => OUrl::generateUrl('internals', 'euInternals'),
		'tasks'         => OUrl::generateUrl('tasks', 'euTasks'),
		'translations'  => OUrl::generateUrl('translations', 'euTranslations')
	]
];
?>
<header>
	<button id="menu-btn" class="button-left"><img src="/img/menu.svg"></button>
	<a href="/" class="title">Osumi Framework</a>
	<button id="language-btn" class="button-right"><img src="/img/language.svg"></button>
	<ul class="language-selector">
		<li><a href="<?php echo $urls['es'][$values['page']] ?>"<?php if ($values['lang']=='es'): ?> class="active"<?php endif ?>>CAS</a></li>
		<li><a href="<?php echo $urls['en'][$values['page']] ?>"<?php if ($values['lang']=='en'): ?> class="active"<?php endif ?>>ENG</a></li>
		<li><a href="<?php echo $urls['eu'][$values['page']] ?>"<?php if ($values['lang']=='eu'): ?> class="active"<?php endif ?>>EUS</a></li>
	</ul>
</header>
<ul class="language-selector-sm">
	<li><a href="<?php echo $urls['es'][$values['page']] ?>"<?php if ($values['lang']=='es'): ?> class="active"<?php endif ?>>CAS</a></li>
	<li><a href="<?php echo $urls['en'][$values['page']] ?>"<?php if ($values['lang']=='en'): ?> class="active"<?php endif ?>>ENG</a></li>
	<li><a href="<?php echo $urls['eu'][$values['page']] ?>"<?php if ($values['lang']=='eu'): ?> class="active"<?php endif ?>>EUS</a></li>
</ul>
<div id="overlay"></div>