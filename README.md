# sencha-works-app

Sencha Works 用の Laravel 8 アプリケーションです。

## ディレクトリ構成

```text
.
├── docker
│   ├── docker-compose.yml
│   └── php
│       ├── Dockerfile
│       └── entrypoint.sh
└── src
    └── Laravel アプリケーション本体
```

## 起動

```bash
docker compose -f docker/docker-compose.yml up -d --build
```

アプリケーション:

```text
http://localhost:8000
```

## データベース

マイグレーション:

```bash
docker compose -f docker/docker-compose.yml exec app php artisan migrate
```

シーディング:

```bash
docker compose -f docker/docker-compose.yml exec app php artisan db:seed
```

## phpMyAdmin

phpMyAdmin:

```text
http://localhost:8080
```

ログイン情報:

```text
サーバ: mysql
ユーザー名: sencha
パスワード: secret
データベース: sencha_works
```

ホスト側のDBクライアントから接続する場合は、`127.0.0.1:3307` を使用してください。

## メール確認

開発環境では Mailpit で送信メールを確認できます。

```text
http://localhost:8025
```

## 停止

```bash
docker compose -f docker/docker-compose.yml down
```
