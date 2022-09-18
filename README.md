# すむところ.com Webサイト
* ver.3.0
* Modified 2022.9.20 
* Created 2022.9.20  

施設探しすむところ.comの本体WEBサイトです。

## ツールやライブラリ
* PHP8.0以上
* Laravel9.x系（Webフレームワーク）
*  MySQL or MariaDB（開発環境はMariaDB）
* GitHub（バージョン管理サイト）
* Git（バージョン管理ツール）
* PHPUnit9.x以上（PHPの単体テスト）
* composer（PHPパッケージ管理ツール）
* GitHubActions (自動テストと自動デプロイ）
* TailwindCSS（cssフレームワーク）
*  daisyUI（TailwindCSS用のライブラリ）
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
開発時のテストは基本的にPHPStormで行います。それ以外はリポジトリにPushした時点でGitHubActionsが自動的に行います。

## デプロイ方法
ブランチによって自動でデプロイされます。developブランチならステージング環境へ、releaseブランチなら本番環境へそれぞれGItHubActionsによって自動でデプロイされます。ツールはPHP製の「Deployer」を使います。

## バックアップ体制
GitHubActionsのスケジュールにてLaravelのConsoleを叩くことで実行されます。フックはサーバーのcronにて行います。
バックアップ対象はDBと画像です。

## 本番データをローカルデータに反映する
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
