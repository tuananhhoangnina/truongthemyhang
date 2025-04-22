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
use NINACORE\Core\View\View;

class ViewServiceProvider extends ServiceProvider
{
    protected $defer = true;
    public function boot(): void {
        $blade = $this->app->make('view');
        $blade->addAssetDict('assets/js/alpinejs.min.js','//unpkg.com/alpinejs');
        $errorCallback = function($key = null){
            $errorArray = session()->getError();
            if (array_key_exists($key, $errorArray)) {
                session()->unset('flashError.'.$key);
                return implode('<br>', $errorArray[$key]);
            }
            return false;
        };
        $blade->setErrorFunction($errorCallback);

        $blade->directive('device', function($device) {
            if ($device=='mobile' || $device=='tablet') {
                return "<?php if (\agent()->isMobile() || \agent()->isTablet()) : ?>";
            }else{
                return "<?php if (\agent()->isDesktop()) : ?>";
            }
        });
        
        $blade->directive('enddevice', function() {
            return "<?php endif; ?>";
        });
    }
    public function register(): void {
        $this->app->singleton('view', function () {
            return new View();
        });
    }
    public function provides(){
        return ['view'];
    }
}