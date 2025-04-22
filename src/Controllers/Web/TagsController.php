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
use NINACORE\Models\TagsModel;
use NINACORE\Models\ProductModel;
use NINACORE\Models\ProductTagsModel;
use NINACORE\Core\Support\Facades\BreadCrumbs;
use Func;

class TagsController extends Controller
{
    public function detail($slug)
    {
        $rowTags = TagsModel::select('name'. $this->lang, 'desc'. $this->lang, 'type', 'id')
            ->where('slug'. $this->lang, $slug)
            ->first();

        $this->type =  $rowTags->type;
        $titleMain = $rowTags['name' . $this->lang];
        BreadCrumbs::setBreadcrumb(list: $rowTags);
        $seoPage = $rowTags->getSeo('tags', 'save')->first();
        $seoPage['type'] = $this->infoSeo('tags', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'tags', 'seo');
        if ($rowTags['type'] == 'san-pham') {
            $product = $rowTags->products()->paginate(12);
            return view('product.product', compact('product', 'titleMain'));
        } else {
            $news = $rowTags->news()->paginate(12);
            return view('news.news', compact('news', 'titleMain'));
        }
    }
}