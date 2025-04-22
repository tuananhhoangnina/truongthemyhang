<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Providers;

use NINACORE\Core\ServiceProvider;
use NINACORE\NINAGateway\GatewayManager;
use NINACORE\NINAGateway\Omnipay\GatewayFactory;

class GatewayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('gateway', function ($app) {
            $defaults = $app['config']->get('gateways.defaults', array());
            return new GatewayManager($app, new GatewayFactory, $defaults);
        });
    }
}