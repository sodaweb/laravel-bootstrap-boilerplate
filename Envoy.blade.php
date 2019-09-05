@servers(['staging' => 'user@192.168.1.1', 'production' => 'user@192.168.1.1'])

@setup
    $param = isset($param) ? $param : null
@endsetup


@task('deploy-staging', ['on' => 'staging'])
    cd /var/www/laravel-bootstrap-boilerplate
    echo "Starting deployment on staging environment"
    composer dump-autoload -o

    echo "Pulling master branch..."
    git pull origin master
    composer install
    php artisan migrate --env=staging
    composer dump-autoload -o
@endtask

@task('deploy-production', ['on' => 'production'])
    cd /var/www/laravel-bootstrap-boilerplate
    echo "Starting deployment on production environment"
    composer dump-autoload -o

    echo "Pulling master branch..."
    git pull origin master
    composer install
    php artisan migrate --env=production --force
    composer dump-autoload -o
@endtask