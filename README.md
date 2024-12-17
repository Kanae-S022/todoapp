# To do アプリ
## 使用技術一覧
<p style="display: inline">
　<!-- フロントエンドの言語一覧 -->
    <img src="https://img.shields.io/badge/-HTML-99d1ce.svg?logo=&style=for-the-badge">
    <img src="https://img.shields.io/badge/-CSS-1572B6.svg?logo=&style=for-the-badge">
    <img src="https://img.shields.io/badge/-Javascript-fff5a1.svg?logo=javascript&style=for-the-badge">
  <!-- バックエンドの言語一覧 -->
  <img src="https://img.shields.io/badge/-Php-cccfff.svg?logo=php&style=for-the-badge">
  <!-- バックエンドのフレームワーク一覧 -->
  <img src="https://img.shields.io/badge/-Laravel-f3a68c.svg?logo=laravel&style=for-the-badge">
  <!-- ミドルウェア一覧 -->
  <img src="https://img.shields.io/badge/-MySQL-4479A1.svg?logo=mysql&style=for-the-badge&logoColor=white">
</p>

## 概要
### アプリを作ったきっかけ
日々の仕事やプライベートのタスクが増えてきて、どれを優先すべきか整理できなくなったため、シンプルで直感的なタスク管理ツールが欲しいと思い、開発に至りました。

### アプリ機能説明
* 新規登録＆ログイン
* タスクの登録
* タスクの編集
* ステータスの変更
* タスクの削除

### 今後の実装予定
* 期限の追加

### アプリURL
https://todoapp-mu-ruddy-14.vercel.app/

#### テストアカウント
~~~
メールアドレス：testuser@example.com
パスワード：Password1234
~~~

## 開発環境の構築方法

### 構築環境
* Windows 11
* XAMPP
* php 8.2
* Laravel 11

1. git clone
~~~
git clone ~~~
~~~
2. 環境変数ファイルの作成

clone したディレクトリへ移動
~~~
cd ~~~
cp .env.example .env
~~~
3. composer install
~~~
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
composer --version
~~~
4. APP_KEYの生成
~~~
php artisan key:generate
~~~
5. フロントパッケージインストール
~~~
npm install
npm run dev
~~~
6. ローカルサーバー起動
~~~
php artisan serve
~~~
7. マイグレーション
~~~
php artisan migrate
~~~
8. シーダー実行
~~~
php artisan db:seed
~~~