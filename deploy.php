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

// Hosts
import('inventory.yaml');


/*
task('aaaproduction', function(){
    // 本番環境のデプロイ先サーバのhost
    host('sumutokoro3.sakura.ne.jp')
        ->setRemoteUser('sumutokoro3')
        ->setDeployPath('~/deploy')
        //->setIdentifyFile('~/.ss')
        ->set('branch', 'release');

});
*/


// 事前に.dev.productionなどを(.env.ステージ名の)ファイルを準備しておく
before('deploy:shared', 'upload-env');
task('upload-env', function () {
    $stage = get('stage');
    $src = ".env.${stage}";
    $deployPath = get('deploy_path');
    $sharedPath = "${deployPath}/shared";
    upload(__DIR__ . "/" . $src, "${sharedPath}/.env");
});

after('deploy:failed', 'deploy:unlock');

/**
 * プロダクション環境へデプロイ
 */
task('deploy:production', [
    'deploy:info',
    'deploy:prepare',
    'deploy:release',
    'rsync',
    'deploy:setting_production',
    'deploy:after_setting',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:symlink',
    'cleanup',
    'success',
    'deploy:unlock',
]);
