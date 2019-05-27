<?php
class internals extends OController{
  /*
   * Página de Funciones Internas
   */
  function esInternals($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'internals', 'lang' => 'es']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'es']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de Funciones Internas (inglés)
   */
  function enInternals($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'internals', 'lang' => 'en']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'en']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de Funciones Internas (euskara)
   */
  function euInternals($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'internals', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'internals', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
}