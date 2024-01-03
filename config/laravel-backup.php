<?php

return [

    'backup' => [

        /*
         * The name of this application. You can use this name to monitor
         * the backups.
         */
//        'name' => env('APP_URL'),
        'name' => 'Backups',

        'source' => [

            'files' => [

                /*
                 * The list of directories that should be part of the backup. You can
                 * specify individual files as well.
                 */
                'include' => [
                    base_path(),
                ],

                /*
                 * These directories will be excluded from the backup.
                 * You can specify individual files as well.
                 */
                'exclude' => [
                    base_path(),
                    base_path('vendor'),
                    base_path('node_modules'),
                    storage_path(),
                ],

                /*
                 * Determines if symlinks should be followed.
                 */
                'followLinks' => false,
            ],

            /*
             * The names of the connections to the databases that should be part of the backup.
             * Currently only MySQL and PostgreSQL databases are supported.
             */
            'databases' => [
                'mysql',
            ],
        ],

        'destination' => [

            /*
             * The disk names on which the backups will be stored.
             */
            'disks' => [
                'public',
            ],
        ],
    ],

    'cleanup' => [
        /*
         * The strategy that will be used to cleanup old backups.
         * The youngest backup will never be deleted.
         */
        'strategy' => \Spatie\Backup\Tasks\Cleanup\Strategies\DefaultStrategy::class,

        'defaultStrategy' => [

            /*
             * The number of days for which all backups must be kept.
             */
            'keepAllBackupsForDays' => 7,

            /*
             * The number of days for which all daily backups must be kept.
             */
            'keepDailyBackupsForDays' => 16,

            /*
             * The number of weeks for which all one weekly backup must be kept.
             */
            'keepWeeklyBackupsForWeeks' => 8,

            /*
             * The number of months for which one monthly backup must be kept.
             */
            'keepMonthlyBackupsForMonths' => 4,

            /*
             * The number of years for which one yearly backup must be kept.
             */
            'keepYearlyBackupsForYears' => 2,

            /*
             * After cleaning up backups, remove the oldest backup until
             * this number of megabytes has been reached.
             */
            'deleteOldestBackupsWhenUsingMoreMegabytesThan' => 5000,
        ],
    ],

    /*
     *  In this array you can specify which backups should be monitored.
     *  If a backup does not meet the specified requirements, the
     *  UnHealthyBackupWasFound event will be fired.
     */
    'monitorBackups' => [
        [
            'name' => env('APP_URL'),
            'disks' => ['local'],
            'newestBackupsShouldNotBeOlderThanDays' => 1,
            'storageUsedMayNotBeHigherThanMegabytes' => 5000,
        ],

        /*
        [
            'name' => 'name of the second app',
            'disks' => ['local', 's3'],
            'newestBackupsShouldNotBeOlderThanDays' => 1,
            'storageUsedMayNotBeHigherThanMegabytes' => 5000,
        ],
        */
    ],

    'dump_command_path' => 'C:\xampp\mysql\bin',

    'notifications' => [

        /*
         * This class will be used to send all notifications.
         */
        'handler' => Spatie\Backup\Notifications\Notifier::class,

        /*
         * Here you can specify the ways you want to be notified when certain
         * events take place. Possible values are "log", "mail", "slack",
         * "pushover", and "telegram".
         *
         * Slack requires the installation of the maknz/slack package.
         * Telegram requires the installation of the irazasyed/telegram-bot-sdk package.
         */
        'events' => [
            'whenBackupWasSuccessful' => ['log'],
            'whenCleanupWasSuccessful' => ['log'],
            'whenHealthyBackupWasFound' => ['log'],
            'whenBackupHasFailed' => ['log', 'mail'],
            'whenCleanupHasFailed' => ['log', 'mail'],
            'whenUnhealthyBackupWasFound' => ['log', 'mail'],
        ],

        /*
         * Here you can specify how emails should be sent.
         */
        'mail' => [
            'from' => 'your@email.com',
            'to' => 'your@email.com',
        ],

        /*
         * Here you can specify how messages should be sent to Slack.
         */
        'slack' => [
            'channel' => '#backups',
            'username' => 'Backup bot',
            'icon' => ':robot:',
        ],

        /*
         * Here you can specify how messages should be sent to Pushover.
         */
        'pushover' => [
            'token' => env('PUSHOVER_APP_TOKEN'),
            'user' => env('PUSHOVER_USER_KEY'),
            'sounds' => [
                'success' => env('PUSHOVER_SOUND_SUCCESS', 'pushover'),
                'error' => env('PUSHOVER_SOUND_ERROR', 'siren'),
            ],
        ],

        /*
         * Here you can specify how messages should be sent to Telegram Bot API.
         */
        'telegram' => [
            'bot_token' => env('TELEGRAM_BOT_TOKEN'),
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'async_requests' => env('TELEGRAM_ASYNC_REQUESTS', false),
            'disable_web_page_preview' => env('TELEGRAM_DISABLE_WEB_PAGE_PREVIEW', true),
        ],
    ],
];
