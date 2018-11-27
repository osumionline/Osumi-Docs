<?php
class home extends OController{
  /*
   * Página de inicio
   */
  function start($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['lang' => 'cas']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'start']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }

  /*
   * Página de Instalación
   */
  function installation($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['lang' => 'cas']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'installation']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Estructura
   */
  function structure($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['lang' => 'cas']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'structure']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
}
