<?php
namespace PandaBlackTest\Migrations;

use Plenty\Modules\Order\Referrer\Contracts\OrderReferrerRepositoryContract;
use Plenty\Modules\Market\Settings\Contracts\SettingsRepositoryContract;
use Plenty\Modules\Plugin\DataBase\Contracts\Migrate;
use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;

/**
 * Class CreateOrderReferrer
 */
class GetOrderReferrer
{

    /**
     * GetOrderReferrer constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param OrderReferrerRepositoryContract $orderReferrerRepo
     */
    public function run()
    {
        $orderReferrerRepo = pluginApp(OrderReferrerRepositoryContract::class);
        $orderReferrerLists = $orderReferrerRepo->getList(['name']);

        $pandaBlackReferrerID = [];

        foreach($orderReferrerLists as $key => $orderReferrerList)
        {
            if(trim($orderReferrerList->name) === 'PandaBlackTest') {
                array_push($pandaBlackReferrerID, $orderReferrerList);
            }
        }

        if(empty(array_filter($pandaBlackReferrerID))) {

            $orderReferrer = $orderReferrerRepo->create([
                'isEditable'    => true,
                'backendName' => 'PandaBlackTest',
                'name'        => 'PandaBlackTest',
                'origin'      => 'plenty',
                'isFilterable' => true
            ])->toArray();
            $settingsRepository = pluginApp(SettingsRepositoryContract::class);
            $settingsRepository->create('PandaBlackTest', 'property', $orderReferrer);

            return $orderReferrer;
        }

    }
}