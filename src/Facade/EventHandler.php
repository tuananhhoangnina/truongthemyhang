<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\Facade;

use NINACORE\Core\Support\Facades\Facade;

/**
 * @method static void dispatch(string $event, array $payload = [])
 * @method static void addEventListener(string $event, \Closure $callback)
 * @static string EVENT_FINISH
 * @see \NINACORE\Core\Routing\EventHandler
 */
final class EventHandler extends Facade
{
    
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'event_handler';
    }
}
