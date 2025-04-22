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

class ProductCatModel extends Model
{
    use HasFactory,TraitAttr;
    protected $guarded = [];
    protected $lang;
    protected $table = 'product_cat';

    public function __construct()
    {
        parent::__construct();
        $this->lang = session()->get('locale') ?? config('app.lang_default');
    }
    public function getItems($select = [])
    {
        return $this->hasMany(ProductModel::class,'id_cat')
            ->select(['id','id_list','name'.$this->lang,'regular_price', 'sale_price', 'discount', 'photo',...$select])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);
    }
    public function getCategoryList(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductListModel::class,'id_list','id');
    }
    public function getCategoryItems(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(ProductItemModel::class,'id_cat');
    }
    public function getCategorySubs(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(ProductSubModel::class,'id_cat');
    }
}