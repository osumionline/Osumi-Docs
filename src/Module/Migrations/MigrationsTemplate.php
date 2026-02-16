{{ header }}

{{ nav }}

<main class="content">
	<article class="home">
		<?php if ($lang === 'es'): ?>
			<h2>Migraciones</h2>
		<?php endif ?>
		<?php if ($lang === 'en'): ?>
			<h2>Migrations</h2>
		<?php endif ?>
		<?php if ($lang === 'eu'): ?>
			<h2>Migrazioak</h2>
		<?php endif ?>
		<ul>
		<?php foreach ($list as $item): ?>
			<li>
				<a href="/<?php echo $lang ?>/migrations/<?php echo $item['slug'] ?>">
					<?php echo $item['from'] ?> → <?php echo $item['to'] ?>
				</a>
			</li>
		<?php endforeach ?>
		</ul>
	</article>
</main>
