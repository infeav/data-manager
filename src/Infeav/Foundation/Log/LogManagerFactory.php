<?php
/**
 * This file is part of the
 * Infeav Data Manager (https://www.infeav.org/data-manager)
 * open source project
 *
 * @copyright   2018-2020 Tobias Krebs and the Infeav Team
 * @license     https://www.gnu.org/licenses/gpl.html GNU General Public License 3
 */

namespace Infeav\Foundation\Log;

use Infeav\Foundation\I18n\LanguageService;
use Laminas\ServiceManager\ServiceManager;

class LogManagerFactory
{

    public function __invoke(ServiceManager $serviceManager)
    {
        return new LogManager(
            $serviceManager->get('app_config')['log_dir'],
            $serviceManager->get('app_dir'),
            $serviceManager->get(LanguageService::class),
        );
    }

}