# Pretty Much
E-Commerce app build using the Laravel Framework

## Install
to install this project on your development machine, enter this command
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
developed using php version 8.2 and composer version 2.5.5