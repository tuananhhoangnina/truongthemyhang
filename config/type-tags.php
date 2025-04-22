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
        'title_main' => 'Tags Sản Phẩm',
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'tagsanpham'
        ],
        'slug' => true,
        'name' => true,
        'images' => true,
        'show_images' => true,
        'status' => [
            "noibat" => 'Nổi bật',
            "hienthi" => 'Hiển thị'
        ],
        'seo' => true,
        'width' => 300,
        'height' => 200,
        'thumb' => '100x100x1',
    ]
];