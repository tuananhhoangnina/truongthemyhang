<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Facade;

use NINACORE\Core\Support\Facades\Facade;
use Omnipay\Common\CreditCard;

/**
 * @method static gateway(Gateway $class)
 */
class Gateway extends Facade
{
    public static function creditCard($parameters = null): CreditCard {
        return new CreditCard($parameters);
    }
    protected static function getFacadeAccessor(): string {
        return 'gateway';
    }
}