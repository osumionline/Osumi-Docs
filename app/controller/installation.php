<?php
class installation extends OController{
  /*
   * Página de Instalación
   */
  function esInstallation($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'installation', 'lang' => 'es']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'installation', 'lang' => 'es']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Instalación (inglés)
   */
  function enInstallation($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'installation', 'lang' => 'en']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'installation', 'lang' => 'en']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Instalación (euskara)
   */
  function euInstallation($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'installation', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'installation', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
}
