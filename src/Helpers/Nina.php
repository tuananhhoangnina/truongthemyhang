<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\Helpers;
use NINACORE\Core\Singleton;
use NINACORE\Models\SlugModel;
use NINACORE\Models\TagsModel;
use NINACORE\Models\OrderStatusModel;
use NINACORE\Models\NewsModel;
use NINACORE\Models\SettingModel;
use NINACORE\Models\CounterModel;
use NINACORE\Models\PropertiesModel;
use NINACORE\Models\PropertiesListModel;
use NINACORE\Models\GalleryModel;
use NINACORE\Models\UserModel;
use NINACORE\Models\LinkModel;
use NINACORE\Models\ProductPropertiesModel;
use Illuminate\Http\Request;
use NINACORE\Core\Support\Facades\DB;
use IvoPetkov\HTML5DOMDocument;
use Auth;

class Nina
{
    use Singleton;
    private $hash;
    private $cache;


}