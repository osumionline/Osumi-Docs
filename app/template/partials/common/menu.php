<?php
$urls = [
  'es' => [
    'start'         => OUrl::generateUrl('page_es_start'),
    'installation'  => OUrl::generateUrl('page_es_installation'),
    'structure'     => OUrl::generateUrl('page_es_structure'),
    'configuration' => OUrl::generateUrl('page_es_configuration'),
    'urls'          => OUrl::generateUrl('page_es_urls'),
    'modules'       => OUrl::generateUrl('page_es_modules'),
    'services'      => OUrl::generateUrl('page_es_services'),
    'filters'       => OUrl::generateUrl('page_es_filters'),
    'tasks'         => OUrl::generateUrl('page_es_tasks'),
    'translations'  => OUrl::generateUrl('page_es_translations')
  ],
  'en' => [
    'start'         => OUrl::generateUrl('page_en_start'),
    'installation'  => OUrl::generateUrl('page_en_installation'),
    'structure'     => OUrl::generateUrl('page_en_structure'),
    'configuration' => OUrl::generateUrl('page_en_configuration'),
    'urls'          => OUrl::generateUrl('page_en_urls'),
    'modules'       => OUrl::generateUrl('page_en_modules'),
    'services'      => OUrl::generateUrl('page_en_services'),
    'filters'       => OUrl::generateUrl('page_en_filters'),
    'tasks'         => OUrl::generateUrl('page_en_tasks'),
    'translations'  => OUrl::generateUrl('page_en_translations')
  ],
  'eu' => [
    'start'         => OUrl::generateUrl('page_eu_start'),
    'installation'  => OUrl::generateUrl('page_eu_installation'),
    'structure'     => OUrl::generateUrl('page_eu_structure'),
    'configuration' => OUrl::generateUrl('page_eu_configuration'),
    'urls'          => OUrl::generateUrl('page_eu_urls'),
    'modules'       => OUrl::generateUrl('page_eu_modules'),
    'services'      => OUrl::generateUrl('page_eu_services'),
    'filters'       => OUrl::generateUrl('page_eu_filters'),
    'tasks'         => OUrl::generateUrl('page_eu_tasks'),
    'translations'  => OUrl::generateUrl('page_eu_translations')
  ]
];
$names = [
  'es' => [
    'start'         => 'Inicio',
    'installation'  => 'Instalación',
    'structure'     => 'Estructura',
    'configuration' => 'Configuración',
    'urls'          => 'URLs',
    'modules'       => 'Módulos',
    'services'      => 'Servicios',
    'filters'       => 'Filtros',
    'tasks'         => 'Tareas',
    'translations'  => 'Traducciones'
  ],
  'en' => [
    'start'         => 'Home',
    'installation'  => 'Installation',
    'structure'     => 'Structure',
    'configuration' => 'Configuration',
    'urls'          => 'URLs',
    'modules'       => 'Modules',
    'services'      => 'Services',
    'filters'       => 'Filters',
    'tasks'         => 'Tasks',
    'translations'  => 'Translations'
  ],
  'eu' => [
    'start'         => 'Hasiera',
    'installation'  => 'Instalazioa',
    'structure'     => 'Estruktura',
    'configuration' => 'Konfigurazioa',
    'urls'          => 'URLak',
    'modules'       => 'Moduloak',
    'services'      => 'Zerbitzuak',
    'filters'       => 'Filtroak',
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