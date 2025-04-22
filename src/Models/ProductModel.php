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
use NINACORE\Traits\FullTextSearch;

class ProductModel extends Model
{
    use HasFactory,TraitAttr, FullTextSearch;
    protected $guarded = [];
    protected $table = 'product';
    protected $searchable = [
        'namevi'
    ];
    public function getBrand(): \NINACORE\DatabaseCore\Eloquent\Relations\belongsTo    {        return $this->belongsTo(ProductBrandModel::class,'id_brand','id');    }
    public function getNews(): \NINACORE\DatabaseCore\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(NewsModel::class,'id','id_parent');
    }
    public function getCategoryList(): \NINACORE\DatabaseCore\Eloquent\Relations\belongsTo    {        return $this->belongsTo(ProductListModel::class,'id_list','id');    }
    public function getCategoryCat(): \NINACORE\DatabaseCore\Eloquent\Relations\belongsTo    {        return $this->belongsTo(ProductCatModel::class,'id_cat','id');    }
    public function getCategoryItem(): \NINACORE\DatabaseCore\Eloquent\Relations\belongsTo    {        return $this->belongsTo(ProductItemModel::class,'id_item','id');    }
    public function getCategorySub(): \NINACORE\DatabaseCore\Eloquent\Relations\belongsTo    {        return $this->belongsTo(ProductSubModel::class,'id_sub','id');    }
    public function tags(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsToMany    {        return $this->belongsToMany(TagsModel::class, 'product_tags', 'id_parent', 'id_tags');    }
    
    public function getComment(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(CommentModel::class, 'id_variant', 'id')->where("id_parent", 0)->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);
    }
   

}