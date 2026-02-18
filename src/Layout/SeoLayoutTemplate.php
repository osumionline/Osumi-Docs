<!DOCTYPE html>
<html lang="{{ lang }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($title) ?> – Osumi Framework</title>
  <?php if ($desc !== ''): ?>
  <meta name="description" content="<?php echo htmlspecialchars($desc) ?>">
  <?php endif ?>
  <link rel="canonical" href="{{ canonical }}">
  <link rel="alternate" hreflang="en" href="{{ href_en }}">
  <link rel="alternate" hreflang="es" href="{{ href_es }}">
  <link rel="alternate" hreflang="eu" href="{{ href_eu }}">
  <link rel="alternate" hreflang="x-default" href="{{ href_default }}">
  <?php foreach ($schemas as $schema): ?>
  <script type="application/ld+json">
    <?php echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
  </script>
  <?php endforeach; ?>
</head>

<body>
  {{ body }}
</body>
</html>
