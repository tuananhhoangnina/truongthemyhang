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
use Carbon\Carbon;
use Illuminate\Http\Request;
use NINACORE\Controllers\Controller;
use NINACORE\Models\PhotoModel;
use NINACORE\Models\NewsModel;
use NINACORE\Models\ProductModel;
use NINACORE\Models\ProductListModel;
use NINACORE\Models\SettingModel;
use NINACORE\Models\StaticModel;
use NINACORE\Models\TagsModel;
use NINACORE\Models\NewslettersModel;
use NINACORE\Core\Support\Facades\View;
use NINACORE\Core\Support\Facades\Func;

class HomeController extends Controller
{

    public function intro(Request $request)
    {
        $lang = $this->lang;
    
        $intro = PhotoModel::select("name$lang", 'photo', 'link','type')
            ->where('type', 'intro')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return View::share(['com' => 'intro'])->view('layout.intro',compact('intro'));
    }

    public function index(Request $request)
    {
        $lang = $this->lang;
    
        $home = remember('home', 86400, function () use($lang) {

            $gioithieu = staticModel::select('name' . $this->lang, 'desc' . $this->lang, 'slug'. $this->lang,  'id', 'type', 'photo')
                ->where('type', 'gioi-thieu')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->first();
            $gioithieuPhotos = !empty($gioithieu) ?  $gioithieu->getPhotos()->where("type","gioi-thieu")->limit(3)->get() : [];

            $sukienSlogan = StaticModel::select('name' . $this->lang, 'desc' . $this->lang, 'slug'. $this->lang,  'id', 'type', 'photo')
                ->where('type', 'sukien-slogan')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->first();

            $albumSlogan = StaticModel::select('name' . $this->lang, 'desc' . $this->lang, 'slug'. $this->lang,  'id', 'type', 'photo')
                ->where('type', 'album-slogan')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->first();  
               
            $monanSlogan = StaticModel::select('name' . $this->lang, 'desc' . $this->lang, 'slug'. $this->lang,  'id', 'type', 'photo')
                ->where('type', 'monan-slogan')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->first();  

            $tintucSlogan = StaticModel::select('name' . $this->lang, 'desc' . $this->lang, 'slug'. $this->lang,  'id', 'type', 'photo')
                ->where('type', 'tintuc-slogan')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->first();  
                
            $feedbackSlogan = StaticModel::select('name' . $this->lang, 'desc' . $this->lang, 'slug'. $this->lang,  'id', 'type', 'photo')
                ->where('type', 'feedback-slogan')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->first();                  

            $slider =  PhotoModel::select('name' . $this->lang, 'photo', 'link')
                ->where('type', 'slide')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->orderBy('numb', 'asc')
                ->orderBy('id', 'desc')
                ->get();

            $bannerQC =  PhotoModel::select('name' . $this->lang, 'photo', 'link')
                ->where('type', 'banner-quangcao')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->first();   
                
            $nhantinQC =  PhotoModel::select('name' . $this->lang, 'photo', 'link')
                ->where('type', 'nhantin-quangcao')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->first();                    

            $menumonan =  PhotoModel::select("name$lang",  "desc$lang",'photo', 'link')
                ->where('type', 'menu-mon-an')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->orderBy('numb', 'asc')
                ->orderBy('id', 'desc')
                ->get();                


            $article =  NewsModel::select('name' . $this->lang, 'photo', 'desc' . $this->lang,  'content' . $this->lang, 'id', 'slug'. $this->lang,  'type', 'status', 'link')
                ->whereIn('type', ['su-kien','tin-tuc', 'video', 'feedback'])
                ->whereRaw("FIND_IN_SET(?, status)", ['hienthi'])
                ->orderBy('numb', 'asc')
                ->orderBy('id', 'desc')
                ->get();

            $sukienHot = $article?->filter(function ($item) {
                return $item->type === 'su-kien' && in_array('noibat', explode(',', $item->status));
            });
            
            $newsHot = $article?->filter(function ($item) {
                return $item->type === 'tin-tuc' && in_array('noibat', explode(',', $item->status));
            });
            
            $video = $article?->filter(function ($item) {
                return $item->type === 'video';
            })->values(); // reset key  array bắt đầu từ 0

            $feedback = $article?->filter(function ($item) {
                return $item->type === 'feedback';
            });          

            $albumHot = ProductModel::select('name' . $this->lang, 'desc' . $this->lang, 'slug'. $this->lang,  'regular_price', 'sale_price', 'discount', 'id', 'photo')
                ->where('type', 'thu-vien-anh')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
                ->orderBy('numb', 'asc')
                ->orderBy('id', 'desc')
                ->limit(6)
                ->get();

            $douongHot = ProductModel::select('name' . $this->lang, 'desc' . $this->lang, 'slug'. $this->lang,  'regular_price', 'sale_price', 'discount', 'id', 'photo')
                ->where('type', 'do-uong')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
                ->orderBy('numb', 'asc')
                ->orderBy('id', 'desc')
                ->get();                

                return get_defined_vars();
        });
        
        /* SEO */
        $titleMain = SettingModel::pluck('namevi')->first();
        $this->seoPage($titleMain);
        return View::share('com', 'trang-chu')->view('home.index', $home);
    }

    public function ajaxProduct(Request $request)
    {
        $id = $request->get('id') ?? 0;
        $type = $request->get('type') ?? '';

        $num = $request->get('num') ?? 8;
        $list = $request->get('list') ?? 0;
        $query = ProductModel::select('name' . $this->lang, 'desc' . $this->lang, 'slug'. $this->lang,  'regular_price', 'sale_price', 'discount', 'id', 'photo')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat']);
        if (!empty($type) && $type == 'cat') {
            if (!empty($list) && $list != 0) $query->where('id_list', $list);
            if (!empty($id) && $id != 0) $query->where('id_cat', $id);
            $productAjax = $query->orderBy('numb', 'asc')->orderBy('id', 'desc')->paginate($num);
        }
        return view('ajax.homeProduct', ['productAjax' => $productAjax ?? []]);
    }

    public function letter(Request $request) {
        $responseCaptcha = $_POST['recaptcha_response_newsletter'];
        $resultCaptcha = Func::checkRecaptcha($responseCaptcha);
        $scoreCaptcha = (!empty($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
        $actionCaptcha = (!empty($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
        $testCaptcha = (!empty($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;
        $dataNewsletter = (!empty($request->dataNewsletter)) ? $request->dataNewsletter : null;

        if (($scoreCaptcha >= 0.5 && $actionCaptcha == 'newsletter') || $testCaptcha == true) {
            $data['fullname'] = $dataNewsletter['fullname']??'';
            $data['phone'] = $dataNewsletter['phone']??''; 
            $data['email'] = $dataNewsletter['email']??''; 
            $data['address'] = $dataNewsletter['address']??''; 
            $data['content'] = $dataNewsletter['content']??''; 
            $data['date_created'] = Carbon::now()->timestamp;
            $data['confirm_status'] = 1;
            $data['type'] = $dataNewsletter['type']??'';
            // $data['subject'] = "Đăng ký nhận tin";
            if (NewslettersModel::create($data)) {
                transfer('Đăng ký nhận tin thành công !', 1, PeceeRequest()->getHeader('http_referer'));
            } else {
                transfer('Đăng ký nhận tin thất bại !', 0, PeceeRequest()->getHeader('http_referer'));
            }
        } else {
            transfer('Đăng ký nhận tin thất bại !', 0, PeceeRequest()->getHeader('http_referer'));
        }
    }
}