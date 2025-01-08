<div class="tabs">
  <div class="tabs__header">
<?php foreach ($tabs as $i => $tab): ?>
    <a id="tab-label-<?php echo $i ?>" href="#"<?php if ($i === 0): ?> class="selected"<?php endif ?>>
      <?php echo $tab['label'] ?>
    </a>
<?php endforeach ?>
  </div>
<?php foreach ($tabs as $i => $tab): ?>
  <div id="tab-content-<?php echo $i ?>" class="tabs__content<?php if ($i === 0): ?> selected<?php endif ?>">
    <?php echo $tab['content'] ?>
  </div>
<?php endforeach ?>
</div>
