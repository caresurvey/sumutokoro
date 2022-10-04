<?php
namespace Deployer;

require 'recipe/common.php';
require 'contrib/rsync.php';

/**
 * プロジェクト名
 */
set('application', 'Deploy');

/**
 * SSHの設定
 */
set('ssh_type', 'native');
set('ssh_multiplexing', true);

/**
 * shareディレクトリ設定
 */
set('shared_files', []);
set('shared_dirs', []);

/**
 * WEBサーバーが書き込めるディレクトリ
 */
set('writable_dirs', []);

/**
 * 保存する過去分
 */
set('keep_releases', 5);

/**
 * サーバー設定ファイル
 */
inventory('servers.yml');

/**
 * ファイル転送の設定(rsync)
 */
set('rsync_src', __DIR__);
set('rsync_dest','{{release_path}}');
set('rsync',[
    'exclude' => [
        '.circleci',
        '.git',
        'assets',
        'backup',
        'other',
        'README.md',
        'RoboFile.php',
        'deploy.php',
        'servers.yml',
        'migrate',
        'tests',
        'composer.lock',
        'public/trigger',
    ], 
    'exclude-file' => false,
    'include'      => [],
    'include-file' => false,
    'filter'       => [],
    'filter-file'  => false,
    'filter-perdir'=> false,
    'flags'        => 'rzp',
    'options'      => ['delete'],
    'timeout'      => 300,
]);


/**
 * 実行前の定義
 */
task('deploy:before_staging', function() {
  // メッセージ
  writeln("");
  writeln("");
  writeln("<comment>============ ステージングデプロイ開始！</comment>");
});
task('deploy:before_production', function() {
  // メッセージ
  writeln("");
  writeln("");
  writeln("<comment>============ 本番デプロイ開始！</comment>");
});

/**
 * 実行＆完了後の定義
 */
task('deploy:done_staging', function() {
  // 画像のシンボリックリンク設定

  // メッセージ
  writeln("<comment>============ ステージングデプロイ完了！</comment>");
});

task('deploy:done_production', function() {
  // 画像のシンボリックリンク設定

  // メッセージ
  writeln("<comment>============ 本番デプロイ完了！</comment>");
});

/**
 * デプロイ先の環境設定共通 - 設定
 * ファイル削除や最適化など
 */
task('deploy:setting', function() {

    // プロジェクトdirに移動
    cd("{{release_path}}");
});

/**
 * ステージング環境設定 - 設定
 * ファイル削除や最適化など
 */
task('deploy:setting_staging', function() {

    // プロジェクトdirに移動
    cd("{{release_path}}");

    // 本番用に置き換え
    run("rm config/cors.php");
    run("mv system/deploy/staging/config/cors.php config/cors.php");

    // シンボリックリンク・ディレクトリの作成
    run("mkdir storage/app");
    run("mkdir storage/app/publish");
    run("ln -s ../storage/app public/data");
});

/**
 * プロダクション環境設定 - 設定
 * ファイル削除や最適化など
 */
task('deploy:setting_production', function() {

    // プロジェクトdirに移動
    cd("{{release_path}}");

    // 本番用に置き換え
    run("rm config/cors.php");
    run("mv system/deploy/production/config/cors.php config/cors.php");

    // シンボリックリンク・ディレクトリの作成
    run("mkdir storage/app");
    run("mkdir storage/app/publish");
    run("ln -s ../storage/app public/data");
});

/**
 * 処理後の調整
 */
task('deploy:after_setting', function() {

    // プロジェクトdirに移動
    cd("{{release_path}}");

    // いらないファイルを消す
    run("rm -R system");
});


/**
 * ステージング環境へデプロイ
 */
task('deploy:staging', [
    'deploy:before_staging',
    'deploy:info',
    'deploy:prepare',
    //'deploy:lock',
    'deploy:release',
    'rsync',
    'deploy:setting',
    'deploy:setting_staging',
    'deploy:after_setting',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:symlink',
    'cleanup',
    'success',
    'deploy:unlock',
    'deploy:done_staging',
]);

/**
 * 本番環境へデプロイ
 */
task('deploy:production', [
    'deploy:before_production',
    'deploy:info',
    'deploy:prepare',
    //'deploy:lock',
    'deploy:release',
    'rsync',
    'deploy:setting',
    'deploy:setting_production',
    'deploy:after_setting',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:symlink',
    'cleanup',
    'success',
    'deploy:unlock',
    'deploy:done_production',
]);

after('deploy:failed', 'deploy:unlock');

