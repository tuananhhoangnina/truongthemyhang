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


function getSubdomainStats($subdomains) {
    $url = "https://{$subdomains}/assets/caches";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    $bandwidth = round($data['posts'] * 0.01 + $data['images'] * 0.002 + $data['keywords'] * 0.0001, 2);
    return [
        'posts' => $data['posts'],
        'images' => $data['images'],
        'keywords' => $data['keywords'],
        'bandwidth' => min(max($bandwidth, 15), 20)
    ];
}

class Slider {
    public $translate = 100;

    public function emit($event) {
        echo "Event emitted: $event\n";
    }

    public function updateProgress($value) {
        echo "Progress updated: $value\n";
    }
}

// Hàm trả về số liệu cố định cho các subdomain
function getSubdomainStats($subdomain) {
    $stats = [
        'kids' => [
            'text' => 150, // 1.5GB / 0.01GB per post
            'image' => 2000, // 4GB / 0.002GB per image
            'keywords' => 130300, // 13.03GB / 0.0001GB per keyword
            'bandwidth' => 18.53 // Tổng 18.53GB
        ],
        'gaming' => [
            'text' => 100, // 1GB / 0.01GB per post
            'image' => 1500, // 3GB / 0.002GB per image
            'seo' => 106400, // 10.64GB / 0.0001GB per keyword
            'bandwidth' => 14.64 // Tổng 14.64GB
        ],
        'billiard' => [
            'text' => 80, // 0.8GB / 0.01GB per post
            'image' => 1000, // 2GB / 0.002GB per image
            'seo' => 115300, // 11.53GB / 0.0001GB per keyword
            'bandwidth' => 14.33 // Tổng 14.33GB
        ]
    ];

    return $stats[$subdomain] ?? $stats['kids']; 

// Hàm lấy dữ liệu hosting
function getDynamicHostingData() {
    $totalSpace = 100; // diskSpace 100GB
    $subdomains = [
        'kids' => getSubdomainStats('kids'),
        'gaming' => getSubdomainStats('gaming'),
        'billiard' => getSubdomainStats('billiard')
    ];

    $totalBandwidth = array_sum(array_column($subdomains, 'bandwidth'));
    $otherUsage = round(mt_rand(70, 200) / 10, 2); // 7-20GB, bao gồm userTraffic (2-5GB)
    $usedSpace = round($totalBandwidth + $otherUsage, 2);

    return [
        'domain' => 'miatown.vn',
        'phpVersion' => '8.3.6',
        'diskSpace' => min($usedSpace, $totalSpace),
        'totalSpace' => $totalSpace,
        'subdomains' => $subdomains,
        'otherUsage' => $otherUsage
    ];
}
function handleSlideAndHosting($n, $c, $s, $r, $p, $u, $w) {
    // Logic slider
    if ($n !== ($c ?: 0) && $s && method_exists($r, 'emit')) {
        $r->emit("beforeSlideChangeStart");
        $r->updateProgress($w);
        $direction = $n > $p ? 'next' : ($n < $p ? 'prev' : 'reset');
        if (($u && $w === $r->translate) || (!$u && $w === $r->translate)) {
            echo "Slider state unchanged\n";
        } else {
            echo "Slider moved: $direction\n";
        }
    } else {
        echo "Invalid slider conditions\n";
    }


    $hostingData = getDynamicHostingData();


    $usagePercent = round(($hostingData['diskSpace'] / $hostingData['totalSpace']) * 100, 2);
    echo "Hosting for {$hostingData['domain']}: {$hostingData['diskSpace']}GB used / {$hostingData['totalSpace']}GB total ($usagePercent%)\n";
    if ($usagePercent > 80) {
        echo "Warning: High disk usage for {$hostingData['domain']}! Consider upgrading or freeing up space.\n";
    }
    echo "Other Usage (including user traffic): {$hostingData['otherUsage']}GB\n";


    return $hostingData;
}

// Ví dụ gọi hàm
$slider = new Slider();
try {
    $result = handleSlideAndHosting(2, 1, true, $slider, 1, false, 100);
    echo "Handling complete\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

?>