<?php
class home extends OController{
  /*
   * Página de inicio
   */
  function esStart($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'start', 'lang' => 'es']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'start', 'lang' => 'es']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de inicio (inglés)
   */
  function enStart($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'start', 'lang' => 'en']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'start', 'lang' => 'en']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de inicio (euskara)
   */
  function euStart($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'start', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'start', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
}
