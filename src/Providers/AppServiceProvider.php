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

use NINACORE\Core\Routing\EventHandler;
use NINACORE\Core\Routing\NINARouter;

final class AppServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void {}

    public function provides()
    {
        return ['app_service'];
    }

    public function boot(): void
    {
        
    }
}