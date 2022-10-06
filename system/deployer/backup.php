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
set('repository', '');

// Host設定（バックアップ）
host('backup')
    ->setHostname('sumutokoro3.sakura.ne.jp')
    ->setRemoteUser('sumutokoro3')
    ->setPort(22)
    ->setIdentityFile('~/.ssh/secretkey')
    ->setDeployPath('~/deploy/production/sumutokoro_backup')
    ->set('keep_releases', 5);

// デプロイ前のタスク
task('deploy:before', function() {
    // プロジェクトディレクトリに移動
    cd("{{release_path}}");

    // composer.jsonを削除
    run("rm composer.json");
});

// バックアップタスク
task('backup', function(){
    
    // プロジェクトディレクトリに移動
    cd("{{release_path}}");

    // MySQLのダンプ
    touch('backup!');

    // 画像ファイルをzip化

    // バックアップサーバーに転送
});

