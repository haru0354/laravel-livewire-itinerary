# Laravel Livewireの旅程表アプリの概要

|旅程表アプリ | 旅程/メモの表示 |
|-------|-------|
| ![旅のしおり](/public/images/thumbnail/laravel-livewire-tabinoshiori01.jpg) | ![メモの一覧](/public/images/thumbnail/laravel-livewire-tabinoshiori.jpg) |

Laravel Livewireを使用したLaravelフルスタックの旅程表アプリです。

Laravelでの初アプリを作成している際に「Livewire」の存在を知り、「これは使ってみたい！」と思い作成しました。

あくまでLivewireを試しに使ってみる為に作成をしたアプリで、アウトプットとして簡易的に短時間で学習目的に制作しています。

「Livewire」を使用せず「RESTful設計」で同様のアプリの作成もしています。

⇒ https://github.com/haru0354/laravel-restful-itinerary.git（RESTful設計）

## 技術スタック

- PHP 8.2 / Laravel 10（バックエンド）
- Laravel Livewire 3.6
- Tailwind CSS（スタイリング）
- MySQL(DB)
- Laravel Breeze（認証）

## 主な機能

- 旅のしおりのCRUD
- 旅程表のCRUD
- メモのCRUD
- フォームバリデーション
- 各日付ごとに旅程を並び替えて表示
- 各旅程が同日の場合は日付を1度のみ表示
- 削除の際は確認のモーダル表示

複数の「旅のしおり」を作成することができ、ここに「京都旅行」「大阪旅行」など、作成できます。

各旅のしおりには「旅程」と「メモ」を追加することができ、円滑に旅行プランの作成をすることが可能です。

また、「帰宅日が出発日より前になっていないか？」「各項目は入力されているか？」など、フォームバリデーションでミスを防ぎます。

## アプリのサムネイル画像

|複数旅のプランの作成 | 各しおりにメモのCRUD |
|-------|-------|
| ![旅のしおりの一覧](/public/images/thumbnail/laravel-livewire-tabinoshiori01.jpg) | ![旅のしおりの追加](/public/images/thumbnail/laravel-livewire-tabinoshiori.jpg) |

| 各しおりに旅程のCRUD | スマホ画面での表示（旅程/メモ） |
|-------|-------|
| ![旅程の一覧](/public/images/thumbnail/laravel-livewire-ryoteihyou.jpg) | ![旅程の追加](/public/images/thumbnail/laravel-livewire-ryoteihyou-add.jpg) |

| フォーム | フォームバリデーション |
|-------|-------|
| ![メモの追加](/public/images/thumbnail/laravel-livewire-memo.jpg) | ![メモの一覧](/public/images/thumbnail/laravel-livewire-memo.jpg) |

| フォーム | フォームバリデーション |
|-------|-------|
| ![削除モーダル](/public/images/thumbnail/laravel-livewire-delete.jpg) | ![フォームバリデーション](/public/images/thumbnail/laravel-livewire-form.jpg) |


## セットアップ手順

1. リポジトリをクローン：

git clone https://github.com/haru0354/laravel-livewire-itinerary.git

cd laravel-restful-itinerary

2. 依存関係をインストール：

composer install

npm install

3. 環境ファイルを設定：

cp .env.example .env

php artisan key:generate

4. データベースを準備：

php artisan migrate --seed

5. サーバーを起動：

npm run dev
php artisan serve

### コマンドの概要

| コマンド                     | 説明                                   |
| ---------------------------- | -------------------------------------- |
| `npm install`                | フロントエンドの依存関係をインストール |
| `composer install`           | PHP（Laravel）の依存関係をインストール |
| `php artisan key:generate`   | アプリケーションキーを生成             |
| `php artisan migrate --seed` | DB に初期データの挿入                  |
| `php artisan serve`          | Laravel のローカル開発サーバーを起動   |
| `npm run dev`                | フロントエンドのビルドと監視を開始     |



