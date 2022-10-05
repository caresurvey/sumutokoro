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
ブランチによって自動でデプロイされます。developブランチならステージング環境へ、releaseブランチなら本番環境へそれぞれGitHubActionsによって自動でデプロイされます。ツールはPHP製の「Deployer7系」を使います。

## バックアップ体制
GitHubActionsのスケジュールにてLaravelのConsoleを叩くことで実行されます。フックはサーバーのcronにて行います。
バックアップ対象はDBと画像です。

## 環境について

## 注意事項
### .envファイルについて
.envファイルはGitリポジトリに含めないでください。ただし、「system/ci/」内にあるものについてはローカル環境でのみ有効なCI用の.envファイルですので、Gitリポジトリに含めて構いません。また、その際はDBさーばー、メールサーバーなど実際に稼働しているサーバーに関する情報は絶対に入れないでください。docker-compose内でのみ動く開発環境用のデータを記載してください。

### コード以外をリポジトリに含めないでください
基本的にはコード以外はリポジトリに追加しません。使う場合はサイト内で使う軽い画像などに限ります。また、可能な限りSVGの使用を検討してください。


## （仮）本番データをローカルデータに反映する
冊子の出力などで本番データをローカルデータに反映させる必要がある場合があります。
その際は、ここの手順を実行してください。スクリプトにより自動で反映作業が行われます。  
※現在のローカルDBデータは削除されます（本番には影響しません）

```
$ docker-compose up -d
$ cd system/sync
$ ./sync.sh
$ cd ../../
```

## GoogleApiKey
caresurveyjapan@gmail.comにて管理  

* Analytics
* CAPTCHA


## Author
[CareSurveyJapan](https://caresurvey.co.jp/)
