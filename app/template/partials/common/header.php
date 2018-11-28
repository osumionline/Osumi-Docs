<header>
  <button id="menu-btn" class="button-left"><img src="/img/menu.svg"></button>
  Osumi Framework
  <button id="language-btn" class="button-right"><img src="/img/language.svg"></button>
  <ul class="language-selector">
    <li><a href="<?php echo $values['cas'] ?>"<?php if ($values['lang']=='cas'): ?> class="active"<?php endif ?>>CAS</a></li>
    <li><a href="<?php echo $values['eng'] ?>"<?php if ($values['lang']=='eng'): ?> class="active"<?php endif ?>>ENG</a></li>
    <li><a href="<?php echo $values['eus'] ?>"<?php if ($values['lang']=='eus'): ?> class="active"<?php endif ?>>EUS</a></li>
  </ul>
</header>
<ul class="language-selector-sm">
  <li><a href="<?php echo $values['cas'] ?>"<?php if ($values['lang']=='cas'): ?> class="active"<?php endif ?>>CAS</a></li>
  <li><a href="<?php echo $values['eng'] ?>"<?php if ($values['lang']=='eng'): ?> class="active"<?php endif ?>>ENG</a></li>
  <li><a href="<?php echo $values['eus'] ?>"<?php if ($values['lang']=='eus'): ?> class="active"<?php endif ?>>EUS</a></li>
</ul>
