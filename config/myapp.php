<?php

return [

    /**
     * ドメイン
     */
  'app_domain' => env('APP_ADMIN_PREFIX', 'localhost:11061'),

    /**
     * URL
     */
  'app_url' => env('APP_URL', 'http://localhost:11061'),

    /**
     * ADMINのPrefix
     */
  'app_admin_prefix' => env('APP_ADMIN_PREFIX', 'admin'),

    /**
     * メール送信元アドレス
     */
  'mail_from_address' => env('MAIL_FROM_ADDRESS', 'hoge@hoge.co.jp'),

    /**
     * テストアドレス
     */
  'mail_test_address' => env('MAIL_TEST_ADDRESS', 'hoge@hoge.co.jp'),

    /**
     * Google_TAG_Manager_ID
     */
  'g_tagmanage_id' => env('G_TAGMANAGE_ID', ''),

    /**
     * GoogleAnalytics_VIEW_ID
     */
  'ga_view_id' => env('GA_VIEW_ID', ''),

    /**
     * NOCAPTCHA_SITEKEY
     */
  'nocaptcha_sitekey' => env('NOCAPTCHA_SITEKEY', ''),

    /**
     * 'NOCAPTCHA_SECRET
     */
  'nocaptcha_secret' => env('NOCAPTCHA_SECRET', ''),

    /**
     * 環境
     */
  'app_environment' => env('APP_ENVIRONMENT', ''),

    /**
     * サイト名
     */
  'site_name' => env('SITE_NAME', 'SiteName'),

    /**
     * サイト名
     */
  'copyright' => env('COPYRIGHT', 'SiteName'),

    /**
     * ドメイン
     */
  'domain' => env('DOMAIN', 'localhost:11061'),


  // -----------------------
  // 各種デフォルト値
  // -----------------------
  'default_lat' => env('DEFAULT_LAT', '43.76281006321748'),
  'default_lng' => env('DEFAULT_LNG', '142.35817790725756'),



  // -----------------------
  // 送り先メールアドレス
  // -----------------------
    /**
     * 管理者用メールアドレス
     */
  'mail_admin' => env('MAIL_ADMIN', 'hoge@hoge.co.jp'),

    /**
     * 差出人メールアドレス
     */
  'mail_from' => env('MAIL_FROM', 'hoge@hoge.co.jp'),

    /**
     * テスト用メールアドレス
     */
  'mail_test' => env('MAIL_TEST', 'hoge@hoge.co.jp'),



  // -----------------------
  // アップロードパス設定
  // -----------------------
    /**
     * 画像アップロード用パス
     */
  'upload_photo_path' => env('UPLOAD_PHOTO_PATH', '/var/www/html/public/photo'),

    /**
     * 画像アップロード用URL
     */
  'upload_photo_url' => env('UPLOAD_PHOTO_URL', 'http://localhost:11061/photo'),

    /**
     * アップロード画像の最高横幅
     */
  'upload_photo_max_width' => env('UPLOAD_PHOTO_MAX_WIDTH', 2000),

    /**
     * 公開サイト名
     */
  'general_site_name' => env('GENERAL_SITE_NAME', 'サイト名'),

    /**
     * エスケープをしないタグ郡
     */
  'apply_tags' => [
    'h1', 'h2', 'h3', 'h4', 'h5',
    'b', 'a', 'img', 'u', 'br', 'figure', 'p',
    'table', 'tr', 'th', 'td', 'tbody', 'thead', 'strong',
  ]
];
