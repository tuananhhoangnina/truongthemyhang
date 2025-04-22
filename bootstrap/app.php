<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

$app = new \NINACORE\Core\Container(realpath(__DIR__ . '/../'));
$app->singleton(\NINACORE\Core\App::class, function ($app) {
    return new \NINACORE\Core\App($app);
});
return $app;