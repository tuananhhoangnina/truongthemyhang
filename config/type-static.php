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
    'sukien-slogan' => [
        'title_main' => "Sự kiện Slogan",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],
    'album-slogan' => [
        'title_main' => "Album Slogan",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],
    'monan-slogan' => [
        'title_main' => "Món ăn Slogan",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
        'desc' => true,
    ],
    'tintuc-slogan' => [
        'title_main' => "Tin tức Slogan",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],
    'feedback-slogan' => [
        'title_main' => "Feedback Slogan",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],
    'gioi-thieu' => [
        'title_main' => "Giới thiệu",
        'website' => [
            'type' => 'object',
            'title' => 'gioithieu'
        ],
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'images' => [
            'photo' => [
                'title' =>  'Hình ảnh',
                'width' => '736',
                'height' => '674',
                'thumb' => '300x300x1'
            ]
        ],
        'gallery' => [
            'gioi-thieu' => [
                "title_main_photo" => "Hình ảnh Giới thiệu",
                "title_sub_photo" => "Hình ảnh",
                "status_photo" => ["hienthi" => "Hiển thị"],
                "number_photo" => 3,
                "images_photo" => true,
                "avatar_photo" => true,
                "name_photo" => true,
                "photo_width" => 700,
                "photo_height" => 600,
                "photo_thumb" => '100x100x1'
            ],
        ],
        'name' => true,
        'desc' => true,
        'desc_cke' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
    ],
    'lien-he' => [
        'title_main' => "Liên hệ",
        'website' => [
            'title' => 'Liên hệ'
        ],
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'images' => [
            'photo' => [
                'title' =>  'Hình ảnh',
                'width' => '300',
                'height' => '300',
                'thumb' => '300x300x1'
            ]
        ],
        'name' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
    ],
    'footer' => [
        'title_main' => "Footer",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'images' => [
            // 'photo' => [
            //     'title' =>  'Hình ảnh',
            //     'width' => '300',
            //     'height' => '300',
            //     'thumb' => '300x300x1'
            // ]
        ],
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
    ]
];
