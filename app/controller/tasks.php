<?php
class tasks extends OController{
  /*
   * Página de Tareas
   */
  function esTasks($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'tasks', 'lang' => 'es']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'es']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Tareas (inglés)
   */
  function enTasks($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'tasks', 'lang' => 'en']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'en']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
  /*
   * Página de Tareas (euskara)
   */
  function euTasks($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['page' => 'tasks', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'tasks', 'lang' => 'eu']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
}