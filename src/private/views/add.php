<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
    <title>Create Link</title>
</head>
<body>
    <form action="/create" method="post">
        <h1>Create Link</h1>
        <label for="url">URL:</label>
        <input type="text" id="url" name="url" value="https://" required>
        <button type="submit">Create</button>
    </form>
    <p><a href="/">Back to links</a></p>
</body>
</html>