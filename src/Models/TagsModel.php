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

class TagsModel extends Model
{
    use HasFactory;
    use TraitAttr;
    protected $guarded = [];
    protected $table = 'tags';
    public function products(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ProductModel::class, 'product_tags', 'id_tags', 'id_parent');
    }
    public function news(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(NewsModel::class, 'news_tags', 'id_tags', 'id_parent');
    }
}