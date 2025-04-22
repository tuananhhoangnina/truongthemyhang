<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\Controllers\Web;
use Illuminate\Http\Request;
use NINACORE\Controllers\Controller;
use NINACORE\Models\PhotoModel;
use NINACORE\Models\SettingModel;
use NINACORE\Models\NewsModel;
use NINACORE\Models\StaticModel;
use NINACORE\Models\ExtensionsModel;
use NINACORE\Models\ProductListModel;
use NINACORE\Core\Container;

class ApiController
{
    public function token(Request $request){
        $token = csrf_token();
        echo $token;
    }
    public function video(Request $request){
        $id = (!empty($request->id)) ? htmlspecialchars($request->id) : 0;
        $video = NewsModel::select('id', 'link', 'photo', 'link', 'namevi')->where('id', $id)->orderBy('id', 'desc')->first();
        return view('ajax.video', ['video' => $video ?? []]);
    }
}