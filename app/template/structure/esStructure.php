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
      <li>Se busca en el archivo <code>urls.json</code> dicha URL. En caso de no encontrarse, se devuelve un error 404 (se puede configurar donde hay que redirigir al usuario en este caso).</li>
      <li>
        Para este ejemplo, esta sería la URL en el archivo <code>urls.json</code>, en el módulo <code>user</code>:
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
      <li>En este caso la URL coincide en <code>/user/</code> e <code>igorosabel</code> sería interpretado como un valor dinámico que se pasaría como <code>id</code></li>
      <li>Al coincidir esta URL, se ejecutaría el módulo <code>user</code> y la acción <code>userPage</code></li>
      <li>En la carpeta <code>app/controller</code> hay un archivo PHP por cada módulo definido en el archivo <code>urls.json</code></li>
      <li>Cada archivo PHP contiene una clase con el nombre del módulo y dentro hay una función por cada acción del módulo.</li>
      <li>Antes de ejecutar la acción correspondiente, se pueden definir <code>filtros</code> que hacen una función previa, por ejemplo comprobar si un usuario tiene permiso para acceder a un apartado concreto.</li>
      <li>En este caso, se ejecutará la función <code>userPage</code> de la clase <code>user</code> del archivo <code>app/controller/user.php</code></li>
      <li>Tras ejecutarse el código de la función, se carga la plantilla.</li>
      <li>La plantilla se compone del <code>layout</code> o plantilla principal y la plantilla asociada a cada acción. Las plantillas están en la carpeta <code>app/template</code>.</li>
      <li>En esta carpeta hay una carpeta <code>layout</code> donde va la plantilla principal y una carpeta por cada módulo. En estás carpetas hay un archivo PHP por cada acción.</li>
      <li>En las plantillas se pueden definir "huecos" que se substituirán con valores de la función acción.</li>
      <li>Finalmente, se pueden utilizar archivos CSS, JS o imágenes, situados en la carpeta <code>web</code>.</li> 
    </ul>
    <h3>Carpetas que componen el framework</h3>
    <ul>
      <li><code>app/cache</code>: Carpeta con objetos cacheados. Osumi Framework proporciona un sistema de cache con el que almacenar objetos JSON complejos. Por ejemplo, el propio Framework crea un archivo llamado <code>urls.cache.json</code> en el que se guarda una estructura más eficiente del archivo de URLs para un acceso más rápido.</li>
      <li><code>app/config</code>: Carpeta con los archivos de configuración. En esta carpeta hay 3 archivos:</li>
    </ul>
    <div class="previous-next">
      <a href="/es/instalacion" class="previous">Instalación</a>
      <a href="/es/configuracion" class="next">Configuración</a>
    </div>
  </main>
  {{footer}}
</div>
