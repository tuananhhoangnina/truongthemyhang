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
use NINACORE\Helpers\Seo;

class SeoServiceProvider extends ServiceProvider
{
    protected $defer = true;
    public function register(): void
    {
        $this->app->singleton('seo', function () {
            return new Seo();
        });
    }
    public function provides(){
        return ['seo'];
    }
}