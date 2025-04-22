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

class ProductListModel extends Model
{
    use HasFactory,TraitAttr;
    protected $guarded = [];

    protected $lang;
    protected $table = 'product_list';

    public function __construct()
    {
        parent::__construct();
        $this->lang = session()->get('locale') ?? config('app.lang_default');
    }
    
    public function getItems($select = [])
    {
        return $this->hasMany(ProductModel::class,'id_list')->select(['id_list','name'.$this->lang,...$select])->whereRaw("FIND_IN_SET(?,status)", ['hienthi']); 
    }
    public function getCategoryCats(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(ProductCatModel::class,'id_list');
    }
    public function getCategoryItems(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(ProductItemModel::class,'id_list');
    }
    public function getCategorySubs(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(ProductSubModel::class,'id_list');
    }
}