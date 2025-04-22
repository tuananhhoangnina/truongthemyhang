<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

return [
    'compiled' => base_path('compiled'),

    'view_mobile' => base_path('src/Views/templates'),

    'view_templates' => base_path('src/Views/templates'),

    'view_amp' => base_path('src/Views/amp'),

    'mode' => [
        'web' =>NINACORE\Core\View\BladeOne::MODE_AUTO,
        'admin' =>NINACORE\Core\View\BladeOne::MODE_AUTO
    ], //BladeOne::MODE_AUTO,BladeOne::MODE_DEBUG,BladeOne::MODE_FAST,BladeOne::MODE_SLOW

    'asset' => '/',

    'composer' => \NINACORE\Controllers\Web\AllController::class,

    'composer_admin' => \NINACORE\Controllers\Admin\AllController::class,
];