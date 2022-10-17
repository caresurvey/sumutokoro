<?php
namespace Deployer;

require 'contrib/rsync.php';
require 'recipe/laravel.php';

/**
 * リストア用の設定ファイル
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
    ->set('rsync_src', './restore/')
    ->set('rsync_dest','{{release_path}}')
    ->set('branch', 'release')
    ->set('keep_releases', 5);

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:config:cache',
    'artisan:view:cache',
    'artisan:event:cache',
    'artisan:migrate',
    'deploy:publish'
    'rsync', 
]);

// ファイル転送タスク
set('rsync',[
    'exclude'       => [],
    'exclude-file'  => '/tmp/localdeploys/excludes_file', //Use absolute path to avoid possible rsync problems
    'include'       => [],
    'include-file'  => false,
    'filter'        => [],
    'filter-file'   => false,
    'filter-perdir' => false,
    'flags'         => 'rzcE', // Recursive, with compress, check based on checksum rather than time/size, preserve Executable flag
    'options'       => [], //Delete after successful transfer, delete even if deleted dir is not empty
    'timeout'       => 3600, //for those huge repos or crappy connection
]);

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

    // MySQLのダンプ
    cd('{{release_path}}');

    // リストアスクリプトのパーミッション変更
    run('chmod 755 restore.sh');

    // リストアスクリプトを実行
    run('./restore.sh');
});


