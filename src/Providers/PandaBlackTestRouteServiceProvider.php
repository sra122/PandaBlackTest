<?php

namespace PandaBlackTest\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;
use Plenty\Plugin\Routing\ApiRouter;

class PandaBlackTestRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @param Router $router
     * @param ApiRouter $api
     */
    public function map(Router $router, ApiRouter $api)
    {
        $router->get('hello', 'PandaBlackTest\Controllers\ContentController@productDetails');
        $router->get('update', 'PandaBlackTest\Controllers\UpdateItemController@updateItems');
        $router->get('category', 'PandaBlackTest\Controllers\CategoryController@saveCorrelation');
        $router->get('create-referrer', 'PandaBlackTest\Controllers\ReferrerController@createOrderReferrer');
        $router->get('referrer', 'PandaBlackTest\Controllers\ReferrerController@getListOfOrderReferrer');
        $router->get('properties', 'PandaBlackTest\Controllers\ReferrerController@getListOfOrderReferrer');
        $router->get('expire-time', 'PandaBlackTest\Controllers\AuthController@tokenExpireTime');
        $router->get('markets/panda-black/attributes', 'PandaBlackTest\Controllers\AttributesController@getAttributes');

        $api->version(['v1'], ['middleware' => ['oauth']], function ($router) {
            $router->get('markets/panda-black/parent-categories', 'PandaBlackTest\Controllers\CategoryController@all');
            $router->get('markets/panda-black/parent-categories/{id}', 'PandaBlackTest\Controllers\CategoryController@get');
            $router->get('markets/panda-black/vendor-categories', 'PandaBlackTest\Controllers\JdCategoriesController@listOfCategories');
            //$router->get('markets/panda-black/vendor-categories/{id}', 'PandaBlackTest\Controllers\JdCategoriesController@listOfCategories');
            $router->get('markets/panda-black/correlations', 'PandaBlackTest\Controllers\CategoryController@getCorrelations');
            $router->post('markets/panda-black/edit-correlations', 'PandaBlackTest\Controllers\CategoryController@updateCorrelation');
            $router->post('markets/panda-black/correlations', 'PandaBlackTest\Controllers\CategoryController@saveCorrelation');
            $router->delete('markets/panda-black/correlations', 'PandaBlackTest\Controllers\CategoryController@deleteAllCorrelations');
            $router->delete('markets/panda-black/correlation/{id}', 'PandaBlackTest\Controllers\CategoryController@deleteCorrelation');
            $router->get('markets/panda-black/attributes', 'PandaBlackTest\Controllers\AttributesController@getAttributes');
            $router->post('markets/panda-black/attribute', 'PandaBlackTest\Controllers\AttributesController@createAttribute');
            $router->post('markets/panda-black/attribute-mapping', 'PandaBlackTest\Controllers\AttributesController@attributeMapping');
            $router->get('markets/panda-black/attribute-mapping/{id}', 'PandaBlackTest\Controllers\AttributesController@getMappedAttributeDetails');
            $router->get('markets/panda-black/login-url', 'PandaBlackTest\Controllers\AuthController@getLoginUrl');
            $router->post('markets/panda-black/session', 'PandaBlackTest\Controllers\AuthController@sessionCreation');
            $router->get('markets/panda-black/expire-time', 'PandaBlackTest\Controllers\AuthController@tokenExpireTime');
            $router->get('markets/panda-black/products-data', 'PandaBlackTest\Controllers\ContentController@productDetails');
        });
    }
}