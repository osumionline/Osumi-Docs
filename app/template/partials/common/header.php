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
?>
<header>
  <button id="menu-btn" class="button-left"><img src="/img/menu.svg"></button>
  Osumi Framework
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
