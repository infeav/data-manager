<?php
/**
 * This file is part of the
 * Infeav Data Manager (https://www.infeav.org/data-manager)
 * open source project
 *
 * @copyright   2018-2020 Tobias Krebs and the Infeav Team
 * @license     https://www.gnu.org/licenses/gpl.html GNU General Public License 3
 */

/*
 * See init/app-array.php for available $app keys
 */
return function (array $app): array {

    return [
        'services' => [
            'config' => [
                'router' => [
                    'fastroute' => [
                        'cache_enabled' => $app['checks']['cache_dir_is_writable'],
                        'cache_file' => $app['config']['cache_dir'] . '/fastroute.php',
                    ],
                ],
            ],
        ],
    ];
};
