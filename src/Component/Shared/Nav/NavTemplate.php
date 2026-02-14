
<nav class="sidebar" id="sidebar">
  <ul class="menu">
    <?php foreach ($sections as $section): ?>
      <li class="menu-section">
        <button class="menu-title">
          <?php echo $section['title'] ?>
          <span class="chevron"></span>
        </button>
        <ul class="submenu">
          <?php foreach ($section['items'] as $item): ?>
          <li<?php echo $item['active'] ? ' class="active"' : '' ?>><a href="<?php echo $item['url'] ?>"><?php echo $item['title'] ?></a></li>
          <?php endforeach ?>
        </ul>
      </li>
    <?php endforeach ?>
  </ul>
</nav>
