<?php
namespace Deployer;

require 'contrib/rsync.php';
require 'recipe/laravel.php';

// Config
set('ssh_multiplexing', true);

// リポジトリ指定
set('repository', 'git@github.com:caresurvey/sumutokoro.git');

// 世代管理の件数
set('keep_releases', 3);

add('shared_files', ['.env']);
add('shared_dirs', ['vendor']);
add('writable_dirs', ['bootstrap/cache', 'storage']);




/**
 * Host設定
 */
host('production')
    ->setHostname('sumutokoro3.sakura.ne.jp')
    ->setRemoteUser('sumutokoro3')
    ->setIdentityFile('sumutokoro3')
    ->setDeployPath('~/deploy/production/sumutokoro_2022');


/**
 * 実行Task設定
 */
/*
task('production', [
    'deploy:prepare',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:symlink',
]);
*/
