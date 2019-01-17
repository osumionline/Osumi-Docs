<?php
class urls extends OController{
  /*
   * Página de URLs
   */
  function esUrls($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'urls', 'lang' => 'es']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'es']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de URLs (inglés)
   */
  function enUrls($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'urls', 'lang' => 'en']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'en']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de URLs (euskara)
   */
  function euUrls($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'urls', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'urls', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
}
