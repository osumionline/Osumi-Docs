<?php
class modules extends OController{
  /*
   * Página de Módulos
   */
  function esModules($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'modules', 'lang' => 'es']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'es']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de Módulos (inglés)
   */
  function enModules($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'modules', 'lang' => 'en']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'en']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de Módulos (euskara)
   */
  function euModules($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'modules', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'modules', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
}
