<?php
/**
 * This file is part of the
 * Infeap Data Manager (https://www.infeap.org/data-manager)
 * open source project
 *
 * @copyright   2018-2020 Tobias Krebs and the Infeap Team
 * @license     https://www.gnu.org/licenses/gpl.html GNU General Public License 3
 */

return [
    'page/start' => [
        'path' => '/',
        'get' => [
            \Infeap\Data\Handler\Page\StartHandler::class,
        ],
    ],
];
