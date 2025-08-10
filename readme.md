# PHP Playground Template

A minimal PHP + nginx development setup using Docker. No local PHP installation required.

## 🚀 Getting Started

1. Clone this repo:
   ```bash
   git clone https://github.com/cryswerton/php-playground-template.git my-project
   cd my-project
   ```

2. Start the stack:
```bash
docker compose up -d
```

3. Visit:
```bash
http://localhost:8080
```

Add a package:
```bash
docker compose run --rm composer require vendor/package
```

Changing PHP version in docker-compose.yml:
```bash
php:
  image: php:8.3-fpm
```





