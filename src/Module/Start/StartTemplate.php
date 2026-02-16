{{ header }}

{{ nav }}

<main class="content">
	<article class="home">
		<h2>Osumi Framework</h2>
		<?php if ($lang === 'es'): ?>
			<p>Osumi Framework es un pequeño proyecto personal que he ido madurando y mejorando con el tiempo, a medida que experimentaba y aprendía.</p>
			<p>Está orientado al modelo MVC (Modelo, Vista, Controlador) para la creación de aplicaciones web, tanto pequeñas como grandes.</p>
			<p>También permite la creación de scripts ejecutables desde línea de comandos.</p>
			<p>El framework ha ido evolucionando desde un conjunto de scripts y utilidades, a ser un framework completo con:</p>
			<ul>
				<li>Gestión de rutas.</li>
				<li>Código modularizado, dividiendo las funcionalidades en componentes reutilizables.</li>
				<li>Completo ORM que permite acceder a varios tipos de bases de datos.</li>
				<li>Completo sistema de plugins para gestionar tokens JWT, manipulación de imágenes, gestión de archivos...</li>
				<li>CLI que ayuda con gestiones del framework o la creación de funcionalidades propias.</li>
			</ul>
			<p>Usando Composer se puede obtener el framework completo junto con una demo que lo usa. También permite la instalación de plugins o la actualización de sus componentes.
		<?php endif ?>
		<?php if ($lang === 'en'): ?>
			<p>Osumi Framework is a small personal project that I've been developing and improving over time, as I've experimented and learned.</p>
			<p>It's based on the MVC (Model-View-Controller) pattern for creating web applications, both small and large.</p>
			<p>It also allows the creation of executable scripts from the command line.</p>
			<p>The framework has evolved from a collection of scripts and utilities to a complete framework with:</p>
			<ul>
				<li>Route management.</li>
				<li>Modularized code, dividing functionalities into reusable components.</li>
				<li>A complete ORM that allows access to various types of databases.</li>
				<li>A comprehensive plugin system for managing JWT tokens, image manipulation, file management, and more.</li>
				<li>A CLI that assists with framework management and the creation of custom functionalities.</li>
			</ul>
			<p>Using Composer, you can obtain the complete framework along with a demo that uses it. It also allows for the installation of plugins and the updating of its components.</p>
		<?php endif ?>
		<?php if ($lang === 'eu'): ?>
			<p>Osumi Framework denboran zehar garatu eta hobetzen joan naizen proiektu pertsonal txiki bat da, esperimentatu eta ikasi ahala.</p>
			<p>Web aplikazioak sortzeko MVC (Model-View-Controller) ereduan oinarritzen da, txikiak zein handiak.</p>
			<p>Komando-lerrotik script exekutagarriak sortzea ere ahalbidetzen du.</p>
			<p>Framework-a script eta utilitate bilduma batetik framework oso batera eboluzionatu da, honako hauekin:</p>
			<ul>
				<li>Ibilbideen kudeaketa.</li>
				<li>Kode modularizatua, funtzionaltasunak berrerabilgarri diren osagaietan banatuz.</li>
				<li>Datu-base mota desberdinetarako sarbidea ahalbidetzen duen ORM oso bat.</li>
				<li>JWT tokenak kudeatzeko, irudien manipulaziorako, fitxategien kudeaketarako eta gehiagorako plugin sistema integral bat.</li>
				<li>Framework-aren kudeaketan eta funtzionalitate pertsonalizatuak sortzen laguntzen duen CLI bat.</li>
			</ul>
			<p>Composer erabiliz, framework osoa lor dezakezu, hura erabiltzen duen demo batekin batera. Pluginak instalatzea eta bere osagaiak eguneratzea ere ahalbidetzen du.</p>
		<?php endif ?>
	</article>
</main>
