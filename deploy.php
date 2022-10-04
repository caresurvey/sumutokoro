<?php
namespace Deployer;

require 'contrib/rsync.php';
require 'recipe/laravel.php';

// Config
set('ssh_multiplexing', true);
set('git_tty', false); 

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
    ->setPort(22)
    ->setIdentityFile('~/.ssh/secretkey')
    ->setDeployPath('~/deploy/production/sumutokoro_2022')
    ->set('rsync_dest','{{release_path}}')
    ->set('rsync',[
        'exclude' => [
            '.git',
            '.github',
            '.gitignore',
            '.idea',
            '.env',
            '.env.dusk',
            '.gitattributes',
            '.styleci.yml',
            '.editorconfig',
            'artisan',
            'deploy.php',
            'package.json',
            'phpunit.dusk.xml',
            'phpunit.xml',
            'server.php',
            'servers.yml',
            'assets',
            'composer.lock',
            'README.md',
            'RoboFile.php',
            'tests',
            'system',
            'docker-compose.yml',
            'README.md'
        ],
        'exclude-file' => false,
        'include'      => [],
        'include-file' => false,
        'filter'       => [],
        'filter-file'  => false,
        'filter-perdir'=> false,
        'flags'        => 'rz', // Recursive, with compress
        'options'      => ['delete'],
        'timeout'      => 300,
    ]
);



task('build', function () {
    run('cd {{release_path}}');
});

after('deploy:failed', 'deploy:unlock');
before('deploy:symlink', 'artisan:migrate');

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
