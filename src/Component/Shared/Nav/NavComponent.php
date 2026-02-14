<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Shared\Nav;

use Osumi\OsumiFramework\Core\OComponent;

class NavComponent extends OComponent {
  private array $titles = [
    'en' => [
      'title-Quickstart'    => 'Quickstart',
      'quickstart'          => 'Quickstart guide',
      'title-Core Concepts' => 'Core Concepts',
      'routing'             => 'Routing',
      'components'          => 'Components',
      'templates'           => 'Templates & Pipes',
      'dtos'                => 'DTOs',
      'filters'             => 'Filters',
      'services'            => 'Services',
      'model-components'    => 'Model Components',
      'orm'                 => 'ORM',
      'config'              => 'Configuration',
      'cli'                 => 'CLI',
      'tasks'               => 'Tasks',
      'title-Reference'     => 'Reference',
      'attributes-orm'      => 'ORM Attributes',
      'cli-commands'        => 'CLI Commands',
      'pipe-functions'      => 'Pipe Functions',
      'title-Recipes'       => 'Recipes',
      'auth'                => 'Authentication',
      'uploads'             => 'File Uploads',
    ],
    'es' => [
      'title-Quickstart'    => 'Inicio rápido',
      'quickstart'          => 'Guía de inicio rápido',
      'title-Core Concepts' => 'Conceptos Generales',
      'routing'             => 'Enrutamiento',
      'components'          => 'Componentes',
      'templates'           => 'Plantillas y Pipes',
      'dtos'                => 'DTOs',
      'filters'             => 'Filtros',
      'services'            => 'Servicios',
      'model-components'    => 'Componentes de Modelo',
      'orm'                 => 'ORM',
      'config'              => 'Configuración',
      'cli'                 => 'CLI',
      'tasks'               => 'Tareas',
      'title-Reference'     => 'Referencia',
      'attributes-orm'      => 'Atributos ORM',
      'cli-commands'        => 'Comandos CLI',
      'pipe-functions'      => 'Funciones Pipe',
      'title-Recipes'       => 'Recetas',
      'auth'                => 'Autenticacion',
      'uploads'             => 'Subida de archivos',
    ],
    'eu' => [
      'title-Quickstart'    => 'Hasiberri Gida',
      'quickstart'          => 'Hasiberrientzako Gida Azkarra',
      'title-Core Concepts' => 'Kontzeptu orokorrak',
      'routing'             => 'Bideratzea',
      'components'          => 'Osagaiak',
      'templates'           => 'Txantiloiak eta Hodiak',
      'dtos'                => 'DTOak',
      'filters'             => 'Iragazkiak',
      'services'            => 'Serbitzuak',
      'model-components'    => 'Modelo Osagaiak',
      'orm'                 => 'ORM',
      'config'              => 'Konfigurazioa',
      'cli'                 => 'CLI',
      'tasks'               => 'Atazak',
      'title-Reference'     => 'Erreferentzia',
      'attributes-orm'      => 'ORM Atributuak',
      'cli-commands'        => 'CLI Komandoak',
      'pipe-functions'      => 'Hodi Funtzioak',
      'title-Recipes'       => 'Errezetak',
      'auth'                => 'Autentifikazioa',
      'uploads'             => 'Fitxategien igoerak',
    ]
  ];
  public array $sections = [
    [
      'title' => 'Quickstart',
      'items' => [
        ['url' => '/:lang/quickstart', 'title' => '', 'active' => false]
      ]
    ],
    [
      'title' => 'Core Concepts',
      'items' => [
        ['url' => '/docs/:lang/concepts/routing',          'title' => '', 'active' => false],
        ['url' => '/docs/:lang/concepts/components',       'title' => '', 'active' => false],
        ['url' => '/docs/:lang/concepts/templates',        'title' => '', 'active' => false],
        ['url' => '/docs/:lang/concepts/dtos',             'title' => '', 'active' => false],
        ['url' => '/docs/:lang/concepts/filters',          'title' => '', 'active' => false],
        ['url' => '/docs/:lang/concepts/services',         'title' => '', 'active' => false],
        ['url' => '/docs/:lang/concepts/model-components', 'title' => '', 'active' => false],
        ['url' => '/docs/:lang/concepts/orm',              'title' => '', 'active' => false],
        ['url' => '/docs/:lang/concepts/config',           'title' => '', 'active' => false],
        ['url' => '/docs/:lang/concepts/cli',              'title' => '', 'active' => false],
        ['url' => '/docs/:lang/concepts/tasks',            'title' => '', 'active' => false]
      ]
    ],
    [
      'title' => 'Reference',
      'items' => [
        ['url' => '/docs/:lang/reference/attributes-orm', 'title' => '', 'active' => false],
        ['url' => '/docs/:lang/reference/cli-commands',   'title' => '', 'active' => false],
        ['url' => '/docs/:lang/reference/pipe-functions', 'title' => '', 'active' => false]
      ]
    ],
    [
      'title' => 'Recipes',
      'items' => [
        ['url' => '/docs/:lang/recipes/auth',    'title' => '', 'active' => false],
        ['url' => '/docs/:lang/recipes/uploads', 'title' => '', 'active' => false]
      ]
    ]
  ];
  public string $selected = '';
  public string $lang = 'es';

  public function run(): void {
    foreach ($this->sections as &$section) {
      // Nombre de la sección
      $section['title'] = $this->titles[$this->lang]['title-'.$section['title']];
      // Sub-elementos
      foreach ($section['items'] as &$item) {
        // Añado lang a la URL
        $item['url'] = str_ireplace(":lang", $this->lang, $item['url']);
        // Marco activo
        $pos = stripos($item['url'], $this->selected);
        if ($this->selected !== '' && $pos !== false) {
          $item['active'] = true;
        }
        // Añado título
        $parts = explode('/', $item['url']);
        $last = array_pop($parts);
        $item['title'] = $this->titles[$this->lang][$last];
      }
    }
  }
}
