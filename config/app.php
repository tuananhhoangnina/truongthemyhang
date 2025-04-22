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
    'timezone' => env('APP_TIMEZONE'),
    'site_path' => env('SITE_PATH'),
    'asset' => env('APP_URL'),
    'admin' => env('APP_URL') . "admin/",
    "token" => md5(env('MSHD','')),
    "author" => env('AUTHOR'),
    "environment" => env('ENVIRONMENT', 'dev'),
    "mobile" => env('MOBILE', 'false'),
    'random_key' => 'f0b952448bb44939db36aa9859f77030',
    'secretkey' => '!@*S3cr3tP3pp3r',
    'recaptcha' => [
        'active' => env('GG_RECAPTCHA', false),
        'urlapi' => env('GG_URLAPI'),
        'sitekey' => env('GG_SITEKEY'),
        'secretkey' => env('GG_SECRETKEY')
    ],
    'oneSignal' => array(
        'active' => env('ONE_ACTIVE', true),
        'id' => env('ONE_ID'),
        'restId' => env('ONE_RESTID')
    ),
    'langs' => [
        "vi" => 'Tiếng Việt'
    ],
    'slugs' => [
        "vi" => 'Tiếng Việt'
    ],
    'lang_default' => env('LANG_DEFAULT', 'vi'),
    'seo_default' => env('LANG_SEO_DEFAULT', 'vi'),
    'langconfig' => env('LANG_CONFIG', 'session'),
    'cache_file' => env('CACHE_HTML', false),
    'cache_pages_time' => env('CACHE_HTML_TIME', 10),
    'cache_css' => env('CACHE_CSS', false),
    'cache_js' => env('CACHE_JS', false),
    'nocache' => [],
    'web_prefix' => substr(env('SITE_PATH'), 0, -1) . ((env('LANG_CONFIG') == 'link') ? '/{language}' : ''),
    'admin_prefix' => (env('SITE_PATH') . 'admin'),
    'aliases' => [
        "Email" => \NINACORE\Core\Support\Facades\Email::class,
        "Comment" => \NINACORE\Core\Support\Facades\Comment::class,
        "Cart" => \NINACORE\Facade\Cart::class,
        "Nina" => \NINACORE\Facade\Nina::class,
        "Event" => \NINACORE\Facade\Event::class,
        "Clockwork" => \NINACORE\Helpers\Clockwork\Facade::class,
        "EventHandler" => \NINACORE\Facade\EventHandler::class
    ],
    'providers' => [
        \NINACORE\Providers\EmailServiceProvider::class,
        \NINACORE\Providers\CommentServiceProvider::class,
        \NINACORE\Providers\NinaServiceProvider::class,
        \NINACORE\Cart\CartServiceProvider::class
    ]
];
