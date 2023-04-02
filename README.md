# 名前【 What'_up 】
 
共有機能付き日記アプリケーション
 
# 概要
 
日記の一部の内容を共有し、他の人の書いた日記にいいねをつけることができる日記アプリになります。
 
# 使い方
 
一番最初の管理者ユーザーはDBを直接操作しusers_tableのroleカラムを"admin"に設定する必要あり。
（以降の管理者は管理者画面で編集可能）

なお、お使いのphpMyAdminに上のデータベースを作り、入っているwhat's_up.sqlをインポートしていただければそのままお使いいただけるようになると思います。

# テストアカウント

一般ユーザー[ email:test1@test1, PW:testtest ]
一般ユーザー2[ email:test2@test2, PW:testtest ]
管理者[ email:test3@test3, PW:testtest ]

 
# Requirement

PHP_versions: PHP 8.1.12
laravel_versions: v10.4.1
 
npm ls
C:\xampp\htdocs\what's_up
+-- @popperjs/core@2.11.6
+-- @tailwindcss/forms@0.5.3
+-- @vitejs/plugin-vue@4.1.0
+-- alpinejs@3.12.0
+-- autoprefixer@10.4.14
+-- axios@1.3.4
+-- bootstrap@5.2.3
+-- laravel-vite-plugin@0.7.4
+-- postcss@8.4.21
+-- sass@1.59.3
+-- tailwindcss@3.2.7
+-- vite@4.2.1
`-- vue@3.2.47

#　env一部内容
APP_NAME=whats_up
APP_ENV=local
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=whats_up
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
QUEUE_DRIVER=database
SESSION_DRIVER=file
SESSION_LIFETIME=120

