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
    'logo' => [
        'title_main' => "Logo",
        'kind' => 'static',
        'title' => true,
        'desc' => false,
        'desc_cke' => false,
        'link' => true,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => true,
        'width' => 144,
        'height' => 144,
        'thumb' => '144x144x1',
    ],
    'favicon' => [
        'title_main' => "Favicon",
        'kind' => 'static',
        'status' => ["hienthi" => "Hiển thị"],
        'images' => true,
        'width' => 48,
        'height' => 48,
        'thumb' => '48x48x1',
    ],
    'banner-quangcao' => [
        'title_main' => "Banner Quảng cáo",
        'kind' => 'static',
        'title' => true,
        'desc' => false,
        'desc_cke' => false,
        'link' => true,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => true,
        'width' => 580,
        'height' => 520,
        'thumb' => '580x520x1',
    ],
    'nhantin-quangcao' => [
        'title_main' => "Nhận tin Quảng cáo",
        'kind' => 'static',
        'title' => true,
        'desc' => false,
        'desc_cke' => false,
        'link' => true,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => true,
        'width' => 669,
        'height' => 500,
        'thumb' => '669x500x1',
    ],
    'intro' => [
        'title_main' => "Intro",
        'kind' => 'album',
        'status' => ["hienthi" => "Hiển thị"],
        'number' => 3,
        'show_images' => true,
        'images' => true,
        'avatar' => true,
        'link' => true,
        'name' => true,
        'width' => 330,
        'height' => 430,
        'thumb' => '330x430x2',
    ],
    'slide' => [
        'title_main' => "slideshow",
        'kind' => 'album',
        'status' => ["hienthi" => "Hiển thị"],
        'number' => 5,
        'images' => true,
        'show_images' => true,
        'gallery' => true,
        'link' => true,
        'name' => true,
        'desc' => false,
        'width' => 1920,
        'height' => 860,
        'thumb' => '1920x860x1',
    ],
    'menu-mon-an' => [
        'title_main' => "Menu món ăn",
        'kind' => 'album',
        'status' => ["hienthi" => "Hiển thị"],
        'number' => 4,
        'images' => true,
        'show_images' => true,
        'gallery' => true,
        'link' => true,
        'name' => true,
        'width' => 650,
        'height' => 400,
        'thumb' => '650x400x1',
    ],
    'social' => [
        'title_main' => "Mạng xã hội",
        'kind' => 'album',
        'status' => ["hienthi" => "Hiển thị"],
        'number' => 4,
        'show_images' => true,
        'images' => true,
        'avatar' => true,
        'link' => true,
        'name' => true,
        'desc' => false,
        'width' => 37,
        'height' => 37,
        'thumb' => '37x37x2',
    ],
];