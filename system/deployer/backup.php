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

// リポジトリ指定（空を指定）
set('repository', 'git@github:caresurvey/sumutokoro.git');

// Host設定（バックアップ）
host('production')
    ->setHostname('sumutokoro3.sakura.ne.jp')
    ->setRemoteUser('sumutokoro3')
    ->setPort(22)
    ->setIdentityFile('~/.ssh/secretkey')
    ->setDeployPath('~/deploy/backup/sumutokoro2022')
    //->set('rsync_src', './backup/')
    //->set('rsync_dest','{{release_path}}')
    ->set('keep_releases', 5);

// タスク
task('deploy', ['deploy:prepare', 'rsync', 'build', 'deploy:unlock']);

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

// ビルドタスク
after('rsync', 'build');
task('build', function () {
    

    // MySQLのダンプ
    cd('{{release_path}}');
    run('touch backup!');


    // backup専用のリポジトリを作る
    // MailBoxも全部バックアップとるスクリプトを書く

    // 画像ファイルをzip化

    // バックアップサーバーに転送
});

