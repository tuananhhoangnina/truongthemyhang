<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\Models;

use NINACORE\DatabaseCore\Eloquent\Factories\HasFactory;
use NINACORE\DatabaseCore\Eloquent\Model;
use NINACORE\Traits\TraitAttr;


class NewsListModel extends Model
{
    use HasFactory,TraitAttr;
    protected $guarded = [];
    protected $table = 'news_list';
    public function getItems($select = ['*'])
    {
        return $this->hasMany(NewsModel::class,'id_list')
            ->select($select)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->orderBy('id', 'desc');
    }
    public function getCategoryCats(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(NewsCatModel::class,'id_list');
    }
    public function getCategoryItems(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(NewsItemModel::class,'id_list');
    }
    public function getCategorySubs(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(NewsSubModel::class,'id_list');
    }
}
