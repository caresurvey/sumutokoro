<?php
namespace Deployer;

require 'recipe/laravel.php';

/**
 * バックアップ用の設定ファイル
 */

// SSH設定
set('ssh_multiplexing', true);
set('git_tty', true); 

// リポジトリ指定
set('repository', 'git@github:caresurvey/sumutokoro.git');

// 共有ファイルの設定
add('shared_files', ['.env']);
add('shared_dirs', ['vendor']);

// 書き込みファイルの設定
add('writable_dirs', []);

// Host設定（本番）
host('production')
    ->setHostname('sumutokoro3.sakura.ne.jp')
    ->setRemoteUser('sumutokoro3')
    ->setPort(22)
    ->setIdentityFile('~/.ssh/secretkey')
    ->setDeployPath('~/deploy/production/sumutokoro_2022')
    ->set('branch', 'release')
    ->set('keep_releases', 5);

// Host設定（ステージング）
host('staging')
    ->setHostname('stagingserver.sakura.ne.jp')
    ->setRemoteUser('stagingserver')
    ->setPort(22)
    ->setIdentityFile('~/.ssh/secretkey')
    ->setDeployPath('~/deploy/staging/sumutokoro_2022')
    ->set('branch', 'staging')
    ->set('keep_releases', 5);

// Deploy後の処理
after('deploy', 'deploy:done');
task('deploy:done', function () {
    // 移動
    cd("{{release_path}}");

    // .htaccessの置き換え
    run('rm public/.htaccess');
    run('cp system/production/.htaccess public/.htaccess');

    // 不要ファイルの削除
    run('rm .gitignore');
    run('rm docker-compose.yml');
    run('rm phpunit.xml');
    run('rm -R system');

    // シンボリックリンク追加
    run('ln -s ../storage/app/photos public/photos');

    // シンボリックリンク削除
    run('unlink public/storage');

    // キャッシュクリア
    run('php artisan optimize');
});

