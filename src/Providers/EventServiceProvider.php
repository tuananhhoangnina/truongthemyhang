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

use Illuminate\Contracts\Queue\Factory as QueueFactoryContract;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('events', function ($app) {
      
            return (new Dispatcher($app))
            // ->setQueueResolver(function () use ($app) {
            //     return $app->make(QueueFactoryContract::class);
            // })
            // ->setTransactionManagerResolver(function () use ($app) {
            //     return $app->bound('db.transactions')
            //         ? $app->make('db.transactions')
            //         : null;
            // })
            ;
        });
    }

    public function provides() {
        return ['email'];
    }
}
