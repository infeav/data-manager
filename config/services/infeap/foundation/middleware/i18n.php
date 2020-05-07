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
    'factories' => [
        \Infeap\Foundation\Middleware\I18n\LanguageParamMiddleware::class => \Infeap\Foundation\Middleware\I18n\LanguageParamMiddlewareFactory::class,
        \Infeap\Foundation\Middleware\I18n\Redirect\PageLanguageMiddleware::class => \Infeap\Foundation\Middleware\I18n\Redirect\PageLanguageMiddlewareFactory::class,
    ],
];
