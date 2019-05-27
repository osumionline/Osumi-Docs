<?php
class configuration extends OController{
  /*
   * Página de Configuración
   */
  function esConfiguration($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'configuration', 'lang' => 'es']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'es']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de Configuración (inglés)
   */
  function enConfiguration($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'configuration', 'lang' => 'en']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'en']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de Configuración (euskara)
   */
  function euConfiguration($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'configuration', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'configuration', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
}
