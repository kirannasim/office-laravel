<?php
// -vvv
// php vendor/bin/dep deploy production
// php vendor/bin/dep rollback production
// deploy production -vvv
// php vendor/bin/dep deploy:unlock production

namespace Deployer;
use Maknz\Slack\Client;

require_once __DIR__ . '/vendor/deployer/deployer/recipe/common.php';
require 'recipe/laravel.php';

set('bin/php', static function () {
    return '/usr/bin/php';
});

set('ssh_type', 'native');
set('ssh_multiplexing', false);
set('allow_anonymous_stats', false);
set('deployerUser', !empty(getenv('user')) ? getenv('user') : trim(shell_exec('whoami')));
set('slackWebHookUrl', 'https://hooks.slack.com/services/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');
set('slackDeploymentChannel', '#deployment');
set('projectName', 'office.elysiumnetwork.io-www');
set('repository', 'git@bitbucket.org:elysiumcapital/' . get('projectName') . '.git');
set('stage_domain', null);
set('keep_releases', 3);

########################################################################################################################
task('slack:deploy', static function () {

    $stageDomain = null !== get('stage_domain') ? ' domain: ' . get('stage_domain') : null;

    $message = '*' . get('deployerUser') . '* pulled project ' . get('projectName') . ' from branch `' . get('branch') . '` on stage `' . get('stage') . '`->`' . get('hostname') . ':' . get('deploy_path') . '`' . $stageDomain;

    $client = new Client(get('slackWebHookUrl'));

    $client
        ->to(get('slackDeploymentChannel'))
        ->send($message);
});

task('slack:rollback', static function () {

    $stageDomain = null !== get('stage_domain') ? ' domain: ' . get('stage_domain') : null;

    $message = '*' . get('deployerUser') . '* rollback project ' . get('projectName') . ' from branch `' . get('branch') . '` on stage `' . get('stage') . '`->`' . get('hostname') . ':' . get('deploy_path') . '`' . $stageDomain;

    $client = new Client(get('slackWebHookUrl'));

    $client
        ->to(get('slackDeploymentChannel'))
        ->send($message);
});

task('server:cache-reset', static function () {
    $rand = random_int(1, 6);
    run("sleep $rand && sudo /sbin/service php-fpm reload");
});
########################################################################################################################

host('18.184.53.63')
    ->user('deploy')
    ->set('deploy_path', '/data/www/office.elysiumnetwork.io')
    ->set('branch', 'master')
    ->stage('production')
//    ->identityFile('frontend-asg.pem')
    ->set('stage_domain', 'https://office.elysiumnetwork.io')
    ->forwardAgent()
    ->addSshOption('UserKnownHostsFile', '/dev/null')
    ->addSshOption('StrictHostKeyChecking', 'no');
########################################################################################################################

set('shared_files', [
    '.env'
]);
add('shared_dirs', [
    'storage',
]);
set('copy_dirs', [
    'vendor'
]);
add('writable_dirs', [
    'storage/api-docs',
    'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
    'storage/test',
]);
set('writable_dirs', []);

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:copy_dirs',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'artisan:view:cache',
    'artisan:cache:clear',
    'deploy:symlink',
    'deploy:unlock',
    'server:cache-reset',
    'cleanup',
    'success',
]);
########################################################################################################################

after('deploy:failed', 'deploy:unlock');
after('deploy', 'slack:deploy');
after('rollback', 'slack:rollback');
after('rollback', 'server:cache-reset');
