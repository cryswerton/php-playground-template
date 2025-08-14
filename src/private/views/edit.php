<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Link</title>
</head>
<body>
    <form action="index.php?action=update" method="post">
        <h1>Edit Link</h1>
        <label for="url">URL:</label>
        <input type="text" id="url" name="url" value="<?php echo htmlspecialchars($link['url']); ?>" required>
        <input type="hidden" name="id" value="<?php echo $link['id']; ?>">
        <button type="submit">Update</button>
    </form>

    <p><a href="index.php?action=delete&id=<?php echo $link['id']; ?>">Delete this link</a></p>
    
    <p><a href="/">Back to links</a></p>
</body>
</html>