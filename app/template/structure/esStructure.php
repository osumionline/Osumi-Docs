<div class="container">
  {{header}}
  {{menu}}
  <main>
    <h1>Estructura</h1>
    <p>Osumi Framework se compone principalmente de 3 carpetas:</p>
    <ol>
      <li><code>app</code>: carpeta del usuario. El código creado por el usuario para crear su aplicación va en las subcarpetas que hay dentro de <code>app</code></li>
      <li><code>ofw</code>: carpeta del framework. En esta carpeta están los archivos y carpetas que componen el Framework</li>
      <li><code>web</code>: carpeta pública. El <code>DocumentRoot</code> debe apuntar a esta carpeta y los archivos <code>index.php</code> y <code>.htaccess</code> que hay en su interior son los encargados de recibir todas las peticiones y llamar a las funciones apropiadas.</li>
    </ol>
    <h3>Ciclo de ejecución</h3>
    <p>En Osumi Framework, este es el ciclo de ejecución de cada solicitud:</p>
    <ul>
      <li>Una URL es llamada, por ejemplo <code>/user/igorosabel</code></li>
      <li>
        Se busca en el archivo <code>urls.json</code> dicha URL. En caso de no encontrarse, se devuelve un error 404 (se puede configurar donde hay que redirigir al usuario en este caso).
        <p>Este sería un ejemplo completo de <code>urls.json</code></p>
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
      }
    ]
  }
</pre>
      </li>
      <li>
        Para este ejemplo, esta sería la URL en el archivo <code>urls.json</code>, en el módulo <code>home</code>:
        <br>
<pre>
  {
    "id": "page_user",
    "url": "/user/:id",
    "action": "userPage",
    "comment": "Página de un usuario"
  }
</pre>
      </li>
      <li>En este caso la URL coincide en <code>/user/</code> e <code>igorosabel</code> sería interpretado como un valor dinámico que se pasaría como <code>id</code>. </li>
      <li>Al coincidir esta URL, se ejecutaría el módulo <code>home</code> y la acción <code>userPage</code></li>
      <li>En la carpeta <code>app/controller</code> hay un archivo PHP por cada módulo definido en el archivo <code>urls.json</code></li>
      <li>Cada archivo PHP contiene una clase con el nombre del módulo y dentro hay una función por cada acción del módulo.</li>
      <li>Antes de ejecutar la acción correspondiente, se pueden definir <code>filtros</code> que hacen una función previa, por ejemplo comprobar si un usuario tiene permiso para acceder a un apartado concreto.</li>
      <li>En este caso, se ejecutará la función <code>userPage</code> de la clase <code>home</code> del archivo <code>app/controller/home.php</code></li>
      <li>Tras ejecutarse el código de la función, se carga la plantilla.</li>
      <li>La plantilla se compone del <code>layout</code> o plantilla principal y la plantilla asociada a cada acción. Las plantillas están en la carpeta <code>app/template</code>.</li>
      <li>En esta carpeta hay una carpeta <code>layout</code> donde va la plantilla principal y una carpeta por cada módulo. En estás carpetas hay un archivo PHP por cada acción.</li>
      <li>En las plantillas se pueden definir "huecos" que se substituirán con valores de la función acción.</li>
      <li>Finalmente, se pueden utilizar archivos CSS, JS o imágenes, situados en la carpeta <code>web</code>.</li>
    </ul>
    <h3>Carpetas que componen el framework</h3>
    <p>La carpeta <code>app</code> contiene el código de cada aplicación creada por el usuario.</p>
    <ul>
      <li><code>app/cache</code>: Carpeta con objetos cacheados. Osumi Framework proporciona un sistema de cache con el que almacenar objetos JSON complejos. Por ejemplo, el propio Framework crea un archivo llamado <code>urls.cache.json</code> en el que se guarda una estructura más eficiente del archivo de URLs para un acceso más rápido.</li>
      <li>
        <code>app/config</code>: Carpeta con los archivos de configuración. En esta carpeta hay 3 archivos:
        <ol>
          <li><code>config.json</code>: Archivo con la configuración global. Ver <a href="/es/configuracion">Configuración</a>.</li>
          <li><code>translations.json</code>: Archivo con las traducciones para un sitio multi-idioma. Ver <a href="/es/traducciones">Traducciones</a>.</li>
          <li><code>urls.json</code>: Archivo con las URLs y las acciones que se ejecutarán al acceder a ellas. Ver <a href="/es/urls">URLs</a>.</li>
        </ol>
      </li>
      <li><code>app/controller</code>: Carpeta para los módulos que contienen la lógica de la aplicación. Ver <a href="/es/controladores">Controladores</a>.</li>
      <li><code>app/filter</code>: Carpeta para los filtros que se ejecutan ANTES de las acciones de los módulos. Cada filtro va en un archivo separado. Ver <a href="/es/filtros">Filtros</a>.</li>
      <li><code>app/model</code>: Carpeta para las clases que componen el modelo. Tiene que haber un archivo por cada clase y cada clase representa una tabla de la base de datos. También puede haber clases personalizadas. Ver <a href="/es/modelo">Modelo</a>.</li>
      <li><code>app/service</code>: Carpeta para los servicios, clases auxiliares con funciones que se pueden reutilizar a lo largo de toda la aplicación. Ver <a href="/es/servicios">Servicios</a>.</li>
      <li><code>app/task</code>: Carpeta para las tareas que se pueden ejecutar desde línea de comandos mediante el archivo <code>ofw.php</code>. Ver <a href="/es/tareas">Tareas</a>.</li>
      <li>
        <code>app/template</code>: Carpeta para las plantillas de los módulos/acciones. Se divide en varias carpetas:
        <ol>
          <li><code>layout</code>: Carpeta para las plantillas globales, puede haber tantas como se quiera, pero si no se configuran plantillas globales personalizadas es obligatorio que haya una llamada <code>default.php</code>.</li>
          <li><code>partials</code>: Carpeta para las plantillas parciales. Estas plantillas son pequeñas piezas que se pueden repetir, por ejemplo elementos de un listado. Aceptan código PHP.</li>
          <li>Resto de carpetas: por cada módulo se crea una carpeta con el nombre del módulo.</li>
        </ol>
      </li>
    </ul>
    <p>La carpeta <code>logs</code> contiene los logs generados por el sistema interno de logs <code>OLog</code> (en caso de que el <code>modo debug</code> esté activado).</p>
    <p>La carpeta <code>ofw</code> contiene el código interno del framework.</p>
    <ul>
      <li><code>ofw/base</code>: Carpeta para las utilidades y clases internas del framework.</li>
      <li><code>ofw/lib</code>: Carpeta para las librerías de terceros. Entre ellas hay librerías utilizadas por el propio framework, y en caso de que el usuario decida usar alguna librería de terceros también iría en esta carpeta.</li>
      <li><code>ofw/sql</code>: Carpeta para el código SQL generado. El framework proporciona una tarea llamada <code>generateModel</code> con la que a partir de las clases del modelo definidas por el usuario, se crea un archivo SQL con el que generar toda la base de datos.</li>
      <li><code>ofw/task</code>: Carpeta para las tareas que proporciona el propio framework. Ver <a href="/es/tareas">Tareas</a>.</li>
      <li><code>ofw/tmp</code>: Carpeta para datos temporales. Por ejemplo en esta carpeta se generan archivos temporales usados en el procesamiento de imagenes. Al utilizar la tarea <code>Composer</code>, el resultado se genera en esta carpeta (ver <a href="/es/tareas">Tareas</a>).</li>
    </ul>
    <p>La carpeta <code>web</code> es la parte pública, donde van situados los archivos estáticos expuestos a Internet.</p>
    <ul>
      <li><code>web/css</code>: Carpeta para los archivos CSS definidos en el archivo de configuración.</li>
      <li><code>web/js</code>: Carpeta para los archivos JavaScript definidos en el archivo de configuración.</li>
    </ul>
    <div class="previous-next">
      <a href="/es/instalacion" class="previous">Instalación</a>
      <a href="/es/configuracion" class="next">Configuración</a>
    </div>
  </main>
  {{footer}}
</div>
