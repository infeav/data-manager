<?php
/**
 * This file is part of the
 * Infeav Data Manager (https://www.infeav.org/data-manager)
 * open source project
 *
 * @copyright   2018-2020 Tobias Krebs and the Infeav Team
 * @license     https://www.gnu.org/licenses/gpl.html GNU General Public License 3
 */

namespace Infeav\Data\Config\DataSource\Infeav;

use Infeav\Data\Config\DataSource\DependentSource;
use Infeav\Data\Config\DataView\Infeav\Booking\AnalysisView;
use Infeav\Data\Config\DataView\Infeav\Booking\AssetsView;
use Infeav\Data\Config\DataView\Infeav\Booking\BookingsView;
use Infeav\Data\Config\DataView\Infeav\Booking\CustomersView;
use Infeav\Data\Config\DataView\Infeav\Booking\DashboardView;
use Infeav\Data\Config\DataView\Infeav\Booking\LayoutsView;
use Infeav\Data\Config\DataView\Infeav\Booking\PagesView;
use Infeav\Data\Config\DataView\Infeav\Booking\ProcessView;
use Infeav\Data\Config\DataView\Infeav\Booking\SettingsView;
use Infeav\Data\Config\DataView\SeparatorView;

class BookingSystem extends DependentSource
{

    public function assembleChildDataViews(): array
    {
        $dependentDataSource = $this->getDependentDataSource();

        $dbAdapter = $dependentDataSource->getDbAdapter();
        $dbMeta = $dependentDataSource->getDbMeta();

        return [
            new DashboardView($dbAdapter, $dbMeta),
            new AnalysisView($dbAdapter, $dbMeta),

            new SeparatorView(),

            new BookingsView($dbAdapter, $dbMeta),
            new CustomersView($dbAdapter, $dbMeta),

            new SeparatorView(),

            new ProcessView($dbAdapter, $dbMeta),
            new AssetsView($dbAdapter, $dbMeta),

            new SeparatorView(),

            new PagesView($dbAdapter, $dbMeta),
            new LayoutsView($dbAdapter, $dbMeta),
            new SettingsView($dbAdapter, $dbMeta),
        ];
    }

}
