<?php
$urls = [
  'es' => [
    'start'         => OUrl::generateUrl('page_es_start'),
    'installation'  => OUrl::generateUrl('page_es_installation'),
    'structure'     => OUrl::generateUrl('page_es_structure'),
    'configuration' => OUrl::generateUrl('page_es_configuration')
  ],
  'en' => [
    'start'         => OUrl::generateUrl('page_en_start'),
    'installation'  => OUrl::generateUrl('page_en_installation'),
    'structure'     => OUrl::generateUrl('page_en_structure'),
    'configuration' => OUrl::generateUrl('page_en_configuration')
  ],
  'eu' => [
    'start'         => OUrl::generateUrl('page_eu_start'),
    'installation'  => OUrl::generateUrl('page_eu_installation'),
    'structure'     => OUrl::generateUrl('page_eu_structure'),
    'configuration' => OUrl::generateUrl('page_eu_configuration')
  ]
];
$names = [
  'es' => [
    'start'         => 'Inicio',
    'installation'  => 'Instalación',
    'structure'     => 'Estructura',
    'configuration' => 'Configuración'
  ],
  'en' => [
    'start'         => 'Home',
    'installation'  => 'Installation',
    'structure'     => 'Structure',
    'configuration' => 'Configuration'
  ],
  'eu' => [
    'start'         => 'Hasiera',
    'installation'  => 'Instalazioa',
    'structure'     => 'Estruktura',
    'configuration' => 'Konfigurazioa'
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
