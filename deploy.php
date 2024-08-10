<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com-ictc-event-management-system:Pricism/ictc-event-management-system.git');
set('update_code_strategy', 'archive');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('45.79.252.40')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '/var/www/ems')
    ->set('forward_agent', false);

// Tasks

task('update_assets', function () {
    run('cd {{release_path}} && npm install && npm run build');
})->desc('generate Assets for the UI');

// Hooks

after('deploy:success', 'update_assets');
after('deploy:failed', 'deploy:unlock');


