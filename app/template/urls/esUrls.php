<div class="container">
  {{header}}
  {{menu}}
  <main>
    <h1>URLs</h1>
    <p>El archivo de configuración <code>urls.json</code> define las rutas o URLs con las que se puede acceder a la aplicación. Se trata de un archivo JSON que contiene un objeto con una clave llamada <code>urls</code> que es un array con las rutas disponibles.</p>
    <p>Cada ruta es un objeto JSON con esta forma:</p>

<pre>
  {
    "id": "page_start",
    "url": "/",
    "module": "home",
    "action": "start",
    "comment": "Start page"
  }
</pre>

    <p>Cada objeto puede tener estos parámetros:</p>
    <div class="data-table">
      <div class="data-header data-row">
        <div class="data-param">Parámetro</div>
        <div class="data-default">Valor por defecto</div>
        <div class="data-explanation">Explicación del parámetro</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">id</div>
        <div class="data-default">(no tiene)</div>
        <div class="data-explanation">Identificador único de cada ruta. Sirve para generar URLs de manera dinámica mediante la función <code>OURL::generateUrl()</code>. No es obligatorio.</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">url</div>
        <div class="data-default">(no tiene)</div>
        <div class="data-explanation">
          URL relativa que se quiere definir. Por ejemplo, para definir la URL "https://osumi.es<strong>/news</strong>", en este campo habría que indicar <code>/news</code>.
          <br>
          En estas urls se pueden indicar campos dinámicos mediante el carácter " : ". Por ejemplo se puede definir la URL <code>/user/:id</code> de modo que funcionaría si alguien accede a <code>https://osumi.es/user/1</code> o <code>https://osumi.es/user/igorosabel</code>.
          <br>
          Este valor llegará al controlador en la variable <code>$req</code>.
          <br>
          Es un valor obligatorio.
        </div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">module</div>
        <div class="data-default">(no tiene)</div>
        <div class="data-explanation">
          Nombre del módulo que contiene la acción que se ejecutará al activarse una URL.
          <br>
          Por ejemplo, si se indica <code>home</code>, el framework buscará el archivo <code>app/controller/home.php</code>, que deberá contener una clase PHP llamada <code>home</code>.
          <br>
          Es un valor obligatorio.
        </div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">action</div>
        <div class="data-default">(no tiene)</div>
        <div class="data-explanation">
          Nombre la función que se ejecutará al activarse una URL.
          <br>
          Por ejemplo, si se indica <code>start</code>, al acceder a la URL se ejecutará la función <code>start()</code> que deberá estar dentro de la clase indicada en el campo <code>module</code> anterior.
          <br>
          Es un valor obligatorio.
        </div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">comment</div>
        <div class="data-default">(no tiene)</div>
        <div class="data-explanation">Texto libre para ayudar a describir la URL. No es obligatorio.</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">type</div>
        <div class="data-default">(no tiene)</div>
        <div class="data-explanation">
          Tipo de respuesta que se devolverá.
          <ul>
            <li><code>html</code>: es el valor por defecto. Las URLs de este tipo toman el <code>layout</code> indicado, cargan el <code>template</code> asociado al controlador y devuelven una respuesta de tipo <code>Content type: text/html</code>.</li>
            <li><code>json</code>: las URLs de este tipo no cargan ningún <code>layout</code> y directamente cargan el <code>template</code> asociado. Devuelve una respuesta de tipo <code>Content type: text/json</code>.</li>
            <li><code>xml</code>: las URLs de este tipo no cargan ningún <code>layout</code> y directamente cargan el <code>template</code> asociado. Devuelve una respuesta de tipo <code>Content type: text/xml</code>.</li>
          </ul>
          No es obligatorio.
        </div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">prefix</div>
        <div class="data-default">(no tiene)</div>
        <div class="data-explanation">Prefijo a añadir a todas las URLs de un bloque de URLs. No es obligatorio.</div>
      </div>
      <div class="data-divider"></div>
      <div class="data-row">
        <div class="data-param">urls</div>
        <div class="data-default">[]</div>
        <div class="data-explanation">Sirve para definir una URL como un bloque de URLs y así realizar agrupaciones o bloques de URLs. No es obligatorio.</div>
      </div>
    </div>

    <h3>Anidando URLs</h3>
    <p>El framework ofrece un mecanismo para crear "grupos de URLs" de modo que se puedan agrupar de manera lógica y ayudar a la gestión de grandes grupos de URLs.</p>
    <p>Si una URL contiene el campo <code>urls</code>, dentro de este se pueden añadir nuevas URLs. Estas nuevas URLs heredarán las características de sus padres, a no ser que tengan campos para indicar lo contrario.</p>
    <p>Por ejemplo:</p>

<pre>
  {
    "urls": [
      {
        "id": "pages",
        "module": "home",
        "urls": [
          {
            "id": "page_start",
            "url": "/",
            "action": "start",
            "comment": "Start page"
          },
          {
            "id": "page_user",
            "url": "/user/:id",
            "action": "user",
            "comment": "User page"
          }
        ]
      },
      {
        "id": "api",
        "module": "api",
        "type": "json",
        "prefix": "/api",
        "urls": [
          {
            "id": "get_date",
            "url": "/getDate",
            "action": "getDate",
            "comment": "Function to get the date"
          }
        ]
      }
    ]
  }
</pre>

    <p>En este ejemplo hay dos bloques de URLs: <code>pages</code> y <code>api</code>.</p>
    <ul>
      <li>En <code>pages</code> se indica que el módulo es <code>home</code>, de modo que sus hijos no tienen por qué indicarlo.</li>
      <li>El segundo bloque, <code>api</code>, indica el <code>type: json</code>, de modo que todos sus hijos devolverán objetos JSON.</li>
      <li>
        También tiene el campo <code>prefix</code>, de modo que todos sus hijos, en la URL indicada, tendrán delante <code>/api</code>.
        <br>
        En el ejemplo se indica la URL <code>/getDate</code>, pero su URL completa sería <code>/api/getDate</code>.
      </li>
      <li>A su vez estas "sub-URLs" podrían tener otro campo <code>urls</code> y así crear estructuras anidadas más complejas.</li>
    </ul>

    <p>El framework lee este archivo y lo compila a un archivo llamado <code>/app/cache/urls.cache.json</code> de modo que si se modifica el archivo <code>urls.json</code> hay que ejecutar la tarea <code>updateUrls</code> para que vuelva a generarlo. Para más infomación, ver <a href="/es/tareas">Tareas</a>.</p>

    <div class="previous-next">
      <a href="/es/configuracion" class="previous">Configuración</a>
      <a href="/es/modulos" class="next">Módulos</a>
    </div>
  </main>
  {{footer}}
  </div>
