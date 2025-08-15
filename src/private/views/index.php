<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
    <title>Links</title>
</head>
<body>
    <h1>Links</h1>
    <p><a href="/add">Add New Link</a></p>
    <?php foreach ($links as $link): ?>
        <a href="<?php echo '/edit/' . $link['id']; ?>">
            <?php echo htmlspecialchars($link['url']); ?>
        </a><br>
    <?php endforeach; ?>
    <?php if (isset($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
</body>
</html>