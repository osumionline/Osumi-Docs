<?php
class home extends OController{
  private $urls = [
    'es' => [
      'start'         => '/',
      'installation'  => '/es/instalacion',
      'structure'     => '/es/estructura',
      'configuration' => '/es/configuracion'
    ],
    'en' => [
      'start'         => '/en',
      'installation'  => '/en/installation',
      'structure'     => '/en/structure',
      'configuration' => '/en/configuration'
    ],
    'eu' => [
      'start'         => '/eu',
      'installation'  => '/eu/instalazioa',
      'structure'     => '/eu/estruktura',
      'configuration' => '/eu/konfigurazioa'
    ]
  ];
  /*
   * Página de inicio
   */
  function esStart($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'cas',
      'cas'  => $this->urls['es']['start'],
      'eng'  => $this->urls['en']['start'],
      'eus'  => $this->urls['eu']['start']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_es',   ['page' => 'start', 'urls' => $this->urls['es']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de inicio (inglés)
   */
  function enStart($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'eng',
      'cas'  => $this->urls['es']['start'],
      'eng'  => $this->urls['en']['start'],
      'eus'  => $this->urls['eu']['start']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_en',   ['page' => 'start', 'urls' => $this->urls['en']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de inicio (euskara)
   */
  function euStart($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'eus',
      'cas'  => $this->urls['es']['start'],
      'eng'  => $this->urls['en']['start'],
      'eus'  => $this->urls['eu']['start']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_eu',   ['page' => 'start', 'urls' => $this->urls['eu']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Instalación
   */
  function esInstallation($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'cas',
      'cas'  => $this->urls['es']['installation'],
      'eng'  => $this->urls['en']['installation'],
      'eus'  => $this->urls['eu']['installation']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_es',   ['page' => 'installation', 'urls' => $this->urls['es']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Instalación (inglés)
   */
  function enInstallation($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'eng',
      'cas'  => $this->urls['es']['installation'],
      'eng'  => $this->urls['en']['installation'],
      'eus'  => $this->urls['eu']['installation']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_en',   ['page' => 'installation', 'urls' => $this->urls['en']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Instalación (euskara)
   */
  function euInstallation($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'eus',
      'cas'  => $this->urls['es']['installation'],
      'eng'  => $this->urls['en']['installation'],
      'eus'  => $this->urls['eu']['installation']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_eu',   ['page' => 'installation', 'urls' => $this->urls['eu']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Estructura
   */
  function esStructure($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'cas',
      'cas'  => $this->urls['es']['structure'],
      'eng'  => $this->urls['en']['structure'],
      'eus'  => $this->urls['eu']['structure']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_es',   ['page' => 'structure', 'urls' => $this->urls['es']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Estructura (inglés)
   */
  function enStructure($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'eng',
      'cas'  => $this->urls['es']['structure'],
      'eng'  => $this->urls['en']['structure'],
      'eus'  => $this->urls['eu']['structure']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_en',   ['page' => 'structure', 'urls' => $this->urls['en']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Estructura (euskara)
   */
  function euStructure($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'eus',
      'cas'  => $this->urls['es']['structure'],
      'eng'  => $this->urls['en']['structure'],
      'eus'  => $this->urls['eu']['structure']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_eu',   ['page' => 'structure', 'urls' => $this->urls['eu']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Configuración
   */
  function esConfiguration($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'cas',
      'cas'  => $this->urls['es']['configuration'],
      'eng'  => $this->urls['en']['configuration'],
      'eus'  => $this->urls['eu']['configuration']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_es',   ['page' => 'configuration', 'urls' => $this->urls['es']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Configuración (inglés)
   */
  function enConfiguration($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'eng',
      'cas'  => $this->urls['es']['configuration'],
      'eng'  => $this->urls['en']['configuration'],
      'eus'  => $this->urls['eu']['configuration']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_en',   ['page' => 'configuration', 'urls' => $this->urls['en']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Configuración (euskara)
   */
  function euConfiguration($req){
    $this->getTemplate()->addPartial('header', 'common/header', [
      'lang' => 'eus',
      'cas'  => $this->urls['es']['configuration'],
      'eng'  => $this->urls['en']['configuration'],
      'eus'  => $this->urls['eu']['configuration']
    ]);
    $this->getTemplate()->addPartial('menu',   'common/menu_eu',   ['page' => 'configuration', 'urls' => $this->urls['eu']]);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
}
