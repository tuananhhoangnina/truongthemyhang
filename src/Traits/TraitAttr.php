<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\Traits;

trait TraitAttr
{
    public function getSeo($com = 'product', $act = 'man')
    {
        $currentModelClass = get_class($this);
        $currentTableName = (new $currentModelClass)->getTable();
        return $this->belongsTo('\NINACORE\Models\SeoModel', 'id', 'id_parent')
            ->join($currentTableName, $currentTableName . '.id', '=', 'seo.id_parent')
            ->select('seo.*', $currentTableName . '.photo', $currentTableName . '.options as base_options')
            ->where('seo.type', $this->type)
            ->where('seo.act', $act)
            ->where('seo.com', $com);
    }
    public function getPhotos()
    {
        return $this->hasMany('\NINACORE\Models\GalleryModel', 'id_parent', 'id')->where('type_parent', $this->type);
    }
    /**
     * Scope cho trường hợp date_publish null hoặc nhỏ hơn thời gian hiện tại.
     *
     * @param \NINACORE\DatabaseCore\Eloquent\Builder $query
     * @return \NINACORE\DatabaseCore\Eloquent\Builder
     */
    public function scopedatePublish($query): \NINACORE\DatabaseCore\Eloquent\Builder
    {
        return $query->where(function ($query) {
            $query->whereNull('date_publish')->orWhere('date_publish', '<', \Carbon\Carbon::now());
        });
    }
}
