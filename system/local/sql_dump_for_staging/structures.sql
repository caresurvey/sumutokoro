

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- データベース: `primary`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `label` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '表示名',
  `book_label` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '冊子での表示名',
  `serial` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル名',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `book_reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '冊子での並び順',
  `area_label_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'エリアラベルID',
  `area_section_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'エリアセクションID',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '市町村ID',
  `prefecture_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '都道府県ID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `area_branches`
--

CREATE TABLE `area_branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `public` tinyint(1) NOT NULL DEFAULT 0 COMMENT '一般画面で公開',
  `serial` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル',
  `code` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '都道府県コード',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `area_centers`
--

CREATE TABLE `area_centers` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `label` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '表示名',
  `book_label` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '冊子での表示名',
  `zip1` varchar(3) COLLATE utf8mb4_bin NOT NULL COMMENT '郵便番号1',
  `zip2` varchar(4) COLLATE utf8mb4_bin NOT NULL COMMENT '郵便番号2',
  `address` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '住所',
  `tel1` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号1',
  `tel2` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号2',
  `tel3` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号3',
  `fax` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'FAX番号',
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'メールアドレス',
  `lat` decimal(17,14) NOT NULL COMMENT 'LAT',
  `lng` decimal(17,14) NOT NULL COMMENT 'LNG',
  `search_words` text COLLATE utf8mb4_bin NOT NULL COMMENT '検索用テキスト（保存時に自動作成）',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `book_reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '冊子での並び順',
  `area_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'エリアID',
  `area_section_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'エリアセクションID',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '市町村ID',
  `prefecture_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '都道府県ID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `area_labels`
--

CREATE TABLE `area_labels` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `label` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '表示名',
  `book_label` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '冊子での表示名',
  `serial` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル名',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `book_reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '冊子での並び順',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `area_sections`
--

CREATE TABLE `area_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'セクション名',
  `book_label` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '冊子用セクション名',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `book_reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '冊子での並び順',
  `book_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '親ID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `authenticates`
--

CREATE TABLE `authenticates` (
  `id` int(10) UNSIGNED NOT NULL,
  `auth_date` date NOT NULL COMMENT '認証日',
  `is_enabled` tinyint(1) NOT NULL DEFAULT 0 COMMENT '有効',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `serial` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル',
  `sellout` date NOT NULL COMMENT '発売日',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `book_spot`
--

CREATE TABLE `book_spot` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `spot_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `public` tinyint(1) NOT NULL DEFAULT 0 COMMENT '一般画面で公開',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `book_label` varchar(50) COLLATE utf8mb4_bin NOT NULL COMMENT '冊子の表示用に使う',
  `serial` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `book_reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '冊子での並び順',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `public` tinyint(1) NOT NULL DEFAULT 0 COMMENT '一般画面で公開',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `label` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '表示名',
  `code` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '市町村コード',
  `serial` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `book_reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '冊子での並び順',
  `area_branch_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '振興局ID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `preview` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'プレビュー',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名称',
  `longname` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '正式名称',
  `kana` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名称ふりがな',
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'メールアドレス',
  `zip1` varchar(3) COLLATE utf8mb4_bin NOT NULL COMMENT '郵便番号1',
  `zip2` varchar(4) COLLATE utf8mb4_bin NOT NULL COMMENT '郵便番号2',
  `address` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '住所',
  `tel1` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号1',
  `tel2` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号2',
  `tel3` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号3',
  `fax` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'FAX番号',
  `lat` decimal(17,14) NOT NULL COMMENT 'LAT',
  `lng` decimal(17,14) NOT NULL COMMENT 'LNG',
  `search_words` text COLLATE utf8mb4_bin NOT NULL COMMENT '検索用テキスト（保存時に自動作成）',
  `msg` text COLLATE utf8mb4_bin NOT NULL COMMENT 'メモ',
  `start` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '開始',
  `president` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '代表者',
  `history` text COLLATE utf8mb4_bin NOT NULL COMMENT 'やりとり履歴',
  `capital` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '親会社',
  `staff` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'スタッフ情報',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '市町村ID',
  `prefecture_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '都道府県ID',
  `trade_area_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '商圏ID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `company_user`
--

CREATE TABLE `company_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `kana` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'ふりがな',
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'メールアドレス',
  `tel` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号',
  `reply` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'ご返答方法',
  `msg` text COLLATE utf8mb4_bin NOT NULL COMMENT 'お問い合わせ内容',
  `ip` varchar(20) COLLATE utf8mb4_bin NOT NULL COMMENT 'IPアドレス',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `conversations`
--

CREATE TABLE `conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `msg` text COLLATE utf8mb4_bin NOT NULL COMMENT 'メッセージ',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `document_orders`
--

CREATE TABLE `document_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `kana` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'ふりがな',
  `zip` varchar(20) COLLATE utf8mb4_bin NOT NULL COMMENT '郵便番号',
  `address` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '住所',
  `tel` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号',
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'メールアドレス',
  `msg` text COLLATE utf8mb4_bin NOT NULL COMMENT 'お問い合わせ内容',
  `ip` varchar(20) COLLATE utf8mb4_bin NOT NULL COMMENT 'IPアドレス',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `connection` text COLLATE utf8mb4_bin NOT NULL,
  `queue` text COLLATE utf8mb4_bin NOT NULL,
  `payload` longtext COLLATE utf8mb4_bin NOT NULL,
  `exception` longtext COLLATE utf8mb4_bin NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `payload` longtext COLLATE utf8mb4_bin NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `job_types`
--

CREATE TABLE `job_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `public` tinyint(1) NOT NULL DEFAULT 0 COMMENT '一般公開',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `serial` varchar(50) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル',
  `description` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '概要',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `log` text COLLATE utf8mb4_bin NOT NULL COMMENT 'ログ',
  `prefix` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '操作したページタイプ[例：admin|general|user]',
  `page` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '操作したページ[例：spot|company|user|fax]',
  `action` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '行動種類[例：store|update|display|remove]',
  `column_id` int(10) UNSIGNED DEFAULT NULL COMMENT '操作したモデルのid。',
  `value` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前などの入力値や完了メッセージ',
  `ip` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '操作したユーザーのIP',
  `user_name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '操作したユーザーの名前',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '操作したユーザーのID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `preview` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'プレビュー',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '記事名',
  `body` text COLLATE utf8mb4_bin NOT NULL COMMENT '本文',
  `more` text COLLATE utf8mb4_bin NOT NULL COMMENT '追記',
  `url` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '関連URL',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_bin NOT NULL,
  `abilities` text COLLATE utf8mb4_bin DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `prefectures`
--

CREATE TABLE `prefectures` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `public` tinyint(1) NOT NULL DEFAULT 0 COMMENT '一般画面で公開',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `serial` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル',
  `code` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '都道府県コード',
  `lat` decimal(17,14) NOT NULL COMMENT 'LAT',
  `lng` decimal(17,14) NOT NULL COMMENT 'LNG',
  `zoom` int(10) UNSIGNED NOT NULL DEFAULT 15 COMMENT 'ズーム',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `price_genres`
--

CREATE TABLE `price_genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `serial` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `description` text COLLATE utf8mb4_bin NOT NULL COMMENT 'このジャンルについての概要',
  `ps` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '例や注意事項など',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `price_ranges`
--

CREATE TABLE `price_ranges` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `public` tinyint(1) NOT NULL DEFAULT 0 COMMENT '一般画面で公開',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `min` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最低金額',
  `max` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最高金額',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `reset_passwords`
--

CREATE TABLE `reset_passwords` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `serial` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 999,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_bin DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_bin DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_bin NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spaces`
--

CREATE TABLE `spaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spots`
--

CREATE TABLE `spots` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `preview` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'プレビュー',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名称',
  `longname` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '正式名称',
  `zip1` varchar(3) COLLATE utf8mb4_bin NOT NULL COMMENT '郵便番号1',
  `zip2` varchar(4) COLLATE utf8mb4_bin NOT NULL COMMENT '郵便番号2',
  `address` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '住所',
  `tel1` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号1',
  `tel2` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号2',
  `tel3` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号3',
  `vacancy` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '空室の状態 [1:指定なし|2:空きあり|3:空きなし|4:要問合せ]',
  `document` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '資料の状態 [1:指定なし|2:資料あり|3:資料なし|4:要問合せ]',
  `viewing` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '見学予約の状態 [1:指定なし|2:見学予約可能|3:見学予約不可|4:要問合せ]',
  `is_book` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '掲載する／掲載しない]',
  `is_meeting` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'やり取り中',
  `heading` text COLLATE utf8mb4_bin NOT NULL COMMENT '見出し',
  `message` text COLLATE utf8mb4_bin NOT NULL COMMENT 'メッセージ',
  `monthly_price_min` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '月額最低金額',
  `monthly_price_max` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '月額最高金額',
  `for_check_monthly` tinyint(1) NOT NULL DEFAULT 0 COMMENT '月額金額の間の〜',
  `movein_price_min` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '入居時最低金額',
  `movein_price_max` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '入居時最高金額',
  `for_check_movein` tinyint(1) NOT NULL DEFAULT 0 COMMENT '入居時金額の間の〜',
  `is_selfpay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '介護自己負担を月額費用に含む',
  `room_size` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '部屋サイズ',
  `lat` decimal(17,14) NOT NULL DEFAULT 43.76281006321748 COMMENT 'LAT',
  `lng` decimal(17,14) NOT NULL DEFAULT 142.35817790725756 COMMENT 'LNG',
  `search_words` text COLLATE utf8mb4_bin NOT NULL COMMENT '検索用テキスト（保存時に自動作成）',
  `area_center_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '地域包括支援センターID',
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '種別ID',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '市町村ID',
  `company_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '法人ID',
  `prefecture_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '都道府県ID',
  `price_range_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '金額幅ID',
  `space_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '部屋の広さID',
  `spot_plan_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'プランID',
  `trade_area_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '商圏ID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spot_details`
--

CREATE TABLE `spot_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `kana` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名称ふりがな',
  `subname` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'サブの名前',
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'メールアドレス',
  `feature` text COLLATE utf8mb4_bin NOT NULL COMMENT '特徴',
  `rooms` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '部屋状況',
  `staff` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '先方の担当者',
  `staffs` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'スタッフ人数',
  `staff_age` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'スタッフ平均年齢',
  `nurses` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '看護師人数',
  `nurse_time` text COLLATE utf8mb4_bin NOT NULL COMMENT '看護師滞在時間',
  `build_start` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '建築年',
  `open_start` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '開設年',
  `website` text COLLATE utf8mb4_bin NOT NULL COMMENT 'WEBサイト',
  `introducer` text COLLATE utf8mb4_bin NOT NULL COMMENT '紹介者',
  `phone` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号',
  `reserved_phone` text COLLATE utf8mb4_bin NOT NULL COMMENT '予約用電話番号',
  `fax` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'FAX番号',
  `comment` text COLLATE utf8mb4_bin NOT NULL COMMENT 'コメント',
  `comment2` text COLLATE utf8mb4_bin NOT NULL COMMENT 'コメント2',
  `company_name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '法人名',
  `company_staff` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '法人スタッフ',
  `proarea` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'エリア',
  `spot_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '親ID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spot_icon_genres`
--

CREATE TABLE `spot_icon_genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `serial` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `description` text COLLATE utf8mb4_bin NOT NULL COMMENT 'このジャンルについての概要',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spot_icon_genre_comments`
--

CREATE TABLE `spot_icon_genre_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `comment` text COLLATE utf8mb4_bin NOT NULL COMMENT 'コメント',
  `spot_icon_genre_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '事業所アイコンジャンルID',
  `spot_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '親ID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spot_icon_items`
--

CREATE TABLE `spot_icon_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `serial` varchar(50) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル',
  `description` text COLLATE utf8mb4_bin NOT NULL COMMENT '概要',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `spot_icon_genre_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '事業所アイコンジャンルID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spot_icon_statuses`
--

CREATE TABLE `spot_icon_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `spot_icon_item_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '事業所アイコン項目ID',
  `spot_icon_type_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '事業所アイコンタイプID',
  `spot_icon_genre_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '事業所アイコンジャンルID',
  `spot_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '親ID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spot_icon_types`
--

CREATE TABLE `spot_icon_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `icon` varchar(10) COLLATE utf8mb4_bin NOT NULL COMMENT '-｜×｜△｜○｜◎',
  `serial` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL COMMENT '概要',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spot_images`
--

CREATE TABLE `spot_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'ファイル名',
  `tag` varchar(50) COLLATE utf8mb4_bin NOT NULL COMMENT 'タグ',
  `msg` text COLLATE utf8mb4_bin NOT NULL COMMENT 'キャプション',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `spot_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '親ID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spot_plans`
--

CREATE TABLE `spot_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `description` text COLLATE utf8mb4_bin NOT NULL COMMENT '概要',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spot_prices`
--

CREATE TABLE `spot_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '内容',
  `description` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '説明',
  `ps` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '追記：例や注意事項など',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `price_genre_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '料金種類ID',
  `spot_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '親ID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `spot_user`
--

CREATE TABLE `spot_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `spot_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `trade_areas`
--

CREATE TABLE `trade_areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `serial` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0 COMMENT '有効かどうか',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `kana` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'かな',
  `zip1` varchar(3) COLLATE utf8mb4_bin NOT NULL COMMENT '郵便番号1',
  `zip2` varchar(4) COLLATE utf8mb4_bin NOT NULL COMMENT '郵便番号2',
  `address` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '住所',
  `tel1` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号1',
  `tel2` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号2',
  `tel3` varchar(5) COLLATE utf8mb4_bin NOT NULL COMMENT '電話番号3',
  `fax` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'FAX',
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'メールアドレス',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'パスワード',
  `is_authenticated` tinyint(1) NOT NULL DEFAULT 0 COMMENT '認証済みかどうか',
  `authenticated_msg` text COLLATE utf8mb4_bin NOT NULL COMMENT '認証済みに関してのメモ',
  `authenticated_date` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '認証した日',
  `company` text COLLATE utf8mb4_bin NOT NULL COMMENT '所属している事業所や法人',
  `lat` decimal(17,14) NOT NULL COMMENT 'LAT',
  `lng` decimal(17,14) NOT NULL COMMENT 'LNG',
  `msg` text COLLATE utf8mb4_bin NOT NULL COMMENT '備考',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 99 COMMENT '並び順',
  `prefecture_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '都道府県ID',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '市町村ID',
  `job_type_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '職種ID',
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 4 COMMENT '権限',
  `trade_area_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '商圏ID',
  `user_type_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザータイプID',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'ユーザーID',
  `remember_token` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 0 COMMENT '表示',
  `public` tinyint(1) NOT NULL DEFAULT 0 COMMENT '一般公開',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
  `serial` varchar(50) COLLATE utf8mb4_bin NOT NULL COMMENT 'シリアル',
  `description` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '概要',
  `reorder` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '並び順',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areas_city_id_name_unique` (`city_id`,`name`),
  ADD KEY `areas_area_label_id_foreign` (`area_label_id`),
  ADD KEY `areas_area_section_id_foreign` (`area_section_id`),
  ADD KEY `areas_prefecture_id_foreign` (`prefecture_id`),
  ADD KEY `areas_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `area_branches`
--
ALTER TABLE `area_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_branches_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `area_centers`
--
ALTER TABLE `area_centers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `area_centers_city_id_name_unique` (`city_id`,`name`),
  ADD KEY `area_centers_area_id_foreign` (`area_id`),
  ADD KEY `area_centers_area_section_id_foreign` (`area_section_id`),
  ADD KEY `area_centers_prefecture_id_foreign` (`prefecture_id`),
  ADD KEY `area_centers_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `area_labels`
--
ALTER TABLE `area_labels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `area_labels_serial_unique` (`serial`),
  ADD KEY `area_labels_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `area_sections`
--
ALTER TABLE `area_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_sections_book_id_foreign` (`book_id`),
  ADD KEY `area_sections_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `authenticates`
--
ALTER TABLE `authenticates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authenticates_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_serial_unique` (`serial`),
  ADD KEY `books_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `book_spot`
--
ALTER TABLE `book_spot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_spot_book_id_spot_id_unique` (`book_id`,`spot_id`),
  ADD KEY `book_spot_spot_id_foreign` (`spot_id`);

--
-- テーブルのインデックス `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_area_branch_id_foreign` (`area_branch_id`),
  ADD KEY `cities_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_city_id_foreign` (`city_id`),
  ADD KEY `companies_prefecture_id_foreign` (`prefecture_id`),
  ADD KEY `companies_trade_area_id_foreign` (`trade_area_id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `company_user`
--
ALTER TABLE `company_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_user_company_id_user_id_unique` (`company_id`,`user_id`),
  ADD KEY `company_user_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversations_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `document_orders`
--
ALTER TABLE `document_orders`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- テーブルのインデックス `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `prefectures`
--
ALTER TABLE `prefectures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prefectures_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `price_genres`
--
ALTER TABLE `price_genres`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `price_ranges`
--
ALTER TABLE `price_ranges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_ranges_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `reset_passwords`
--
ALTER TABLE `reset_passwords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reset_passwords_email_index` (`email`);

--
-- テーブルのインデックス `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- テーブルのインデックス `spaces`
--
ALTER TABLE `spaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spaces_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spots_area_center_id_foreign` (`area_center_id`),
  ADD KEY `spots_category_id_foreign` (`category_id`),
  ADD KEY `spots_city_id_foreign` (`city_id`),
  ADD KEY `spots_company_id_foreign` (`company_id`),
  ADD KEY `spots_prefecture_id_foreign` (`prefecture_id`),
  ADD KEY `spots_price_range_id_foreign` (`price_range_id`),
  ADD KEY `spots_spot_plan_id_foreign` (`spot_plan_id`),
  ADD KEY `spots_space_id_foreign` (`space_id`),
  ADD KEY `spots_trade_area_id_foreign` (`trade_area_id`),
  ADD KEY `spots_user_id_foreign` (`user_id`),
  ADD KEY `spots_vacancy_index` (`vacancy`),
  ADD KEY `spots_is_book_index` (`is_book`),
  ADD KEY `spots_is_meeting_index` (`is_meeting`);

--
-- テーブルのインデックス `spot_details`
--
ALTER TABLE `spot_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spot_details_spot_id_foreign` (`spot_id`);

--
-- テーブルのインデックス `spot_icon_genres`
--
ALTER TABLE `spot_icon_genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spot_icon_genres_serial_unique` (`serial`);

--
-- テーブルのインデックス `spot_icon_genre_comments`
--
ALTER TABLE `spot_icon_genre_comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_spot_icon_genre_comment` (`spot_id`,`spot_icon_genre_id`),
  ADD KEY `spot_icon_genre_comments_spot_icon_genre_id_foreign` (`spot_icon_genre_id`),
  ADD KEY `spot_icon_genre_comments_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `spot_icon_items`
--
ALTER TABLE `spot_icon_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_reorder_spot_icon_genre` (`reorder`,`spot_icon_genre_id`),
  ADD UNIQUE KEY `spot_icon_items_serial_unique` (`serial`),
  ADD KEY `spot_icon_items_spot_icon_genre_id_foreign` (`spot_icon_genre_id`),
  ADD KEY `spot_icon_items_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `spot_icon_statuses`
--
ALTER TABLE `spot_icon_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_spot_icon_status` (`spot_id`,`spot_icon_item_id`,`spot_icon_type_id`),
  ADD KEY `spot_icon_statuses_spot_icon_item_id_foreign` (`spot_icon_item_id`),
  ADD KEY `spot_icon_statuses_spot_icon_type_id_foreign` (`spot_icon_type_id`),
  ADD KEY `spot_icon_statuses_spot_icon_genre_id_foreign` (`spot_icon_genre_id`),
  ADD KEY `spot_icon_statuses_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `spot_icon_types`
--
ALTER TABLE `spot_icon_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spot_icon_types_serial_unique` (`serial`);

--
-- テーブルのインデックス `spot_images`
--
ALTER TABLE `spot_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spot_images_name_unique` (`name`),
  ADD KEY `spot_images_spot_id_foreign` (`spot_id`);

--
-- テーブルのインデックス `spot_plans`
--
ALTER TABLE `spot_plans`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `spot_prices`
--
ALTER TABLE `spot_prices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_price_genre_id_spot_id` (`price_genre_id`,`spot_id`),
  ADD KEY `spot_prices_spot_id_foreign` (`spot_id`),
  ADD KEY `spot_prices_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `spot_user`
--
ALTER TABLE `spot_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spot_user_spot_id_user_id_unique` (`spot_id`,`user_id`),
  ADD KEY `spot_user_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `trade_areas`
--
ALTER TABLE `trade_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trade_areas_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_job_type_id_foreign` (`job_type_id`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`);

--
-- テーブルのインデックス `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `area_branches`
--
ALTER TABLE `area_branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `area_centers`
--
ALTER TABLE `area_centers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `area_labels`
--
ALTER TABLE `area_labels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `area_sections`
--
ALTER TABLE `area_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `authenticates`
--
ALTER TABLE `authenticates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `book_spot`
--
ALTER TABLE `book_spot`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `company_user`
--
ALTER TABLE `company_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `document_orders`
--
ALTER TABLE `document_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `prefectures`
--
ALTER TABLE `prefectures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `price_genres`
--
ALTER TABLE `price_genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `price_ranges`
--
ALTER TABLE `price_ranges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `reset_passwords`
--
ALTER TABLE `reset_passwords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spaces`
--
ALTER TABLE `spaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spots`
--
ALTER TABLE `spots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spot_details`
--
ALTER TABLE `spot_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spot_icon_genres`
--
ALTER TABLE `spot_icon_genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spot_icon_genre_comments`
--
ALTER TABLE `spot_icon_genre_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spot_icon_items`
--
ALTER TABLE `spot_icon_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spot_icon_statuses`
--
ALTER TABLE `spot_icon_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spot_icon_types`
--
ALTER TABLE `spot_icon_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spot_images`
--
ALTER TABLE `spot_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spot_plans`
--
ALTER TABLE `spot_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spot_prices`
--
ALTER TABLE `spot_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `spot_user`
--
ALTER TABLE `spot_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `trade_areas`
--
ALTER TABLE `trade_areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_area_label_id_foreign` FOREIGN KEY (`area_label_id`) REFERENCES `area_labels` (`id`),
  ADD CONSTRAINT `areas_area_section_id_foreign` FOREIGN KEY (`area_section_id`) REFERENCES `area_sections` (`id`),
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `areas_prefecture_id_foreign` FOREIGN KEY (`prefecture_id`) REFERENCES `prefectures` (`id`),
  ADD CONSTRAINT `areas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `area_branches`
--
ALTER TABLE `area_branches`
  ADD CONSTRAINT `area_branches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `area_centers`
--
ALTER TABLE `area_centers`
  ADD CONSTRAINT `area_centers_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `area_centers_area_section_id_foreign` FOREIGN KEY (`area_section_id`) REFERENCES `area_sections` (`id`),
  ADD CONSTRAINT `area_centers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `area_centers_prefecture_id_foreign` FOREIGN KEY (`prefecture_id`) REFERENCES `prefectures` (`id`),
  ADD CONSTRAINT `area_centers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `area_labels`
--
ALTER TABLE `area_labels`
  ADD CONSTRAINT `area_labels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `area_sections`
--
ALTER TABLE `area_sections`
  ADD CONSTRAINT `area_sections_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `area_sections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `authenticates`
--
ALTER TABLE `authenticates`
  ADD CONSTRAINT `authenticates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `book_spot`
--
ALTER TABLE `book_spot`
  ADD CONSTRAINT `book_spot_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_spot_spot_id_foreign` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`) ON DELETE CASCADE;

--
-- テーブルの制約 `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_area_branch_id_foreign` FOREIGN KEY (`area_branch_id`) REFERENCES `area_branches` (`id`),
  ADD CONSTRAINT `cities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `companies_prefecture_id_foreign` FOREIGN KEY (`prefecture_id`) REFERENCES `prefectures` (`id`),
  ADD CONSTRAINT `companies_trade_area_id_foreign` FOREIGN KEY (`trade_area_id`) REFERENCES `trade_areas` (`id`),
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `company_user`
--
ALTER TABLE `company_user`
  ADD CONSTRAINT `company_user_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- テーブルの制約 `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `prefectures`
--
ALTER TABLE `prefectures`
  ADD CONSTRAINT `prefectures_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `price_ranges`
--
ALTER TABLE `price_ranges`
  ADD CONSTRAINT `price_ranges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `spaces`
--
ALTER TABLE `spaces`
  ADD CONSTRAINT `spaces_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `spots`
--
ALTER TABLE `spots`
  ADD CONSTRAINT `spots_area_center_id_foreign` FOREIGN KEY (`area_center_id`) REFERENCES `area_centers` (`id`),
  ADD CONSTRAINT `spots_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `spots_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `spots_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `spots_prefecture_id_foreign` FOREIGN KEY (`prefecture_id`) REFERENCES `prefectures` (`id`),
  ADD CONSTRAINT `spots_price_range_id_foreign` FOREIGN KEY (`price_range_id`) REFERENCES `price_ranges` (`id`),
  ADD CONSTRAINT `spots_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`),
  ADD CONSTRAINT `spots_spot_plan_id_foreign` FOREIGN KEY (`spot_plan_id`) REFERENCES `spot_plans` (`id`),
  ADD CONSTRAINT `spots_trade_area_id_foreign` FOREIGN KEY (`trade_area_id`) REFERENCES `trade_areas` (`id`),
  ADD CONSTRAINT `spots_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `spot_details`
--
ALTER TABLE `spot_details`
  ADD CONSTRAINT `spot_details_spot_id_foreign` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`) ON DELETE CASCADE;

--
-- テーブルの制約 `spot_icon_genre_comments`
--
ALTER TABLE `spot_icon_genre_comments`
  ADD CONSTRAINT `spot_icon_genre_comments_spot_icon_genre_id_foreign` FOREIGN KEY (`spot_icon_genre_id`) REFERENCES `spot_icon_genres` (`id`),
  ADD CONSTRAINT `spot_icon_genre_comments_spot_id_foreign` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `spot_icon_genre_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `spot_icon_items`
--
ALTER TABLE `spot_icon_items`
  ADD CONSTRAINT `spot_icon_items_spot_icon_genre_id_foreign` FOREIGN KEY (`spot_icon_genre_id`) REFERENCES `spot_icon_genres` (`id`),
  ADD CONSTRAINT `spot_icon_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `spot_icon_statuses`
--
ALTER TABLE `spot_icon_statuses`
  ADD CONSTRAINT `spot_icon_statuses_spot_icon_genre_id_foreign` FOREIGN KEY (`spot_icon_genre_id`) REFERENCES `spot_icon_genres` (`id`),
  ADD CONSTRAINT `spot_icon_statuses_spot_icon_item_id_foreign` FOREIGN KEY (`spot_icon_item_id`) REFERENCES `spot_icon_items` (`id`),
  ADD CONSTRAINT `spot_icon_statuses_spot_icon_type_id_foreign` FOREIGN KEY (`spot_icon_type_id`) REFERENCES `spot_icon_types` (`id`),
  ADD CONSTRAINT `spot_icon_statuses_spot_id_foreign` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `spot_icon_statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `spot_images`
--
ALTER TABLE `spot_images`
  ADD CONSTRAINT `spot_images_spot_id_foreign` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`) ON DELETE CASCADE;

--
-- テーブルの制約 `spot_prices`
--
ALTER TABLE `spot_prices`
  ADD CONSTRAINT `spot_prices_price_genre_id_foreign` FOREIGN KEY (`price_genre_id`) REFERENCES `price_genres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `spot_prices_spot_id_foreign` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `spot_prices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `spot_user`
--
ALTER TABLE `spot_user`
  ADD CONSTRAINT `spot_user_spot_id_foreign` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `spot_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- テーブルの制約 `trade_areas`
--
ALTER TABLE `trade_areas`
  ADD CONSTRAINT `trade_areas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);
COMMIT;
