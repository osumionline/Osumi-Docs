<?php
use OsumiFramework\OFW\Routing\OUrl;

$urls = [
	'es' => [
		'start'         => OUrl::generateUrl('home', 'esStart'),
		'installation'  => OUrl::generateUrl('installation', 'esInstallation'),
		'structure'     => OUrl::generateUrl('structure', 'esStructure'),
		'configuration' => OUrl::generateUrl('configuration', 'esConfiguration'),
		'modules'       => OUrl::generateUrl('modules', 'esModules'),
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
		'services'      => OUrl::generateUrl('services', 'euServices'),
		'filters'       => OUrl::generateUrl('filters', 'euFilters'),
		'internals'     => OUrl::generateUrl('internals', 'euInternals'),
		'tasks'         => OUrl::generateUrl('tasks', 'euTasks'),
		'translations'  => OUrl::generateUrl('translations', 'euTranslations')
	]
];
$names = [
	'es' => [
		'start'         => 'Inicio',
		'installation'  => 'Instalación',
		'structure'     => 'Estructura',
		'configuration' => 'Configuración',
		'modules'       => 'Módulos',
		'services'      => 'Servicios',
		'filters'       => 'Filtros',
		'internals'     => 'Funciones internas',
		'tasks'         => 'Tareas',
		'translations'  => 'Traducciones'
	],
	'en' => [
		'start'         => 'Home',
		'installation'  => 'Installation',
		'structure'     => 'Structure',
		'configuration' => 'Configuration',
		'modules'       => 'Modules',
		'services'      => 'Services',
		'filters'       => 'Filters',
		'internals'     => 'Internal functions',
		'tasks'         => 'Tasks',
		'translations'  => 'Translations'
	],
	'eu' => [
		'start'         => 'Hasiera',
		'installation'  => 'Instalazioa',
		'structure'     => 'Estruktura',
		'configuration' => 'Konfigurazioa',
		'modules'       => 'Moduloak',
		'services'      => 'Zerbitzuak',
		'filters'       => 'Filtroak',
		'internals'     => 'Barruko funtzioak',
		'tasks'         => 'Atazak',
		'translations'  => 'Itzulpenak'
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