<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */
 namespace NINACORE\Helpers\Clockwork;

use NINACORE\Core\Support\Facades\Facade as FacadesFacade;

// Clockwork facade
class Facade extends FacadesFacade
{
	protected static function getFacadeAccessor() { return 'clockwork'; }
}
