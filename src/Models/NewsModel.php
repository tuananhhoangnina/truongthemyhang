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

class NewsModel extends Model
{
    use HasFactory,TraitAttr;
    protected $guarded = [];
    protected $table = 'news';
    public function getCategoryList(): \NINACORE\DatabaseCore\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(NewsListModel::class,'id_list','id');
    }
    public function getCategoryCat(): \NINACORE\DatabaseCore\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(NewsCatModel::class,'id_cat','id');
    }
    public function getCategoryItem(): \NINACORE\DatabaseCore\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(NewsItemModel::class,'id_item','id');
    }
    public function getCategorySub(): \NINACORE\DatabaseCore\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(NewsSubModel::class,'id_sub','id');
    }
    public function tags(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(TagsModel::class, 'news_tags', 'id_parent', 'id_tags');
    }
}
