<?php
/**
 * This file is part of the
 * Infeav Data Manager (https://www.infeav.org/data-manager)
 * open source project
 *
 * @copyright   2018-2020 Tobias Krebs and the Infeav Team
 * @license     https://www.gnu.org/licenses/gpl.html GNU General Public License 3
 */

namespace Infeav\Data\Config\DataView\Infeav;

use Infeav\Data\Config\DataView;
use Laminas\Db\Adapter\Adapter as DbAdapter;
use Laminas\Db\Metadata\MetadataInterface;

abstract class BookingView extends DataView
{

    protected DbAdapter $dbAdapter;
    protected MetadataInterface $dbMeta;

    public function __construct(DbAdapter $dbAdapter, MetadataInterface $dbMeta)
    {
        $this->dbAdapter = $dbAdapter;
        $this->dbMeta = $dbMeta;

        $this->initMeta();
    }

    abstract public function initMeta(): void;

}