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
use NINACORE\Core\Support\Facades\View;
use Illuminate\Http\Request;
use NINACORE\Controllers\Controller;
use NINACORE\Core\Support\Facades\Seo;
use NINACORE\Models\StaticModel;
use NINACORE\Core\Support\Facades\BreadCrumbs;

class StaticController extends Controller
{
    public function index(Request $request)
    {
        $rowDetail = StaticModel::select('name' . $this->lang, 'photo', 'desc' . $this->lang, 'content' . $this->lang, 'type', 'id')
            ->where('type', $this->type)
            ->first();
        $seoPage = $rowDetail?->getSeo('static', 'save')->first();
        $seoPage['type'] = 'article';
        $titleMain =  $this->infoSeo('static', $this->type, 'title');
        BreadCrumbs::setBreadcrumb(type: $this->type, title: __('web.'.$titleMain));
        Seo::setSeoData($seoPage, 'news');
        return View::share('com', $this->type)->view('static.static', ['static' => $rowDetail]);
    }
}