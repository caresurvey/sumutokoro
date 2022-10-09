# すむところ.com Webサイト
* ver.3.0
* Modified 2022.9.20 
* Created 2022.9.20  

施設探しすむところ.comの本体WEBサイトです。

## 使用ツール・ライブラリ
* PHP8.0以上
* Laravel9.x系（Webフレームワーク）
* MySQL or MariaDB（開発環境はMariaDB）
* docker-compose（開発環境・CI環境作成ツール）
* GitHub（バージョン管理サイト）
* Git（バージョン管理ツール）
* PHPUnit9.x以上（PHPの単体テスト）
* composer（PHPパッケージ管理ツール）
* GitHubActions (自動テストと自動デプロイ）
* TailwindCSS（cssフレームワーク）
* daisyUI（TailwindCSS用のライブラリ）
* vue3（javascriptフレームワーク。主にAjax通信の処理に）
* jQuery3.x系（javascriptライブラリ。主に表示関係の処理に）
* vite（フロントエンドビルドツール）
* Deployer 7.x系（デプロイツール）
* Selenium、LaravelDusk（browserテストツール一式）

## 推奨開発環境
* M1以上のmac
* PHPStorm
* docker（必須）
* コマンドラインツール（必須）

## インストール方法
* GithubからClone
* docker-compose up -d を実行
* docker-compose exec php bash から composer install（composerは時間かかります）


## 開発の仕方
* 基本的にGitHub-flowに沿って開発します
* masterは常に最新・本番環境が反映されるものとします
* 開発はLaravel9系の最新版を使います
* PHPUnitでユニットテスト・結合テストを書きます
* LaravelDuskでブラウザテストを書きます
* データはGitHubで管理します
* master、develop、releaseの3ブランチで運用
* GitHubActionsで自動テストを回します。
* GitHubActionsでビルドが通ったら、「develop」か「release」だった場合は各デプロイ先に自動でデプロイします。
* docker-composeを使って開発をしますので、開発マシンに入れておいてください。
* docker-compose.ymlはAppleのM1マシンを想定していますが、Intelベースの場合は、「system/loacl/docker/ci/x86」に入っているdocker-compose.ymlを使用してください。ちなみに、GitHubActionsでも同じこのファイルを使います。
* PHPStormをインストールしてください

```  
あ
```

## 開発の流れ
1. Pullする
2. 開発単位ごとにブランチを切る
2. コーディングする
3. 単体・結合テストを通す
4. ブラウザテストを通す
5. プルリクエストを出す
6. コードレビューをする
7. masterブランチにマージする
8. releaseブランチにマージ（自動デプロイされる）
 
## テスト方法
開発時のテストは基本的にPHPStormで行います。それ以外はリポジトリにPushした時点でGitHubActionsが自動的に行います。PHPStormでのテストの場合、テスト実行コンテナはこのリポジトリに含まれているdocker-composeを使ってください。

## データベース
### 基本構造
データベースの構造は「/database/migrations」、データは「/database/seeders」にて管理しています。DB構造はデプロイの度に自動でmigrateが走ります（データは保持されます）。固定データテーブルはseederに入っている物を本番でも使いますが、変動データが入るテーブルseederはダミーが入っています。

<details>
<summary>固定データ・変動データについて</summary>
### 固定データ
都道府県(prefectures)や価格幅(price_ranges)など、基本的に変動しないデータのことです。

### 変動データ
事業所(spots)や法人(companies)など、常に更新される想定のデータのことです。
</details>

### 開発環境でのDBの操作
初期化する場合はphpのdocker経由でmigrateコマンドを実行します。

```
$ docker-compose exec php php artisan migrate:refresh --seed
```
すでにあるDBを操作する場合は、ブラウザからphpMyAdminにて操作してください。
通常DBは「http://localhost:11066」、テスト用DBは「http://localhost:11067」です。


### 実データを開発環境で試したい場合 
実データを開発環境などでテストしたい場合は、変動データを空にしているseedersを使ってください。「system/seeders_for_publictest」にデータが入っていますので、「database/seeders」と置き換えてmigrateし直してください。

## デプロイ方法
ブランチによって自動でデプロイされます。developブランチならステージング環境へ、releaseブランチなら本番環境へそれぞれGitHubActionsによって自動でデプロイされます。デプロイツールはPHP製の「Deployer 7系」が使われます。

## デプロイ前のチェック
* composer dump-autoloadチェック
* assetsのビルド


## バックアップ体制
GitHubActionsのスケジュールにて基本・全自動で行われます。実際にはLaravelのConsoleを叩くことで実行されます。フックはGitHubActionsの「schedule」にて行います。バックアップ対象はDBと画像です。それ以外のファイルはGitHubにあるので保存しません。処理は「.github/workflows/backup.yml」と「system/loacl/docker/backup/x86/docker-compose.yml」「deploy.php」に記載してあります。バックアップファイルの保存先は「xxx」です。


## 開発時のチェック
composer dump-autoloadをして、不要ファイルがないか、PSRから逸脱しているファイルが無いかをチェックします。

## 本番環境・ステージング環境でのチェック
composerのバージョン
PHPのバージョン
データベースのバージョン
容量チェック

## 注意事項
### .envファイルについて
.envファイルはGitリポジトリに含めないでください。ただし、「system/ci/」内にあるものについてはローカル環境でのみ有効なCI用の.envファイルですので、Gitリポジトリに含めて構いません。また、その際はDBサーバー、メールサーバーなど実際に稼働しているサーバーに関する情報は絶対に入れないでください。docker-compose内でのみ動く開発環境用のデータを記載してください。
・本番環境・ステージング環境で使用する.envファイルは、機密情報の為、別枠で保存しています。これらは絶対に開発環境で使ってはいけません。

### コード以外をリポジトリに含めないでください
基本的にはコード以外はリポジトリに追加しません。使う場合はサイト内で使う軽い画像などに限ります。また、可能な限りSVGの使用を検討してください。


## プロジェクトの初期設定
プロジェクト製作時に行う初期設定ですが、すでに行っているので基本的には必要ない工程となります。
### GitHubのシークレット変数
GitHubのSecrets -> Actionsにデプロイに使うシークレット変数を登録します。登録するものは以下です。

* SSH_HOST_PRODUCTION（ホスト名を入れます）
* SSH_HOST_STAGING（ホスト名を入れます）
* SSH_KEY_PRODUCTION（秘密鍵を入れます）
* SSH_KEY_STAGING（秘密鍵を入れます）
* SSH_USER_PRODUCTION（ユーザー名を入れます）
* SSH_USER_STAGING（ユーザー名を入れます）

### デプロイ先サーバーでのPull用の公開鍵
デプロイ先のサーバーからリポジトリをPullするための公開鍵を登録します。本番サーバーとステージングサーバーの2つです。鍵ファイルは別で保存してあります。

## 本番用サーバーの設定
### さくらレンタルのphp.ini設定
コントロールパネルのPHPiniファイル設定を以下のように変更します。

```
display_errors=off;
output_buffering = On
date.timezone = "Asia/Tokyo"
post_max_size = "15M"
upload_max_filesize = "11M"
opcache.memory_consumption=256

```

## トラブルシューティング
### サーバー接続に関するトラブル
* GitHubとSSHが繋がらなくなった場合は、対象のサーバーにSSHで入って「ssh -vT git@github」にて確認。

### 本番サーバーが全部消えた場合

### ステージングサーバーが全部消えた場合


### 本番環境のファイル構成



## GoogleApiKey
以下のツールをサイトにて利用。caresurveyjapan@gmail.comにて管理しています。

* Analytics
* CAPTCHA


## Author
[CareSurveyJapan](https://caresurvey.co.jp/)
