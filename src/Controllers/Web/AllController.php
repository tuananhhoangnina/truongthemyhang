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
use NINACORE\Controllers\Controller;
use NINACORE\Models\PhotoModel;
use NINACORE\Models\SettingModel;
use NINACORE\Models\NewsModel;
use NINACORE\Models\NewsListModel;
use NINACORE\Models\StaticModel;
use NINACORE\Models\ExtensionsModel;
use NINACORE\Models\ProductListModel;
use NINACORE\Models\ProductCatModel;
use NINACORE\Core\Container;

class AllController extends Controller
{
    function composer($view): void
    {
      
        $all = remember('all', 86400, function () {
            $photos = PhotoModel::select('photo', 'name' . $this->lang, 'link', 'type')
                ->whereIn('type', ['logo', 'logoft', 'favicon', 'social', 'mangxahoi1', 'banner-top'])
                ->whereRaw("FIND_IN_SET(?, status)", ['hienthi'])
                ->orderBy('numb', 'asc')
                ->orderBy('id', 'desc')
                ->get();

            $logoPhoto = $photos->where('type', 'logo')->first();

            $logoPhotoFooter = $photos->where('type', 'logoft')->first();

            $favicon = $photos->where('type', 'favicon')->first();

            $social = $photos->where('type', 'social');

            $social1 = $photos->where('type', 'mangxahoi1');

            $bannerTop = $photos->where('type', 'banner-top');

            $productListMenu = ProductListModel::select('name' . $this->lang, 'desc' . $this->lang, 'slug' . $this->lang, 'id', 'photo')
                ->where('type', 'san-pham')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->with([
                    'getCategoryCats' => function ($query) {
                        $query->with([
                            'getCategoryItems' => function ($query) {
                                $query->with([
                                    'getCategorySubs' => function ($query) {
                                        $query->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);
                                    }
                                ])->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);
                            }
                        ])->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);
                    }
                ])
                ->orderBy('numb', 'asc')
                ->orderBy('id', 'desc')
                ->get();

                $dichvuListMenu = NewsListModel::select('name' . $this->lang, 'desc' . $this->lang, 'slug' . $this->lang, 'id', 'photo')
                ->where('type', 'dich-vu')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->orderBy('numb', 'asc')
                ->orderBy('id', 'desc')
                ->get();                
            

            $footer = StaticModel::select('name' . $this->lang, 'content' . $this->lang, 'desc' . $this->lang, 'slug' . $this->lang)
                ->where('type', 'footer')
                ->first();

            $extHotline = ExtensionsModel::select('*')
                ->where('type', 'hotline')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->first();

            $extSocial = ExtensionsModel::select('*')
                ->where('type', 'social')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->first();

            $extPopup = ExtensionsModel::select('*')
                ->where('type', 'popup')
                ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
                ->first();

            $setting = SettingModel::select('*')->first();

            $optSetting = json_decode($setting['options'], true);

            $configType = json_decode(json_encode(config('type')));

            $lang = session()->get('locale');

            $sluglang = 'slug' . $this->lang;

            return get_defined_vars();
        });

        $view->share($all);
    }
}
