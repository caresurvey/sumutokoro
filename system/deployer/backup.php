<?php
namespace Deployer;

require 'contrib/rsync.php';
require 'recipe/common.php';

/**
 * バックアップ用の設定ファイル
 */

// SSH設定
set('ssh_multiplexing', true);
set('git_tty', true); 

// Host設定（バックアップ）
host('production')
    ->setHostname('sumutokoro3.sakura.ne.jp')
    ->setRemoteUser('sumutokoro3')
    ->setPort(22)
    ->setIdentityFile('~/.ssh/secretkey')
    ->setDeployPath('~/deploy/backup/sumutokoro2022')
    ->set('rsync_src', './backup/')
    ->set('rsync_dest','{{release_path}}')
    ->set('keep_releases', 5);

// タスク
task('backup', [
    'deploy:release', 
    'rsync', 
    'deploy:symlink',
    'deploy:cleanup',
    'deploy:unlock', 
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
    cd('{{release_path}}');

    // バックアップスクリプトのパーミッション変更
    run('chmod 755 backup.sh');

    // バックアップスクリプトを実行
    run('./backup.sh');
});

