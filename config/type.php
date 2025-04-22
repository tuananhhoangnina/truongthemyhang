<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

return  [
    'product' => require "type-products.php",
    'news' => require "type-news.php",
    'photo' =>  require "type-photo.php",
    'newsletters' => require "type-newsletters.php",
    'static' => require "type-static.php",
    // 'tags' => require "type-tags.php",
    'seo' => [
        'page' => [
            'trang-chu' => 'Trang chủ',
            'dich-vu' => 'Dịch vụ',
            'thu-vien-anh' => 'Không gian',
            'san-pham' => 'Sản phẩm',
            'su-kien' => 'Sự kiện',
            'uu-dai' => 'Ưu đãi',
            'tin-tuc' => 'Tin tức',
        ],
        'sitemap' => [
            'dich-vu' => 'Dịch vụ',
            'thu-vien-anh' => 'Không gian',
            'san-pham' => 'Sản phẩm',
            'su-kien' => 'Sự kiện',
            'uu-dai' => 'Ưu đãi',
            'tin-tuc' => 'Tin tức',
            'lien-he' => 'Liên hệ'
        ],
        'type' =>
        [
            'trang-chu' => "Trang chủ",
        ],
        'width' => 300,
        'height' => 300,
        'thumb' => '300x300x1',
    ],
    'setting' => [
        'cau-hinh' => [
            'title_main' => "Thông tin công ty",
            'address' => true,
            'phone' => true,
            'hotline' => true,
            'zalo' => true,
            'email' => true,
            'website' => true,
            'fanpage' => true,
            'coords' => true,
            'coords_iframe' => true,
            'worktime' => true,
            'link_googlemaps'  => true,
        ],
        'dieu-huong' => [
            'title_main' => "Điều hướng link",
            'old_link' => true,
            'new_link' => true,
            '302' => true
        ]
    ],
    'extensions' => [
        // 'popup' => [
        //     'title_main' => "Popup",
        //     'images' => true,
        //     'status' => ["hienthi" => "Hiển thị", "repeat" => "Lặp lại"],
        //     'width' => 800,
        //     'height' => 500,
        //     'thumb' => '800x500x1',
        // ],
        'hotline' => [
            'title_main' => "Điện thoại",
            'status' => ["hienthi" => "Hiển thị"],
            'images' => true,
            'width' => 35,
            'height' => 35,
            'thumb' => '35x35x1',
        ],
        'social' => [
            'title_main' => "Tiện ích",
            'status' => ["hienthi" => "Hiển thị"],
            'images' => false,
            'width' => 35,
            'height' => 35,
            'thumb' => '35x35x1',
        ],
    ],
    'users' => [
        'active' => false,
        'admin' => true,
        'member' => true,
        'permission' => true,
    ],
    // 'quicklink' => [
    //     'san-pham' => [
    //         'link' => ['com' => 'product', 'act' => 'add', 'type' => 'san-pham'],
    //         'icon' => '<i class="ti ti-package-import fs-4"></i>',
    //         'title' => 'Sản phẩm',
    //         'sub_title' => 'Thêm sản phẩm'
    //     ],
    //     'tin-tuc' => [
    //         'link' => ['com' => 'news', 'act' => 'add', 'type' => 'tin-tuc'],
    //         'icon' => '<i class="ti ti-news fs-4"></i>',
    //         'title' => 'Runner cần biết',
    //         'sub_title' => 'Thêm bài viết'
    //     ]
    // ],
    // 'order' => [
    //     'don-hang' => [
    //         'title_main' => "Đơn hàng",
    //         'excel' => true,
    //         'search' => true,
    //     ],
    // ],
    // 'comment' => [
    //     'binh-luan' => [
    //         'title_main' => "Bình luận",
    //         'status' => ["hienthi" => "Duyệt tin"],
    //     ]
    // ],
    'link' => [
        'url' => [
            'title_main' => "Link nội dung",
            'name' => true,
            'link' => true,
            'status' => ["hienthi" => "Hiển thị"],
        ]
    ],
    // 'properties' => [
    //     'san-pham' => [
    //         'title_main' => "Thuộc tính",
    //         'slug' => true,
    //         'images' => true,
    //         'name' => true,
    //         'status' => ["hienthi" => "Hiển thị"],
    //         'categories' => [
    //             'list' => [
    //                 'title_main_categories' => "Danh mục cấp 1",
    //                 'slug_categories' => true,
    //                 'name_categories' => true,
    //                 'status_categories' => ["hienthi" => "Hiển thị", "search" => "Tìm kiếm", "cart" => "Giỏ hàng"],
    //             ]
    //         ]
    //     ]
    // ],
    // 'places' => [
    //     'dia-chi' => [
    //         'title_main' => "Địa chỉ",
    //         'slug' => true,
    //         'status' => ["hienthi" => "Hiển thị"],
    //         'categories' => [
    //             'list' => [
    //                 'title_main_categories' => "Tỉnh/Thành phố",
    //                 'name_categories' => true,
    //                 'slug_categories' => true,
    //                 'status_categories' => ["hienthi" => "Hiển thị"],
    //             ],
    //             'cat' => [
    //                 'title_main_categories' => "Quận/Huyện",
    //                 'name_categories' => true,
    //                 'slug_categories' => true,
    //                 'status_categories' => ["hienthi" => "Hiển thị"],
    //             ],
    //             'item' => [
    //                 'title_main_categories' => "Phường/Xã",
    //                 'name_categories' => true,
    //                 'slug_categories' => true,
    //                 'status_categories' => ["hienthi" => "Hiển thị"],
    //             ]
    //         ]
    //     ]
    // ],
    'categoriesProperties' => true, // Thêm danh mục cấp 1 cho danh mục thuộc tính
    'type_img' => 'jpg,gif,png,jpeg,gif,webp,WEBP',
    'type_file' => 'doc,docx,pdf,rar,zip,ppt,pptx,xls,xlsx',
    'type_video' => 'mp3,mp4',
    'table' => ['product', 'news', 'static'],
    'link_content' => ['content', 'promotion']
];
