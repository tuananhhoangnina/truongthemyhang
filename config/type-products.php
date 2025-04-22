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
    'san-pham' => [
        'title_main' => "Sản Phẩm",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'sanpham'
        ],
        'copy' => true,
        'tags' => false,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '950',
                'height' => '630',
                'thumb' => '950x630x1'
            ],
        ],
        'show_images' => true,
        'gallery' => [
            'san-pham' => [
                "title_main_photo" => "Hình ảnh sản phẩm",
                "title_sub_photo" => "Hình ảnh",
                "status_photo" => ["hienthi" => "Hiển thị"],
                "number_photo" => 3,
                "images_photo" => true,
                "avatar_photo" => true,
                "name_photo" => true,
                "photo_width" => 950,
                "photo_height" => 630,
                "photo_thumb" => '100x100x1'
            ],
        ],
        'view' => true,
        'comment' => true,
        'properties' => false,
        'code' => false,
        'regular_price' => true,
        'sale_price' => true,
        'discount' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'desc_cke' => true,
        'content' => true,
        'content_cke' => true,
        'schema' => true,
        'seo' => true,
        'group' => false,
        'categories' => [
            'list' => [
                'title_main_categories' => "Danh mục cấp 1",
                'images' => [
                    'photo' => [
                        'title' => 'Ảnh đại diện',
                        'width' => '500',
                        'height' => '500',
                        'thumb' => '500x500x1'
                    ],
                ],
                'copy_categories' => true,
                'show_images_categories' => true,
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
        ],
    ],
    'do-uong' => [
        'title_main' => "Đồ uống",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'douong'
        ],
        'copy' => true,
        'tags' => false,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '360',
                'height' => '360',
                'thumb' => '360x360x1'
            ],
        ],
        'show_images' => true,
        'gallery' => [
            'do-uong' => [
                "title_main_photo" => "Hình ảnh đồ uống",
                "title_sub_photo" => "Hình ảnh",
                "status_photo" => ["hienthi" => "Hiển thị"],
                "number_photo" => 3,
                "images_photo" => true,
                "avatar_photo" => true,
                "name_photo" => true,
                "photo_width" => 950,
                "photo_height" => 630,
                "photo_thumb" => '100x100x1'
            ],
        ],
        'view' => true,
        'code' => true,
        'regular_price' => true,
        'sale_price' => true,
        'discount' => true,
        'name' => true,
        'desc' => true,
        'desc_cke' => true,
        'content' => true,
        'content_cke' => true,
        'schema' => true,
        'seo' => true,
    ],
    'thu-vien-anh' => [
        'title_main' => "Thư viện Ảnh",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'thuvienanh'
        ],
        'copy' => true,
        'slug' => true,
        'view' => true,
        'name' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '810',
                'height' => '480',
                'thumb' => '200x200x1'
            ],
        ],
        'show_images' => true,
        'gallery' => [
            'thu-vien' => [
                "title_main_photo" => "Hình ảnh Thư viện Ảnh",
                "title_sub_photo" => "Hình ảnh",
                "status_photo" => ["hienthi" => "Hiển thị"],
                "number_photo" => 3,
                "images_photo" => true,
                "avatar_photo" => true,
                "name_photo" => true,
                "photo_width" => 810,
                "photo_height" => 480,
                "photo_thumb" => '100x100x1'
            ],
        ],
        'view' => true,
        'datePublish' => false,
    ],
];
