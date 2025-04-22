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
use NINACORE\Core\Support\Facades\View;
use NINACORE\Core\Support\Facades\BreadCrumbs;
use NINACORE\Controllers\Controller;
use NINACORE\Core\Support\Facades\Seo;
use NINACORE\Models\NewsModel;
use NINACORE\Models\ProductModel;
use NINACORE\Models\ProductListModel;
use NINACORE\Models\ProductCatModel;
use NINACORE\Models\ProductItemModel;
use NINACORE\Models\ProductSubModel;
use NINACORE\Models\ProductBrandModel;
use NINACORE\Models\PropertiesListModel;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = $this->productItem('', $request, $this->type);
        $titleMain =  $this->infoSeo('product', $this->type, 'title');
        $titleMain = __('web.' . $titleMain);

        $view = $this->type == "thu-vien-anh" ? "album.album" : "product.product";

        BreadCrumbs::setBreadcrumb(type: $this->type, title: $titleMain);
        $this->seoPage($titleMain, $this->infoSeo('product', $this->type, 'type', 'index'));
        return View::share(['com' => $this->type])->view($view, compact('product', 'titleMain'));
    }

    public function allBrand(Request $request)
    {
        $brand = ProductBrandModel::select('id', 'name' . $this->lang, 'desc' . $this->lang, 'slug' . $this->lang,  'photo', 'type')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(12);
        $titleMain =  __('web.hangsanpham');
        BreadCrumbs::setBreadcrumb(type: $this->type, title: $titleMain);
        $this->seoPage($titleMain, $this->infoSeo('product', $this->type, 'type', 'index'));
        return View::share(['com' => $this->type])->view('brand.brand', compact('brand', 'titleMain'));
    }

    public function brand($slug, Request $request)
    {
        $itemBrand = ProductBrandModel::select('id', 'name' . $this->lang, 'desc' . $this->lang, 'slug' . $this->lang,  'photo', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slug". $this->lang, $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $this->type =  $itemBrand->type;
        $titleMain = $itemBrand['name' . $this->lang];
        BreadCrumbs::setBreadcrumb(list: $itemBrand);
        $product = $this->productItem($itemBrand, $request);
        $seoPage = $itemBrand->getSeo('product-brand', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return View::share(['idList' => $itemBrand['id'], 'com' => $this->type])->view('product.product', compact('product', 'titleMain'));
    }

    public function list($slug, Request $request)
    {
        $itemList = ProductListModel::select('id', 'name' . $this->lang, 'desc' . $this->lang, 'slug' . $this->lang,  'photo', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slug". $this->lang, $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $listProperties =  $this->searchListProperties($itemList['id']);
        $this->type =  $itemList->type;
        $titleMain = $itemList['name' . $this->lang];
        if ($this->infoSeo('product', $itemList->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemList->type]), __("web.".$this->infoSeo('product', $itemList->type, 'title')));
        BreadCrumbs::setBreadcrumb(list: $itemList);
        $product = $this->productItem($itemList, $request);
        $seoPage = $itemList->getSeo('product-list', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return View::share(['idList' => $itemList['id'], 'com' => $this->type])->view('product.product', compact('product', 'titleMain', 'listProperties'));
    }

    public function cat($slug, Request $request)
    {
        $itemCat = ProductCatModel::select('id', 'id_list', 'name' . $this->lang,  'desc' . $this->lang, 'slug' . $this->lang, 'photo', 'id_list', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slug". $this->lang, $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $listProperties =  $this->searchListProperties($itemCat['id_list']);
        $this->type =  $itemCat->type;
        $titleMain = $itemCat['name' . $this->lang];
        $itemList = $itemCat->getCategoryList;
        if ($this->infoSeo('product', $itemCat->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemCat->type]), $this->infoSeo('product', $itemCat->type, 'title'));
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat);
        $product = $this->productItem($itemCat, $request);
        $seoPage = $itemCat->getSeo('product-cat', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return View::share(['com' => $this->type])->view('product.product', compact('product', 'titleMain', 'listProperties'));
    }

    public function item($slug, Request $request)
    {
        $itemItem = ProductItemModel::select('id', 'id_list', 'name' . $this->lang,  'desc' . $this->lang, 'slug' . $this->lang,  'photo', 'id_list', 'id_cat', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slug". $this->lang, $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $listProperties =  $this->searchListProperties($itemItem['id_list']);
        $this->type =  $itemItem->type;
        $titleMain = $itemItem['name' . $this->lang];
        $itemList = $itemItem->getCategoryList;
        $itemCat = $itemItem->getCategoryCat;
        if ($this->infoSeo('product', $itemItem->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemItem->type]), $this->infoSeo('product', $itemItem->type, 'title'));
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat, item: $itemItem);
        $product = $this->productItem($itemItem, $request);
        $seoPage = $itemItem->getSeo('product-item', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return View::share(['com' => $this->type])->view('product.product', compact('product', 'titleMain', 'listProperties'));
    }
    public function sub($slug, Request $request)
    {
        $itemSub = ProductSubModel::select('id', 'name' . $this->lang, 'desc' . $this->lang, 'slug' . $this->lang, 'photo', 'id_list', 'id_cat', 'id_item', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slug". $this->lang, $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $this->type =  $itemSub->type;
        $titleMain = $itemSub['name' . $this->lang];
        $itemList = $itemSub->getCategoryList;
        $itemCat = $itemSub->getCategoryCat;
        $itemItem = $itemSub->getCategoryItem;
        if ($this->infoSeo('product', $itemSub->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemSub->type]), $this->infoSeo('product', $itemSub->type, 'title'));
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat, item: $itemItem, sub: $itemSub);
        $product = $this->productItem($itemSub, $request);
        $seoPage = $itemSub->getSeo('product-sub', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return View::share(['com' => $this->type])->view('product.product', compact('product', 'titleMain'));
    }
    public function detail($slug)
    {
        $rowDetail = ProductModel::select('type', 'id', 'id_list', 'properties', 'name' . $this->lang, 'slug'. $this->lang, 'desc' . $this->lang,  'content' . $this->lang,  'code', 'view', 'id_brand', 'id_list', 'id_cat', 'id_item', 'id_sub', 'photo', 'options', 'sale_price', 'regular_price', 'type', 'discount', 'view')->where(function ($query) use ($slug) {
            $query->where("slug". $this->lang, $slug);
        })->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])->first();
        if (!empty($rowDetail)) $rowDetail->increment('view');
        $query = PropertiesListModel::select('type', 'id', 'name' . $this->lang)
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['cart']);
        if (!empty(config('type.categoriesProperties'))) $query->whereRaw("FIND_IN_SET(?,id_list)", [$rowDetail['id_list']]);
        if(!empty($rowDetail['properties'])){
            $listProperties = $query->orderBy('numb', 'asc')->get()->map(fn($v) => [$v, $v->getProperties()->whereIn('id',  explode(',', $rowDetail['properties']))->get()]);
        }else{
            $listProperties = [];
        }
        $this->type =  $rowDetail->type;
        $seoPage = $rowDetail->getSeo('product', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'detail');
        Seo::setSeoData($seoPage, 'product', 'seo');
        $rowDetailPhoto = $rowDetail->getPhotos('product')->where('type', 'san-pham')->get();
        $rowDetailPhoto1 = $rowDetail->getPhotos('product')->where('type', 'hinh-anh')->get();
        $rowDetailAlbum = $rowDetail->getPhotos('product')->where('type', 'thu-vien-anh')->get();
        $rowNews = $rowDetail->getNews()->get();
        $tags = $rowDetail->tags ?? [];
        if ($this->infoSeo('product', $rowDetail->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $rowDetail->type]), __("web.".$this->infoSeo('product', $rowDetail->type, 'title')));
        BreadCrumbs::setBreadcrumb(detail: $rowDetail, list: $rowDetail->getCategoryList, cat: $rowDetail->getCategoryCat, item: $rowDetail->getCategoryItem, sub: $rowDetail->getCategorySub);
        $query = ProductModel::select('id', 'name' . $this->lang, 'photo', 'desc' . $this->lang, 'slug'. $this->lang, 'regular_price', 'discount', 'sale_price')->where('type',$this->type);
        if (!empty($rowDetail['id_list'])) $query->where('id_list', $rowDetail['id_list']);
        if (!empty($rowDetail['id_cat'])) $query->where('id_cat', $rowDetail['id_cat']);
        $query->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])->limit(10);
        $product = $query->get();

        $view = $this->type == "thu-vien-anh" ? "album.detail" : "product.detail";

        return View::share(['idList' => $rowDetail['id_list'], 'com' => $this->type])->view($view, compact('rowDetail', 'rowDetailPhoto', 'product', 'tags', 'rowNews', 'listProperties', 'rowDetailPhoto1', 'rowDetailAlbum'));
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->query('keyword');
        $product = ProductModel::select('id', 'name' . $this->lang, 'desc' . $this->lang,  'slug'. $this->lang, 'photo', 'regular_price', 'sale_price', 'discount')
            ->search($keyword)
            ->where('type', 'san-pham')
            ->orWhere('type', 'thuc-don')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(12);
        $titleMain = 'Tìm kiếm sản phẩm';
        return View::share(['com' => $this->type])->view('product.product', compact('product', 'titleMain'));
    }

    public function suggestProduct(Request $request)
    {
        $keyword = $request->query('keyword');
        $product = ProductModel::select('id', 'name' . $this->lang, 'desc' . $this->lang, 'slug'. $this->lang, 'photo', 'regular_price', 'sale_price', 'discount')
            ->search($keyword)
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('ajax.itemSearch', ['productAjax' => $product ?? []]);
    }

    protected function  checkListProperties($properties = [])
    {
        foreach ($properties as $k => $v) if (empty($v['data'])) unset($properties[$k]);
        return $properties;
    }

    private function  searchListProperties($idl)
    {
        $querySearch = PropertiesListModel::select('type', 'id', 'name' . $this->lang, 'slug'. $this->lang, )
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,id_list)", [$idl])
            ->whereRaw("FIND_IN_SET(?,status)", ['search']);
        return $querySearch->orderBy('numb', 'asc')->get()->map(fn($v) => [$v, $v->getProperties()->get()]);
    }

    private function productItem($array = null, $request = null, $slug = '')
    {
        // Mặc định sắp xếp
        $defaultOrderBy = ['numb' => 'asc', 'id' => 'desc'];
        $propaties = $request->getQueryString() ?? '';
        // Lấy thông tin sản phẩm cần truy vấn

        if (!empty($array)) {
            $query = $array->getItems([
                'id',
                'name'. $this->lang,
                'desc'. $this->lang,
                'slug'. $this->lang,
                'photo',
                'regular_price',
                'sale_price',
                'discount'
            ]);
        } else {
            $query = ProductModel::select('id', 'name' . $this->lang, 'photo', 'desc' . $this->lang, 'slug'. $this->lang, 'status', 'numb', 'sale_price', 'regular_price')
                ->where('type', $slug);
        }
        // Nếu có tham số lọc từ query string
        if (!empty($propaties)) {
            parse_str($propaties, $result);
            unset($result['zarsrc']);
            unset($result['utm_source']);
            unset($result['utm_medium']);
            unset($result['utm_campaign']);
            unset($result['page']);
            $query->where(function ($query) use ($result, &$defaultOrderBy) {
                foreach ($result as $key => $propertyGroup) {
                    $items = explode(',', $propertyGroup);

                    // Điều chỉnh sắp xếp khi đến nhóm thuộc tính cuối cùng
                    if ($key == array_key_last($result)) {
                        $defaultOrderBy = match ($items[0]) {
                            "1" => ['id' => 'asc'],
                            "2" => ['id' => 'desc'],
                            "3" => ['sale_price' => 'desc', 'regular_price' => 'desc'],
                            "4" => ['sale_price' => 'asc', 'regular_price' => 'asc'],
                            default => ['numb' => 'asc', 'id' => 'desc'],
                        };
                    } else {
                        // Thêm điều kiện lọc thuộc tính
                        $query->where(function ($subQuery) use ($items) {
                            foreach ($items as $item) {
                                $subQuery->orWhereRaw('FIND_IN_SET(?, properties)', [$item]);
                            }
                        });
                    }
                }
            });
        }
        // Áp dụng sắp xếp dựa trên thứ tự mặc định hoặc từ bộ lọc
        foreach ($defaultOrderBy as $column => $direction) {
            // Kiểm tra nếu regular_sale > 0 thì ưu tiên sắp xếp theo regular_sale
            if ($column === 'sale_price') {
                $query->orderByRaw('CASE WHEN sale_price > 0 THEN sale_price ELSE regular_price END ' . $direction);
            } else {
                $query->orderBy($column, $direction);
            }
        }
        $product = $query->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])->paginate(8);
        return $product;
    }
}