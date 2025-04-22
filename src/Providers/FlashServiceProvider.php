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
use NINACORE\Helpers\Flash;

class FlashServiceProvider extends ServiceProvider
{
    protected $defer = true;
    public function register(): void
    {
        $this->app->singleton('flash', function () {
            return new Flash();
        });
    }
    public function provides(){
        return ['flash'];
    }
}