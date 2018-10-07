<?php

namespace PandaBlackTest\Crons;

use PandaBlackTest\Controllers\ContentController;
use Plenty\Modules\Cron\Contracts\CronHandler as Cron;

class ItemExportCron extends Cron
{
    public function __construct(ContentController $contentController)
    {
        $contentController->sendProductDetails();
    }
}