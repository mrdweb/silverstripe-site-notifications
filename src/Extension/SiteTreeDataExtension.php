<?php

namespace Dynamic\Notifications\Extension;

use Dynamic\Notifications\Model\PopUp;
use Dynamic\Notifications\Model\Violator;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\DB;

class SiteTreeDataExtension extends DataExtension
{
    /**
     * @return DataList
     */
    public function getPopUps()
    {
        $list = PopUp::get()->filter([
            'StartTime:LessThanOrEqual' => date("Y-m-d H:i:s", strtotime('now')),
            'EndTime:GreaterThanOrEqual' => date("Y-m-d H:i:s", strtotime('now')),
        ]);

        $random = DB::get_conn()->random();

        return $list->sort($random);
    }

    /**
     * @return DataList
     */
    // public function getViolators()
    // {
    //     $list = Violator::get()->filter([
    //         'StartTime:LessThanOrEqual' => date("Y-m-d H:i:s", strtotime('now')),
    //         'EndTime:GreaterThanOrEqual' => date("Y-m-d H:i:s", strtotime('now')),
    //     ]);

    //     return $list->sort('Sort');
    // }
}
