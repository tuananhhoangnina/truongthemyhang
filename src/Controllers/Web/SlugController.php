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
use NINACORE\Models\SlugModel;
use NINACORE\Core\Routing\NINARouter;

class SlugController extends Controller
{
    public function handle($slug, Request $request)
    {
        if (!empty($slug)) {
            $query = SlugModel::select('*')->where(function ($query) use ($slug) {
                $query->where("slug" . $this->lang, $slug);
            });
            $check = $query->first();
            if (!empty($check)) {
                $query_date = $check['model']::select('id', 'status')->where('id', $check['id_parent'])->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);
                if (empty(Request()->preview)) $query_date->datePublish();
                $checkDate = $query_date->first();
            }
            if (!empty($check) && !empty($checkDate) && !empty($check->getStatus($check['model'])->first()->id)) {
                $method = !empty(explode('-', $check['com'])[1]) ? explode('-', $check['com'])[1] : 'detail';
                $controller = new ($check['controller']);
                return $controller->$method($slug, $request);
            } else {
                NINARouter::response()->httpCode(404);
                view('error.notfound', []);
            }
        }
    }
}