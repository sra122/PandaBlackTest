<?php // strict

namespace PandaBlackTest\Providers;

use PandaBlackTest\Crons\ItemExportCron;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;
use Plenty\Modules\Cron\Services\CronContainer;

class PandaBlackTestServiceProvider extends ServiceProvider
{
    /**
     * Register the core functions
     */
    public function register()
    {
        $this->getApplication()->register(PandaBlackTestRouteServiceProvider::class);
    }

    /**
     * @param CronContainer $container
     */
    public function boot(CronContainer $container)
    {
        $container->add(CronContainer::HOURLY, ItemExportCron::class);
    }
}
