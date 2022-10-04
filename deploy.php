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

// 書き込みファイルの設定
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
    ->set('keep_releases', 5);

// Deploy後の処理
after('deploy', 'deploy:done');
task('deploy:done', function () {
    // 移動
    cd("{{release_path}}");

    // 不要ファイルの削除
    run('rm .gitignore');
    run('rm .env.dusk');
    run('rm .env.testing');
    run('rm docker-compose.yml');
    run('rm phpunit.xml');
    run('rm -R system');

    // シンボリックリンク追加
    run('ln -s storage/app/photos public/photos');

    // シンボリックリンク削除
    run('unlink public/storage');
});

