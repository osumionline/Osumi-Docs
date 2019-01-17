<?php
class filters extends OController{
  /*
   * Página de Filtros
   */
  function esFilters($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'filters', 'lang' => 'es']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'es']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Filtros (inglés)
   */
  function enFilters($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'filters', 'lang' => 'en']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'en']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Filtros (euskara)
   */
  function euFilters($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'filters', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'filters', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
}
