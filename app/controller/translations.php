<?php
class translations extends OController{
  /*
   * Página de Traducciones
   */
  function esTranslations($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'translations', 'lang' => 'es']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'es']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de Traducciones (inglés)
   */
  function enTranslations($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'translations', 'lang' => 'en']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'en']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
  /*
   * Página de Traducciones (euskara)
   */
  function euTranslations($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'translations', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'translations', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('footer', 'common/footer');
  }
}
