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
class Nina extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'nina';
    }
}