<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Links</title>
</head>
<body>
    <h1>Links</h1>
    <p><a href="index.php?action=add">Add New Link</a></p>
    <?php foreach ($links as $link): ?>
        <a href="<?php echo 'index.php?action=edit&id=' . $link['id']; ?>">
            <?php echo htmlspecialchars($link['url']); ?>
        </a><br>
    <?php endforeach; ?>
</body>
</html>