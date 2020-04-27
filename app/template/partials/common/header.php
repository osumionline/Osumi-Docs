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
		'internals'     => OUrl::generateUrl('page_es_internals'),
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
		'internals'     => OUrl::generateUrl('page_en_internals'),
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
		'internals'     => OUrl::generateUrl('page_eu_internals'),
		'tasks'         => OUrl::generateUrl('page_eu_tasks'),
		'translations'  => OUrl::generateUrl('page_eu_translations')
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