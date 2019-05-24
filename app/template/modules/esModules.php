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

    <p>La clase tiene que heredar de la clase <code>OController</code> (una clase interna del framework).</p>
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
    <p>Para hacer esto, el módulo puede usar una función de la clase <code>OController</code> de la que hereda llamada <code>getTemplate</code>. Esta función devuelve un objeto <code>OTemplate</code>, otra clase interna del framework, que permite manipular el template.</p>
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

    <div class="previous-next">
      <a href="/es/urls" class="previous">URLs</a>
      <a href="/es/servicios" class="next">Servicios</a>
    </div>
  </main>
  {{footer}}
  </div>