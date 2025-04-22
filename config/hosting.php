<?php
header('Content-Type: text/plain');

// Hàm tính toán dung lượng của một thư mục (bao gồm tất cả các tệp con)
function getDirectorySize($path) {
    $bytes = 0;
    if (is_dir($path)) {
        try {
            $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
            foreach ($objects as $object) {
                if ($object->isFile()) {
                    $bytes += $object->getSize();
                }
            }
        } catch (Exception $e) {
            echo "Lỗi khi truy cập thư mục $path: " . $e->getMessage() . "\n";
        }
    } else if (file_exists($path)) {
        $bytes = filesize($path);
    }
    return $bytes;
}

// Định nghĩa các subdoman và đường dẫn tương ứng
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$subdomains = [
    'billiard' => $doc_root . 'miatown.vn/billiard',
    'gmaing' => $doc_root . 'miatown.vn/gmaing',
    'kids' => $doc_root . 'miatown.vn/kids',
];

// Hiển thị báo cáo
echo "=== Báo Cáo Dung Lượng Đĩa Của Các Subdomain ===\n\n";

foreach ($subdomains as $domain => $path) {
    if (is_dir($path)) {
        $size = getDirectorySize($path);
        $size_gb = $size / (1024 * 1024 * 1024); // Chuyển đổi byte sang GB
        echo "Subdomain: $domain\n";
        echo "Đường dẫn thư mục: $path\n";
        echo "Dung lượng sử dụng: " . number_format($size_gb, 2) . " GB\n\n";
    } else {
        echo "Subdomain: $domain\n";
        echo "Đường dẫn thư mục: $path không tồn tại hoặc không phải là thư mục.\n\n";
    }
}

// Tính tổng dung lượng của tất cả subdomain
$total_size = 0;
foreach ($subdomains as $path) {
    if (is_dir($path)) {
        $total_size += getDirectorySize($path);
    }
}
$total_size_gb = $total_size / (1024 * 1024 * 1024);
echo "Tổng dung lượng của tất cả subdomain: " . number_format($total_size_gb, 2) . " GB\n";

// 'miatown.vn/billiard', 33,4GB
// 'miatown.vn/gmaing', 46,1 GB
// 'miatown.vn/kids', 22,4 GB

if ( n !== ( c || 0 ) && s && r.emit("beforeSlideChangeStart") )
?>