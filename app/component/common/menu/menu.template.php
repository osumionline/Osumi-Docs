<?php
use OsumiFramework\OFW\Routing\OUrl;

$urls = [
	'es' => [
		'start'         => OUrl::generateUrl('home', 'esStart'),
		'installation'  => OUrl::generateUrl('installation', 'esInstallation'),
		'cli'           => OUrl::generateUrl('cli', 'esCLI'),
		'structure'     => OUrl::generateUrl('structure', 'esStructure'),
		'configuration' => OUrl::generateUrl('configuration', 'esConfiguration'),
		'modules'       => OUrl::generateUrl('modules', 'esModules'),
		'models'        => OUrl::generateUrl('models', 'esModels'),
		'dto'           => OUrl::generateUrl('dto', 'esDTO'),
		'services'      => OUrl::generateUrl('services', 'esServices'),
		'filters'       => OUrl::generateUrl('filters', 'esFilters'),
		'internals'     => OUrl::generateUrl('internals', 'esInternals'),
		'tasks'         => OUrl::generateUrl('tasks', 'esTasks'),
		'translations'  => OUrl::generateUrl('translations', 'esTranslations'),
		'plugins'       => OUrl::generateUrl('plugins', 'esPlugins')
	],
	'en' => [
		'start'         => OUrl::generateUrl('home', 'enStart'),
		'installation'  => OUrl::generateUrl('installation', 'enInstallation'),
		'cli'           => OUrl::generateUrl('cli', 'enCLI'),
		'structure'     => OUrl::generateUrl('structure', 'enStructure'),
		'configuration' => OUrl::generateUrl('configuration', 'enConfiguration'),
		'modules'       => OUrl::generateUrl('modules', 'enModules'),
		'models'        => OUrl::generateUrl('models', 'enModels'),
		'dto'           => OUrl::generateUrl('dto', 'enDTO'),
		'services'      => OUrl::generateUrl('services', 'enServices'),
		'filters'       => OUrl::generateUrl('filters', 'enFilters'),
		'internals'     => OUrl::generateUrl('internals', 'enInternals'),
		'tasks'         => OUrl::generateUrl('tasks', 'enTasks'),
		'translations'  => OUrl::generateUrl('translations', 'enTranslations'),
		'plugins'       => OUrl::generateUrl('plugins', 'enPlugins')
	],
	'eu' => [
		'start'         => OUrl::generateUrl('home', 'euStart'),
		'installation'  => OUrl::generateUrl('installation', 'euInstallation'),
		'cli'           => OUrl::generateUrl('cli', 'euCLI'),
		'structure'     => OUrl::generateUrl('structure', 'euStructure'),
		'configuration' => OUrl::generateUrl('configuration', 'euConfiguration'),
		'modules'       => OUrl::generateUrl('modules', 'euModules'),
		'models'        => OUrl::generateUrl('models', 'euModels'),
		'dto'           => OUrl::generateUrl('dto', 'euDTO'),
		'services'      => OUrl::generateUrl('services', 'euServices'),
		'filters'       => OUrl::generateUrl('filters', 'euFilters'),
		'internals'     => OUrl::generateUrl('internals', 'euInternals'),
		'tasks'         => OUrl::generateUrl('tasks', 'euTasks'),
		'translations'  => OUrl::generateUrl('translations', 'euTranslations'),
		'plugins'       => OUrl::generateUrl('plugins', 'euPlugins')
	]
];
$names = [
	'es' => [
		'start'         => 'Inicio',
		'installation'  => 'Instalación',
		'cli'           => 'CLI',
		'structure'     => 'Estructura',
		'configuration' => 'Configuración',
		'modules'       => 'Módulos',
		'models'        => 'Modelos',
		'dto'           => 'DTO',
		'services'      => 'Servicios',
		'filters'       => 'Filtros',
		'internals'     => 'Funciones internas',
		'tasks'         => 'Tareas',
		'translations'  => 'Traducciones',
		'plugins'       => 'Plugins'
	],
	'en' => [
		'start'         => 'Home',
		'installation'  => 'Installation',
		'cli'           => 'CLI',
		'structure'     => 'Structure',
		'configuration' => 'Configuration',
		'modules'       => 'Modules',
		'models'        => 'Models',
		'dto'           => 'DTO',
		'services'      => 'Services',
		'filters'       => 'Filters',
		'internals'     => 'Internal functions',
		'tasks'         => 'Tasks',
		'translations'  => 'Translations',
		'plugins'       => 'Plugins'
	],
	'eu' => [
		'start'         => 'Hasiera',
		'installation'  => 'Instalazioa',
		'cli'           => 'CLI',
		'structure'     => 'Estruktura',
		'configuration' => 'Konfigurazioa',
		'modules'       => 'Moduloak',
		'models'        => 'Modeloak',
		'dto'           => 'DTO',
		'services'      => 'Zerbitzuak',
		'filters'       => 'Filtroak',
		'internals'     => 'Barruko funtzioak',
		'tasks'         => 'Atazak',
		'translations'  => 'Itzulpenak',
		'plugins'       => 'Pluginak'
	]
];
?>
<aside>
<?php foreach ($urls[$values['lang']] as $key => $url): ?>
	<a href="<?php echo $url ?>"<?php if ($values['page']==$key): ?> class="active"<?php endif ?>>
		<?php echo $names[$values['lang']][$key] ?>
	</a>
<?php endforeach ?>
	<a href="https://demo.osumi.es" target="_blank">Demo</a>
</aside>
