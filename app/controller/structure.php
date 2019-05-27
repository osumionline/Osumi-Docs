<?php
class structure extends OController{
  /*
   * Página de Estructura
   */
  function esStructure($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'structure', 'lang' => 'es']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'es']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de Estructura (inglés)
   */
  function enStructure($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'structure', 'lang' => 'en']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'en']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de Estructura (euskara)
   */
  function euStructure($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'structure', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'structure', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
}
