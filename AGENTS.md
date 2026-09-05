# AGENTS.md

## 1. プロジェクト概要

`sencha-works-app` は、茶農家の求人と求職者をつなぐ Laravel 8 アプリです。

このアプリには、認証ユーザーが2種類あります。

- `users`: 求職者
- `owners`: 茶農家 / 求人掲載者

ルーティング、Controller、View、認証、セッション、テスト、リダイレクトを扱うときは、この2種類のユーザーを常に意識してください。

---

## 2. Codexの基本方針

このプロジェクトで作業するときは、以下を遵守してください。

- 回答・説明は日本語で行う
- 不明な仕様を推測して実装しない
- 判断できない場合は、実装前にユーザーへ確認する
- 既存コード・既存設計を確認してから変更する
- 必要のないリファクタリングを行わない
- 要求された作業と関係のないファイルを変更しない
- 既存機能への影響を確認する
- エラーが発生した場合は、原因を確認してから修正する
- 複数の解決方法があり、設計に影響する場合はユーザーへ選択肢を提示する
- ユーザーが行った既存の変更を勝手に削除・上書きしない

---

## 3. 作業ディレクトリと操作権限

Codexがファイルを作成・変更・削除できる範囲は、原則としてこのプロジェクトの `workDirectory` 配下のみとします。

```text
workDirectory/
└── sencha-works-app/
```

### 許可する操作

以下の操作は、必要な範囲で実行して構いません。

- `sencha-works-app/` 配下のファイルの参照
- `sencha-works-app/` 配下の既存ファイルの編集
- 実装に必要な新規ファイル・ディレクトリの作成
- テスト・Lint・Laravel Artisanコマンドの実行
- Dockerコンテナの起動・停止・再起動
- Gitの状態・差分・履歴・ブランチの確認

### 原則禁止する操作

以下は、ユーザーから明示的な指示がない限り実行しないでください。

- `workDirectory` 外のファイルの作成・変更・削除
- `sencha-works-app` 以外のプロジェクトの変更
- OSやユーザー環境の設定変更
- ユーザーのホームディレクトリ内のファイル変更
- SSH設定の変更
- Gitのグローバル設定変更
- Dockerのグローバル設定変更
- システム全体へのパッケージインストール
- 他のリポジトリへの変更

`workDirectory` 外の情報を確認する必要がある場合は、原則としてユーザーへ確認してください。

`.env` などのローカル環境ファイルを変更する必要がある場合は、変更前に理由・変更内容・影響を説明し、ユーザーの許可を得てください。

---

## 4. ディレクトリ構成

```text
.
├── docker
│   ├── docker-compose.yml
│   └── php
│       ├── Dockerfile
│       └── entrypoint.sh
├── src
│   ├── app
│   ├── config
│   ├── database
│   ├── public
│   ├── resources
│   ├── routes
│   ├── tests
│   └── artisan
├── README.md
├── TODO.md
└── AGENTS.md
```

Laravelアプリ本体は `src/` 配下にあります。

Docker関連ファイルは `docker/` 配下にあります。

---

## 5. 作業開始時

作業開始時は、可能な範囲で以下を確認してください。

1. `AGENTS.md`
2. `TODO.md`
3. `README.md`
4. 現在のGitブランチ
5. 未コミットの変更
6. 作業対象となる既存コード
7. 関連する設定・テスト

Gitの状態確認:

```bash
git status
git branch --show-current
```

未コミットの変更や未追跡ファイルが存在する場合は、ユーザーの作業内容である可能性を考慮し、勝手に削除・上書きしないでください。

---

## 6. タスク管理

現在および今後の作業は `TODO.md` で管理します。

作業開始時に `TODO.md` を確認してください。

- 新しい作業が必要になった場合は `TODO.md` への追加を検討する
- 完了したタスクは `[x]` に変更する
- 未完了のタスクを勝手に完了扱いにしない
- 大きなタスクは必要に応じて小さく分割する
- TODOに存在しない大きな機能追加を勝手に開始しない

具体的な優先順位・今後の開発予定は `AGENTS.md` ではなく `TODO.md` を正とします。

---

## 7. 開発環境

基本的にDockerを使って作業してください。

起動:

```bash
docker compose -f docker/docker-compose.yml up -d --build
```

停止:

```bash
docker compose -f docker/docker-compose.yml down
```

アプリ:

```text
http://localhost:8000
```

phpMyAdmin:

```text
http://localhost:8080
```

メール確認画面:

```text
http://localhost:8025
```

---

## 8. Docker操作

Docker関連の通常操作は実行して構いません。

ただし、以下のようなデータ削除・環境全体への影響が発生する可能性がある操作は、ユーザーの明示的な許可なしに実行しないでください。

```bash
docker compose down -v
docker volume rm
docker system prune
docker system prune -a
```

また、既存Volumeを削除したり、MySQLデータを初期化したりしないでください。

DockerfileやCompose設定を変更する場合は、既存環境への影響を確認してください。

---

## 9. データベース

DockerのappコンテナからMySQLに接続するときは、以下の設定を使用します。

```env
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=sencha_works
DB_USERNAME=sencha
DB_PASSWORD=secret
```

ホストPC側のDBクライアントから接続する場合:

```text
127.0.0.1:3307
```

マイグレーション:

```bash
docker compose -f docker/docker-compose.yml exec app php artisan migrate
```

Seeder:

```bash
docker compose -f docker/docker-compose.yml exec app php artisan db:seed
```

環境変数やconfigを変更した場合:

```bash
docker compose -f docker/docker-compose.yml exec app php artisan config:clear
docker compose -f docker/docker-compose.yml restart app
```

`.env` はローカル環境ファイルです。変更が必要な場合は、事前にユーザーへ理由・変更内容・影響を説明し、許可を得てから編集してください。

### データベース操作の制限

以下の操作は、ユーザーの明示的な許可なしに実行しないでください。

- DatabaseのDROP
- TableのDROP
- 既存データの一括DELETE
- 既存データの一括UPDATE
- Migrationのrollback
- Migrationのfresh実行
- Migrationのrefresh実行
- Database Volumeの削除

特に以下は勝手に実行しないでください。

```bash
php artisan migrate:fresh
php artisan migrate:refresh
php artisan migrate:reset
```

破壊的変更が必要な場合は、対象と影響を説明してユーザーへ確認してください。

---

## 10. ルーティングと認証

ルートは `src/app/Providers/RouteServiceProvider.php` で読み込まれています。

### 求職者側

- ルートファイル: `src/routes/web.php`
- URLプレフィックス: `/`
- ルート名プレフィックス: `user.`
- Guard: `users`
- ログインURL: `http://localhost:8000/login`
- ログイン後: `/dashboard`

### owner側

- ルートファイル: `src/routes/owner.php`
- URLプレフィックス: `/owner`
- ルート名プレフィックス: `owner.`
- Guard: `owners`
- ログインURL: `http://localhost:8000/owner/login`
- ログイン後: `/owner/dashboard`

リダイレクト関連で重要なファイル:

- `src/app/Http/Middleware/Authenticate.php`
- `src/app/Http/Middleware/RedirectIfAuthenticated.php`
- `src/app/Providers/RouteServiceProvider.php`
- `src/app/Providers/AppServiceProvider.php`

Laravel標準の `web` guardだけで判断しないでください。

このアプリでは `users` と `owners` を明示的に使い分けています。

---

## 11. セッション

求職者側とowner側で異なるsession cookieを使用します。

- 求職者側: `SESSION_COOKIE`
- owner側: `SESSION_COOKIE_OWNER`

`src/app/Providers/AppServiceProvider.php` で、リクエストパスが `owner` から始まる場合にowner用cookieへ切り替えています。

認証middleware、ルートプレフィックス、ログインURLを変更すると、求職者とownerのセッションが混在する可能性があります。

関連箇所を変更する場合は、両方のログイン・ログアウト・リダイレクトへの影響を確認してください。

---

## 12. メール

開発環境のメール送信先はDockerの `mailhog` サービスです。

```env
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_FROM_ADDRESS=no-reply@sencha-works.local
MAIL_FROM_NAME="${APP_NAME}"
```

送信メール:

```text
http://localhost:8025
```

画面表示だけでメールを送信しないでください。

メール送信は、応募、承諾、不採用、パスワード再設定など、明確なユーザー操作に紐づけます。

既知の改善対象:

- `src/app/Http/Controllers/User/InfoController.php` の `show()` で `SendThanksMail` がdispatchされています。移動または削除を検討してください。

---

## 13. 実装方針

- 既存のLaravel 8 / Bladeの書き方に合わせる
- 既存のディレクトリ構成を優先する
- 既存の命名規則を優先する
- 求職者側の処理は必要に応じて `User` namespace / view配下に置く
- owner側の処理は必要に応じて `Owner` namespace / view配下に置く
- ルート名は `user.*` と `owner.*` を明示的に使用する
- Guardは `auth:users`、`auth:owners`、`Auth::guard('users')`、`Auth::guard('owners')` を明示的に使用する
- 作成・更新系の入力検証は可能であればFormRequestへ寄せる
- フロント assets は `src/package.json` と `src/webpack.mix.js` を前提に扱う
- Node / npm の実行環境を追加する場合は、Docker内で実行できる形を優先する
- バグ修正時に広範囲なリファクタリングを行わない
- 関係のないファイルを変更しない
- 不要な外部ライブラリを追加しない

仕様変更や設計変更につながる実装については、ユーザーへ確認してから進めてください。

---

## 14. Git操作

### 確認系操作

以下は実行して構いません。

```bash
git status
git diff
git log
git branch
git branch -a
git branch -r
```

### 制限する操作

以下の操作は、ユーザーから明示的に依頼された場合を除いて実行しないでください。

```bash
git reset --hard
git clean -fd
git checkout -- .
git restore .
git rebase
git merge
git cherry-pick
git push
git push --force
git push --force-with-lease
```

また、

- ブランチを勝手に削除しない
- ユーザーの変更を勝手に破棄しない
- 未追跡ファイルを勝手に削除しない
- コンフリクトを推測だけで解消しない
- `main` へ勝手にpushしない
- Commitを勝手に作成しない
- Git履歴を書き換えない

コンフリクトが発生した場合は、Current / Incoming / Baseの内容を確認してください。

どちらを採用すべきか仕様から判断できない場合は、ユーザーへ確認してください。

---

## 15. セキュリティ・秘密情報

以下をGitへコミットしないでください。

- `.env`
- Password
- API Key
- Access Token
- Secret Key
- SSH秘密鍵
- その他の認証情報

また、

- 秘密情報をソースコードへ直接記述しない
- 秘密情報をログへ出力しない
- `.env` の既存値を勝手に変更しない
- `.env` を変更する場合は、必ず事前にユーザーの許可を得る
- 認証情報を外部サービスへ送信しない

`.env.example` を変更する場合は、実際の秘密情報ではなくサンプル値を使用してください。

---

## 16. テストと確認

コマンドは基本的にDocker内で実行してください。

全体テスト:

```bash
docker compose -f docker/docker-compose.yml exec app php artisan test
```

個別テスト:

```bash
docker compose -f docker/docker-compose.yml exec app php artisan test --filter=AuthenticationTest
```

確認コマンド:

```bash
docker compose -f docker/docker-compose.yml ps
docker compose -f docker/docker-compose.yml exec app php artisan route:list
docker compose -f docker/docker-compose.yml exec app php artisan migrate:status
docker compose -f docker/docker-compose.yml exec app php artisan route:clear
docker compose -f docker/docker-compose.yml exec app php artisan view:clear
docker compose -f docker/docker-compose.yml exec app php artisan storage:link
docker compose -f docker/docker-compose.yml logs --tail=80 app
```

フロント assets を扱う場合は、`src/package.json` の scripts を確認してください。
Node 実行環境が未整備の場合は、ホスト実行に寄せるかDockerへ追加するかをユーザーへ確認してください。

### 既知のテスト失敗

現時点では `AuthenticationTest` の一部が、`users` テーブルの必須カラム不足で失敗する可能性があります。

例:

```text
SQLSTATE[HY000]: General error: 1364 Field 'age' doesn't have a default value
```

これは `UserFactory` が `age` などの必須項目を生成していないことが原因です。
テスト整備時は、Factoryとマイグレーションの必須カラムを揃えてください。

Docker関連の変更を完了扱いにする前に、最低限以下を確認してください。

- `docker compose -f docker/docker-compose.yml config`
- `http://localhost:8000` が応答すること
- MySQLがhealthyであること
- 関連するrouteまたはartisan commandが動作すること

テストが実行できない場合は、実行できなかった理由を報告してください。

---

## 17. よくある注意点

- `guest` は「未ログイン状態」を意味し、ゲストユーザー種別ではない
- Dockerのappコンテナでは `DB_HOST=mysql` を使用する
- ホストPC側のDBクライアントでは `127.0.0.1:3307` を使用する
- `MAIL_FROM_ADDRESS` は `null` ではなくメールアドレス形式の値を設定する
- 環境変数の変更が反映されない場合は `config:clear` とappコンテナ再起動を確認する
- owner画面で求職者ログインへ遷移する場合は、ルート名プレフィックスと `Authenticate.php` を確認する
- ログイン後の遷移先が異なる場合は、`RedirectIfAuthenticated.php` と `RouteServiceProvider` の定数を確認する

---

## 18. 作業完了時

作業完了時は以下を確認してください。

1. 依頼された内容が実装されている
2. 関係のない変更が含まれていない
3. 既存機能を破壊していない
4. 実行可能なテストが成功している
5. エラーが残っていない
6. 秘密情報が含まれていない
7. 必要に応じて `TODO.md` が更新されている
8. `git diff` で最終的な変更内容を確認している

最後に、以下をユーザーへ簡潔に報告してください。

- 実施した内容
- 変更したファイル
- 実行したテスト・確認
- 未確認事項
- 残っているTODO
- ユーザーによる確認が必要な事項
