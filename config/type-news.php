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
    'dich-vu' => [
        'title_main' => "Dịch vụ",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'dichvu'
        ],
        'view' => true,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '540',
                'height' => '540',
                'thumb' => '540x540x1'
            ]
        ],
        'show_images' => true,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
        'categories' => [
            'list' => [
                'title_main_categories' => "Danh mục cấp 1",
                'copy_categories' => false,
                'images' => [
                    'photo' => [
                        'title' => 'Ảnh đại diện',
                        'width' => '500',
                        'height' => '500',
                        'thumb' => '500x500x1'
                    ],
                ],
                'slug_categories' => true,
                'status_categories' => ["hienthi" => "Hiển thị"],
                'gallery_categories' => [],
                'name_categories' => true,
                'desc_categories' => false,
                'desc_categories_cke' => false,
                'content_categories' => false,
                'content_categories_cke' => false,
                'seo_categories' => true,
            ],
        ]
    ],
    'video' => [
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'sukien'
        ],
        'title_main' => "Video",
        'status' => ["hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '1187',
                'height' => '579',
                'thumb' => '1187x579x1'
            ]
        ],
        'view' => true,
        'show_images' => true,
        'name' => true,
        'link' => true,
    ],
    'su-kien' => [
        'title_main' => "Sự kiện",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'sukien'
        ],
        'view' => true,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '740',
                'height' => '415',
                'thumb' => '740x415x1'
            ]
        ],
        'show_images' => true,
        'name' => true,
        'desc' => false,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],
    'uu-dai' => [
        'title_main' => "Ưu đãi",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'uudai'
        ],
        'view' => true,
        'slug' => true,
        'status' => [ "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '740',
                'height' => '415',
                'thumb' => '740x415x1'
            ]
        ],
        'show_images' => true,
        'name' => true,
        'desc' => false,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],
    'tin-tuc' => [
        'title_main' => "Tin tức",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'tintuc'
        ],
        'view' => true,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '540',
                'height' => '540',
                'thumb' => '540x540x1'
            ]
        ],
        'show_images' => true,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],
    'feedback' => [
        'title_main' => "Feedback",
        'status' => [ "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '84',
                'height' => '84',
                'thumb' => '84x84x1'
            ]
        ],
        'show_images' => true,
        'name' => true,
        'desc' => true,
        'content' => true,
    ],
];
