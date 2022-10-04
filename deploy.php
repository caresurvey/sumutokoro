<?php
namespace Deployer;

require 'contrib/rsync.php';
require 'recipe/laravel.php';

// Config
set('ssh_multiplexing', true);
set('git_tty', false); 

// リポジトリ指定
set('repository', 'git@github:caresurvey/sumutokoro.git');

// 共有ファイルの設定
add('shared_files', ['.env']);
add('shared_dirs', ['vendor']);
add('writable_dirs', ['bootstrap/cache', 'storage']);

/**
 * Host設定
 */
host('production')
    ->setHostname('sumutokoro3.sakura.ne.jp')
    ->setRemoteUser('sumutokoro3')
    ->setPort(22)
    ->setIdentityFile('~/.ssh/secretkey')
    ->setDeployPath('~/deploy/production/sumutokoro_2022')
    ->set('keep_releases', 5)
    ->set('clear_paths', ['README.md']);

// Deploy後の処理
after('deploy', 'deploy:done');
task('deploy:done', function () {
});
