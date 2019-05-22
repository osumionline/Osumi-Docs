<?php
class services extends OController{
  /*
   * Página de Servicios
   */
  function esServices($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'es']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'es']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Servicios (inglés)
   */
  function enServices($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'en']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'en']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Servicios (euskara)
   */
  function euServices($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'services', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'services', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
}