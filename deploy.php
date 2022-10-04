<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:caresurvey/sumutokoro.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts
inventory('hosts.yml');

/*
host('sumutokoro3.sakura.ne.jp')
    ->set('remote_user', 'sumutokoro3')
    ->set('deploy_path', '~/deploy');
*/
    
after('deploy:failed', 'deploy:unlock');
