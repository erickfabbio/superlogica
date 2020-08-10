<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'superlogica');

// Project repository
set('repository', 'https://github.com/erickfabbio/superlogica.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false);

set('bin/php', function () {
    return '/usr/local/php/7.3/bin/php'; //Caminho do executavel do PHP na Hospedagem
});

set('use_atomic_symlink', true);
set('http_user', 'blacklester'); // usuario da hospedagem
set('http_group', 'blacklester'); // grupo da hospedagem geralmente é o mesmo nome do usuario

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

host('blacklester@177.185.206.129')
    ->set('deploy_path', '/home/blacklester/www');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});
task('link_to_www', function () {
    run('rm -rf {{deploy_path}}/www/*');
    run('ln -s {{deploy_path}}/current/public/* {{deploy_path}}/www');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

