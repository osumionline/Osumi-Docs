<footer>
<?php if ($previous !== ''): ?>
  <a href="<?php echo $previous_url ?>">
    {{previous_icon}}
    <?php echo $previous_name ?>
  </a>
<?php endif ?>
  <span></span>
<?php if ($next !== ''): ?>
  <a href="<?php echo $next_url ?>">
    <?php echo $next_name ?>
    {{next_icon}}
  </a>
<?php endif ?>
</footer>
