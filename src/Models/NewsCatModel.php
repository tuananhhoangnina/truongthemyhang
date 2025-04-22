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


class NewsCatModel extends Model
{
    use HasFactory,TraitAttr;
    protected $guarded = [];
    protected $table = 'news_cat';
    public function getItems($select = ['*'])
    {
        return $this->hasMany(NewsModel::class,'id_cat')
            ->select($select)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->orderBy('id', 'desc');
    }
    public function getCategoryList(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(NewsListModel::class,'id_list','id');
    }
    public function getCategoryItems(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(NewsItemModel::class,'id_cat');
    }
    public function getCategorySubs(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(NewsSubModel::class,'id_cat');
    }
}
