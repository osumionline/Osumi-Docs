<div class="container">
  {{header}}
  {{menu}}
  <main>
    <h1>Instalación</h1>
    <p>El framework se puede instalar en cualquier servidor con Apache2 y PHP 5.3 (recomiendo usar PHP 7.2, el framework está optimizado para poder usar esta última versión).</p>
    <p>MySQL no es necesario pero en caso de querer usarlo el requisito es que sea de la versión 5.1 o superior. También se puede usar MariaDB 10.1 o superior.</p>
    <p>Para realizar la instalación hay dos formas:</p>
    <ol>
      <li>Instalación mediante git</li>
      <li>Descargar el código en zip</li>
      <li>Composer</li>
      <li>Creador</li>
    </ol>

    <h3>Instalación mediante git</h3>
    <p>Ejecutando el siguiente comando se puede obtener una copia completa:</p>
    <p><code>git clone https://github.com/igorosabel/Osumi-Framework.git</code></p>
    <p>Esto creará una carpeta llamada <code>Osumi-Framework</code> en el directorio en el que se haya ejecutado el comando</p>

    <h3>Descargar el código en zip</h3>
    <p>Pulsando en el siguiente enlace se puede bajar un archivo zip con todo el contenido del repositorio desde Github:</p>
    <p><a href="https://github.com/igorosabel/Osumi-Framework/archive/master.zip">Descargar zip (529 KB)</a></p>
    <p>Al pulsar, se descargará un archivo llamado <code>Osumi-Framework-master.zip</code> con el contenido del repositorio.</p>

    <h3>Composer</h3>
    <p>El framework dispone de una utilidad llamada <code>Composer</code> que permite exportar todo el contenido de una aplicación a un solo archivo PHP que luego se puede copiar o llevar donde sea necesario.</p>
    <p>Por ejemplo para mover una aplicación de un sitio a otro, hacer una copia de seguridad...</p>
    <p>Primero hay que descargar el archivo zip que contiene este archivo PHP desde Github:</p>
    <p><a href="https://github.com/igorosabel/Osumi-Framework/files/1895073/ofw_composer.zip">Descargar zip (500 KB)</a></p>
    <p>Dentro de este archivo zip hay un archivo llamado <code>ofw_composer.php</code></p>
    <p>Ejecutando el siguiente comando se extrae todo el contenido de este archivo <code>Composer</code>:</p>
    <p><code>php ofw_composer.php</code></p>

    <h3>Creador</h3>
    <p>He creado una aplicación llamada <strong>Creador</strong> que permite mediante una interfaz web diseñar y configurar una aplicación desde cero.</p>
    <p><a href="https://creador.osumi.es" target="_blank">https://creador.osumi.es</a></p>
    <p>En esta aplicación se puede diseñar toda la configuración del sitio, los modelos de base de datos, librerías que se pueden añadir a la parte frontal (Angular, jQuery, Bootstrap...) y finalmente se puede generar un archivo ZIP que se puede descargar.</p>
    <p>El Creador deja los apartados de URLs y controladores vacíos para empezar a programar.</p>
    <div class="image-gallery">
      <div class="image-container">
        <img class="image-item" src="/img/cr1.png" alt="Creador: Proyecto" title="Creador: Proyecto">
      </div>
      <div class="image-container">
        <img class="image-item" src="/img/cr2.png" alt="Creador: Módulos" title="Creador: Módulos">
      </div>
      <div class="image-container">
        <img class="image-item" src="/img/cr3.png" alt="Creador: Modelo" title="Creador: Modelo">
      </div>
      <div class="image-container">
        <img class="image-item" src="/img/cr4.png" alt="Creador: Incluir" title="Creador: Incluir">
      </div>
      <div class="image-container">
        <img class="image-item" src="/img/cr5.png" alt="Creador: Descargar" title="Creador: Descargar">
      </div>
    </div>
    <p>El código de esta aplicación también se encuentra en GitHub con licencia MIT:</p>
    <ul>
      <li>Aplicación web (front): <a href="https://github.com/igorosabel/Creador" target="_blank">https://github.com/igorosabel/Creador</a></<li>
      <li>API de la aplicación (backend): <a href="https://github.com/igorosabel/ApiCreador" target="_blank">https://github.com/igorosabel/ApiCreador</a></li>
    </ul>

    <h3>Instalación</h3>
    <p>Una vez se dispone de todo el código hay que realizar los siguientes pasos:</p>
    <p>Junto con la aplicación se incluye código de ejemplo para una simple aplicación de fotos: un listado de usuarios y el detalle de un usuario. También se incluye un ejemplo de llamada AJAX para la creación de una API.</p>
    <p>Borrar todo el código de ejemplo es sencillo, hay que borrar todo el contenido de las siguientes carpetas (el contenido, <strong>no las carpetas</strong>):</p>
    <ul>
      <li><code>app/cache</code></li>
      <li><code>app/controller</code></li>
      <li><code>app/filter</code></li>
      <li><code>app/model</code></li>
      <li><code>app/service</code></li>
      <li><code>app/task</code></li>
      <li>Todas las carpetas en <code>app/template</code> excepto <code>layout</code> y <code>partials</code></li>
      <li><code>ofw/sql</code></li>
      <li>Todos los archivos en <code>web</code> excepto el archivo <code>.htaccess</code> y el archivo <code>index.php</code></li>
    </ul>
    <p>Una vez borrado todo el código de ejemplo se puede empezar el proceso de creación de una nueva aplicación.</p>
    <p>El archivo <code>app/config/config.json</code> contiene la configuración del sitio, se explica más detalladamente en <a href="/configuration">Configuración</a>.</p>
    <p>Hay que editar el archivo <code>web/.htaccess</code> para configurar la redirección a <code>https</code> en caso de querer usar. Las líneas 14 y 15 son las que hacen la redirección forzada a <code>https</code>:</p>
    <p>
      <code>
        RewriteCond %{SERVER_PORT} 80
        <br>
        RewriteRule ^(.*)$ https://ofw.osumi.es/$1 [R,L]
      </code>
    </p>
    <p>En caso de no querer usar <code>https</code> basta con comentar estas dos líneas. Recomiendo <strong>encarecidamente</strong> usar <code>https</code> con <a href="https://letsencrypt.org/" target="_blank">Let's Encrypt</a></p>
    <p>Con esto la aplicación estaría lista para empezar a ser programada.</p>
    <p>A continuación se explica la estructura de las carpetas que componen el framework: <a href="/structure">Estructura</a></p>

    <div class="previous-next">
      <a href="/" class="previous">Inicio</a>
      <a href="/es/estructura" class="next">Estructura</a>
    </div>
  </main>
  {{footer}}
</div>
