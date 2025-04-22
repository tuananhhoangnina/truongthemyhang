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

class CheckRedirect implements IMiddleware
{
    public function handle(Request $request) : void{
        $urlRequest = trim(($request->getUrl()->getScheme()??'http').'://'.$request->getHost().$request->getUrl()->getPath(),'/');

        $checkRedirect = remember('checkRedirect', 86400, function () use ($urlRequest) {
            $row = \NINACORE\Models\PhotoModel::select(['link','link_redirect','redirect'])->where('link',$urlRequest)->where('type','dieu-huong')->first();
            return $row;
        });

        if(!empty($checkRedirect)){
            response()->redirect($checkRedirect['link_redirect'],(int)$checkRedirect['redirect']);
        }
    }
}
