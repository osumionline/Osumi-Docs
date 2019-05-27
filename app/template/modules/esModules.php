<div class="container">
  {{header}}
  {{menu}}
  <main>
    <h1>Módulos</h1>
    <p>Los módulos son las unidades lógicas de una aplicación. Puede haber tantas como se quiera o necesite y sirven para organizar el código de una manera ordenada y lógica.</p>
    <p>Cada módulo es un archivo PHP que contiene una clase con el nombre del módulo. Por ejemplo, el módulo <code>api</code> será un archivo llamado <code>api.php</code> y su contenido inicial sería este:</p>

<pre>
  &lt;?php
  class api extends OController{
    // Código del módulo
  }
</pre>

    <p>La clase tiene que heredar de la clase <code>OController</code> (una clase interna del framework, <a href="/es/funciones-internas#ocontroller">ver más</a>).</p>
    <p>A continuación, dentro de esta clase se definen las acciones, funciones públicas de la clase que se ejecutarán al llamar a las URLs definidas en el archivo <code>urls.json</code>.</p>
    <p>Estas funciones reciben un parámetro <code>$req</code> con información sobre la solicitud recibida, los parámetros recibidos, etc...</p>
    <p>Por ejemplo, la anterior clase <code>api</code> con una acción llamada <code>getUser</code> sería así:</p>

<pre>
  &lt;?php
  class api extends OController{
    /*
     * Función para obtener los datos de un usuario
     */
    public function getUser($req){
      // Código de la acción
    }
  }
</pre>

    <p>La variable <code>$req</code> recibida tiene estos campos:</p>

    <div class="data-table">
      <div class="data-header data-row">
        <div class="data-param">Parámetro</div>
        <div class="data-default">Valor por defecto</div>
        <div class="data-explanation">Explicación del parámetro</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">method</div>
        <div class="data-default">(no tiene)</div>
        <div class="data-explanation">Método HTTP de la llamada a la acción, en minúsculas. Por ejemplo <code>get</code> o <code>post</code>.</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">headers</div>
        <div class="data-default">(no tiene)</div>
        <div class="data-explanation">Cabeceras de la solicitud HTTP. Incluye campos como <code>Referer</code>, <code>User-Agent</code>... Dependen del tipo de servidor utilizado para servir la aplicación.</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">filter</div>
        <div class="data-default">(no tiene)</div>
        <div class="data-explanation">Si la acción tiene un filtro asociado, en este campo estarán los valores devueltos por él (<a href="/es/filtros">ver más</a>). En caso de no tener filtros, este campo no estará presente.</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">url_params</div>
        <div class="data-default">[]</div>
        <div class="data-explanation">
          Array con los parámetros recibidos en la llamada a la URL. En este campo se unen los parámetros recibidos por GET, POST, JSON... Es un array asociativo de PHP, por ejemplo:
          <br>
<pre>
  ["url_params"]=>
    array(2) {
      ["user"]=>
      string(10) "igorosabel"
      ["pass"]=>
      string(6) "123456"
    }
</pre>
        </div>
      </div>
    </div>

    <p>Además de estos campos, el array contendrá los valores de los parámetros dinámicos indicados en la URL.</p>
    <p>Si en el archivo <code>urls.json</code> se ha definido una URL como <code>/user/<strong>:id</strong></code>, la variable <code>$req</code> contendrá un campo llamado <code>id</code> con el valor de ese parámetro.</p>
    <p>Por ejemplo:</p>

<pre>
  URL: https://osumi.es/user/igorosabel
  $req['id']: "igorosabel"
</pre>

    <h3>getParam</h3>
    <p>El framework ofrece una serie de funciones para ayudar a la creación de aplicaciones y una de las más usadas en las acciones es una función estática de la clase <code>Base</code> llamada <code>getParam</code></p>
    <p>Está función acepta tres parámetros:</p>
    <ul>
      <li>Parámetro que se busca, por ejemplo <code>user</code>.</li>
      <li>Lista de parámetros en los que buscar, por ejemplo <code>$req['url_params']</code>.</li>
      <li>Valor por defecto en caso de que no se encuentre dicho parámetro, por ejemplo <code>false</code>.</li>
    </ul>

    <p>Con esta clase se puede obtener el parámetro deseado a la vez que se comprueba que realmente ha llegado.</p>
    <p>Por ejemplo, en una acción llamada <code>login</code> que sirva para iniciar sesión en un sitio, se esperan dos parámetros: <code>user</code> y <code>pass</code>.</p>
    <p>Se pueden obtener y comprobar de este modo:</p>

<pre>
  public function login($req){
    $user = Base::getParam('user', $req['url_params'], false);
    $pass = Base::getParam('pass', $req['url_params'], false);

    if ($user===false || $pass===false){
      // Código a ejecutar en caso de que falte alguno de los dos parámetros esperados
    }
  }
</pre>

    <h3>Pasando valores a los templates</h3>
    <p>Una acción recibe datos, los manipula y luego devuelve la respuesta en forma de <code>template</code>. Cada acción tiene una <code>template</code> asociada.</p>
    <p>Por ejemplo, el módulo <code>api</code> y la acción <code>login</code> tendrá un archivo llamado <code>app/template/<strong>api</strong>/<strong>login.php</strong></code>.</p>
    <p>Este archivo, a pesar de tener una extensión <code>.php</code> (es obligatorio), se interpreta como un archivo de texto plano y dependiendo del tipo definido en el archivo <code>urls.json</code> se devolverá de una forma u otra.</p>
    <p>Pero las acciones tienen que devolver información que tienen que pasar a los templates. Siguiendo el anterior ejemplo, el archivo <code>login.php</code> tendría este aspecto:</p>

<pre>
  {
    "status": "{{status}}",
    "id": {{id}},
    "fullName": "{{full_name}}",
    "token": "{{token}}"
  }
</pre>

    <p>Mediante la sintaxis de doble corchetes se indican campos que serán sustituidos por la acción.</p>
    <p>Para hacer esto, el módulo puede usar una función de la clase <code>OController</code> de la que hereda llamada <code>getTemplate</code>. Esta función devuelve un objeto <code>OTemplate</code> (<a href="/es/funciones-internas#otemplate">ver más</a>), otra clase interna del framework, que permite manipular el template.</p>
    <p>La clase <code>OTemplate</code> ofrece dos métodos con los que pasar información a los templates: <code>add</code> y <code>addPartial</code>.</p>

    <h4>add</h4>
    <p>Esta función simplemente pasa el valor indicado a uno de los campos del template. Por ejemplo:</p>

<pre>
  public function login($req){
    // Código de la función

    $this->getTemplate()->add('status', $status);
  }
</pre>

    <p>Esto es:</p>
    <ul>
      <li>Se accede al método <code>getTemplate</code> de la clase actual, método ofrecido por la clase <code>OController</code> de la que hereda.</li>
      <li>A traves de esta llamada se llama a la función <code>add</code> a la que se le pasan dos parámetros: nombre del campo en el template y valor a introducir.</li>
      <li>En este caso, el apartado <code>{{status}}</code> del template se substituiría por el contenido de la variable <code>$status</code>.
    </ul>

    <p>Los nombres de los campos en los templates no tienen ningún requisito, pueden ser texto en minúsculas o mayúsculas, número, contener espacios... Simplemente son "huecos" que se definen entre dos corchetes.</p>

    <h4>addPartial</h4>
    <p>En ocasiones es necesario devolver no solo un valor, sino una lista o datos más complejos.</p>
    <p>Para estas situaciones, la clase <code>OTemplate</code> ofrece la función <code>addPartial</code> que permite incluir un archivo con código ejecutable.</p>
    <p>El funcionamiento es parecido al de la función <code>add</code>, se indica un lugar del template en el que realizar la substitución y "qué" es lo que se tiene que introducir.</p>
    <p>Por ejemplo:</p>

<pre>
  El template:

  {
    "userList": [{{list}}]
  }

  La acción:
  /*
   * Función para obtener una lista de usuarios
   */
  public function getUserList($req){
    // Código de la función para obtener la lista de usuarios en la variable $list

    $this->getTemplate()->addPartial('list', 'api/user_list', ['list' => $list]);
  }
</pre>
    <ul>
      <li>La función recibe tres parámetros: nombre del hueco en el template, nombre del partial a incluir y valores que se pasan al partial.</li>
      <li>El primer parámetro en el ejemplo, <code>list</code> es el nombre <code>{{list}}</code> que hay en el template.</li>
      <li>
        El segundo nombre es el nombre del archivo partial a incluir. En el ejemplo se indica <code>api/user_list</code>.
        <br>
        Los partials se guardan en la carpeta <code>app/template/partials</code> y dentro de esta carpeta se pueden crear sub-carpetas para organizar el código.
        <br>
        En este caso, al indicar <code>api/user_list</code>, el framework buscará el archivo <code>app/template/partials/api/user_list.php</code>.
        <br>
        Los partials son archivos PHP que se ejecutan, y su resultado es lo que se incluye en el template.
      </li>
      <li>
        El tercer parámetro son los valores que se pasan al partial. Si el partial es un archivo estático, por ejemplo una cabecera, un logo... y no va a necesitar parámetros, no es necesario pasarle nada.
        <br>
        El partial recibe una variable llamada <code>$values</code> que contiene lo pasado en el tercer parámetro. En este caso <code>$values['list']</code> sería la lista de usuarios que se le pasa.
      </li>
    </ul>

    <p>Un partial puede contener todo tipo de código PHP ejecutable. Por ejemplo:</p>

<pre>
  &lt;?php foreach ($values['list'] as $user): ?>
    {
      // datos del usuario...
    }
  <&lt;?php endforeach ?>
</pre>

    <p>El resultado de esta ejecución luego se incluiría en el template.</p>

    <h3>Métodos disponibles para los módulos</h3>
    <p>Las clases de los módulos tienen que heredar de la clase <code>OController</code> y esta ofrece varios métodos que pueden usarse en las acciones. Por ejemplo ya se ha explicado el método <code>getTemplate</code>. Estos son los métodos disponibles:</p>

    <div class="data-table">
      <div class="data-header data-row">
        <div class="data-param">Función</div>
        <div class="data-explanation">Explicación de la función</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">getConfig</div>
        <div class="data-explanation">Función que devuelve un objeto <code>OConfig</code> con la configuración del sitio. Este objeto contiene todas los valores de configuración del archivo <code>config.json</code>.</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">getDB</div>
        <div class="data-explanation">Función que devuelve un objeto <code>ODB</code> con el que hacer consultas a la base de datos.</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">getTemplate</div>
        <div class="data-explanation">Función que devuelve un objeto <code>OTemplate</code> con el que manipular el template devuelto por cada acción.</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">getLog</div>
        <div class="data-explanation">Función que devuelve un objeto <code>OLog</code> con el que guardar datos en un log de texto.</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">getSession</div>
        <div class="data-explanation">Función que devuelve un objeto <code>OSession</code> con el que acceder a la sesión del usuario. Se pueden así guardar u obtener valores persistentes.</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">getCookie</div>
        <div class="data-explanation">Función que devuelve un objeto <code>OCookie</code> con el que acceder a las cookies del usuario.</div>
      </div>
    </div>

    <div class="previous-next">
      <a href="/es/urls" class="previous">URLs</a>
      <a href="/es/servicios" class="next">Servicios</a>
    </div>
  </main>
  {{footer}}
  </div>