<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\Providers;

use NINACORE\Core\ServiceProvider;

final class EventHandlerServiceProvider extends ServiceProvider
{
    public function register(): void {
        $this->app->singleton('event_handler', function () {
            return new \NINACORE\Core\Routing\EventHandler();
        });
    }

    public function provides(){
        return ['event_handler'];
    }
}
