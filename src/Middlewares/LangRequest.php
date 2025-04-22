<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class LangRequest implements IMiddleware
{
    public function handle(Request $request): void
    {
        if (session()->get('locale') == null) {
            session()->set('locale', config('app.lang_default'));
        }
    }
}
