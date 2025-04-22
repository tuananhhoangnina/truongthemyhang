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
use NINACORE\Core\Support\Facades\Seo;
use NINACORE\Core\Support\Facades\View;
use Illuminate\Http\Request;
use NINACORE\Models\NewsCatModel;
use NINACORE\Models\NewsItemModel;
use NINACORE\Models\NewsListModel;
use NINACORE\Models\NewsModel;
use NINACORE\Core\Support\Facades\BreadCrumbs;
use NINACORE\Models\NewsSubModel;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewsModel::select('id', 'name' . $this->lang, 'desc' . $this->lang,  'slug' . $this->lang, 'photo', 'link')
            ->where('type', $this->type)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->datePublish()
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(12);

        $titleMain =  __("web.".$this->infoSeo('news', $this->type, 'title'));

        BreadCrumbs::setBreadcrumb(type: $this->type, title: $titleMain);
        $this->seoPage($titleMain, $this->infoSeo('news', $this->type, 'type', 'index'));

        if ($this->type == 'video') {
            $template = 'video';
        } else {
            $template = 'news';
        }

        return View::share(['com' => $this->type])->view('news.' . $template, compact('news', 'titleMain'));
    }

    public function list($slug)
    {
        $itemList = NewsListModel::select('id', 'name' . $this->lang,  'desc' . $this->lang,  'slug' . $this->lang,  'photo', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slug" . $this->lang, $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $this->type =  $itemList->type;
        $titleMain = $itemList['name' . $this->lang];
        if ($this->infoSeo('news', $itemList->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemList->type]), $this->infoSeo('news', $itemList->type, 'title'));
        BreadCrumbs::setBreadcrumb(list: $itemList);
        $news = $itemList->getItems(['id', 'name' . $this->lang, 'desc' . $this->lang,  'slug' . $this->lang, 'photo'])->paginate(10);
        $seoPage = $itemList->getSeo('news-list', 'save')->first();
        $seoPage['type'] = $this->infoSeo('news', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'news', 'seo');
        return View::share(['com' => $this->type])->view('news.news', compact('news', 'titleMain'));
    }

    public function cat($slug)
    {
        $itemCat = NewsCatModel::select('id', 'name' . $this->lang,  'desc' . $this->lang,  'slug' . $this->lang, 'photo', 'id_list', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slug" . $this->lang, $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $this->type =  $itemCat->type;
        $titleMain = $itemCat['name' . $this->lang];
        $itemList = $itemCat->getCategoryList;
        if ($this->infoSeo('news', $itemCat->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemCat->type]), $this->infoSeo('news', $itemCat->type, 'title'));
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat);
        $news = $itemCat->getItems(['id', 'name' . $this->lang,  'desc' . $this->lang,  'slug' . $this->lang, 'photo'])->paginate(10);
        $seoPage = $itemCat->getSeo('news-cat', 'save')->first();
        $seoPage['type'] = $this->infoSeo('news', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'news', 'seo');
        return View::share(['com' => $this->type])->view('news.news', compact('news', 'titleMain'));
    }

    public function item($slug)
    {
        $itemItem = NewsItemModel::select('id', 'name' . $this->lang,  'desc' . $this->lang,  'slug' . $this->lang, 'photo', 'id_list', 'id_cat', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slug" . $this->lang, $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $this->type =  $itemItem->type;
        $titleMain = $itemItem['name' . $this->lang];
        $itemList = $itemItem->getCategoryList;
        $itemCat = $itemItem->getCategoryCat;
        if ($this->infoSeo('news', $itemItem->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemItem->type]), $this->infoSeo('news', $itemItem->type, 'title'));
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat, item: $itemItem);
        $news = $itemItem->getItems(['id', 'name' . $this->lang, 'desc' . $this->lang,  'slug' . $this->lang, 'photo'])->paginate(10);
        $seoPage = $itemItem->getSeo('news-item', 'save')->first();
        $seoPage['type'] = $this->infoSeo('news', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'news', 'seo');
        return View::share(['com' => $this->type])->view('news.news', compact('news', 'titleMain'));
    }

    public function sub($slug)
    {
        $itemSub = NewsSubModel::select('id', 'name' . $this->lang,  'desc' . $this->lang, 'slug' . $this->lang, 'photo', 'id_list', 'id_cat', 'id_item', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slug" . $this->lang, $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $this->type =  $itemSub->type;
        $titleMain = $itemSub['name' . $this->lang];
        $itemList = $itemSub->getCategoryList;
        $itemCat = $itemSub->getCategoryCat;
        $itemItem = $itemSub->getCategoryItem;
        if ($this->infoSeo('news', $itemSub->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemSub->type]), $this->infoSeo('news', $itemSub->type, 'title'));
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat, item: $itemItem, sub: $itemSub);
        $news = $itemSub->getItems(['id', 'name' . $this->lang,  'desc' . $this->lang, 'slugvi', 'slugen', 'photo'])->paginate(10);
        $seoPage = $itemSub->getSeo('news-sub', 'save')->first();
        $seoPage['type'] = $this->infoSeo('news', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'news', 'seo');
        return View::share(['com' => $this->type])->view('news.news', compact('news', 'titleMain'));
    }

    public function detail($slug)
    {
        $rowDetail = NewsModel::select('type', 'id', 'name' . $this->lang, 'desc' . $this->lang, 'content' . $this->lang,  'slug' . $this->lang,  'view', 'id_list', 'id_cat', 'id_item', 'id_sub', 'photo', 'options')
            ->where(function ($query) use ($slug) {
                $query->where("slug" . $this->lang, $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $seoPage = $rowDetail->getSeo('news', 'save')->first();
        Seo::setSeoData($seoPage, 'news', 'seo');
        $rowDetailPhoto = $rowDetail->getPhotos('news')->get();
        $tags = $rowDetail->tags ?? [];
        $itemList = $rowDetail->getCategoryList;
        $itemCat = $rowDetail->getCategoryCat;
        $itemItem = $rowDetail->getCategoryItem;
        $itemSub = $rowDetail->getCategorySub;
        if (!empty($this->infoSeo('news', $rowDetail->type, 'title'))) BreadCrumbs::set(url('slugweb', ['slug' => $rowDetail->type]), __("web." . $this->infoSeo('news', $rowDetail->type, 'title')));
        BreadCrumbs::setBreadcrumb(detail: $rowDetail, list: $itemList, cat: $itemCat, item: $itemItem, sub: $itemSub);
        $news = NewsModel::select('id', 'name' . $this->lang, 'photo', 'desc' . $this->lang, 'slugvi')
            ->where(['type' => $rowDetail['type'], 'id_list' => $rowDetail->id_list])
            ->where("id", "!=", $rowDetail['id'])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->get();
        return View::share('com', $rowDetail->type)->view('news.detail', compact('rowDetail', 'rowDetailPhoto', 'news', 'tags'));
    }
}