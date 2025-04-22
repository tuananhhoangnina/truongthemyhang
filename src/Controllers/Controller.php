<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\Controllers;
use NINACORE\Core\Routing\NINAController;
use NINACORE\Core\Support\Facades\Seo;
use NINACORE\Models\SeoPageModel;


class Controller extends NINAController
{
    protected string $lang;
    protected string $seolang;
    protected ?string $type;
    public function __construct(){
        $this->lang = session()->get('locale')??config('app.lang_default');
        $this->seolang = app()->getSeoLang();
        $this->type = (config('app.langconfig') === 'link') ? request()->segment(2) : (request()->segment(1)??'trang-chu');
        $this->type = $this->type == 'index' ? 'trang-chu' : $this->type;
    }
    public function seoPage( $titleMain = '',$type=null): void {
        $seoPage = SeoPageModel::select('*')
            ->where('type', $this->type)
            ->first();
        $seoPage['title' . $this->lang] = $seoPage['title' . $this->lang]?? $titleMain;
        $seoPage['type'] = $type??'website';
        Seo::setSeoData($seoPage,'seopage', 'seopage');
    }
    public function infoSeo($com = '', $type = '', ...$field){
        return config('type.' . $com . '.' . $type . '.website.'.implode('.',$field))??[];
    }

}