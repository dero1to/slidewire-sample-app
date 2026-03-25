# SlideWire Example App

Laravel + Livewire + SlideWire を使ったプレゼンテーションのサンプルアプリケーションです。

## 動作要件

- PHP ^8.4
- Laravel ^12.0
- Livewire ^4.0
- Tailwind CSS ^4.0
- Node.js / npm

## セットアップ

```bash
# 依存パッケージのインストール
composer install
npm install

# 環境ファイルの準備
cp .env.example .env
php artisan key:generate

# データベースのマイグレーション
php artisan migrate

# アセットのビルド
npm run build
```

## 開発サーバーの起動

```bash
composer run dev
```

以下が同時に起動します:

| プロセス | URL |
|---------|-----|
| Laravel サーバー | http://127.0.0.1:8000 |
| Vite 開発サーバー | http://localhost:5173 |
| キューワーカー | - |
| ログビューア (Pail) | - |

> **注意:** ブラウザでは `http://127.0.0.1:8000` にアクセスしてください。

## プレゼンテーション

| パス | 内容 |
|------|------|
| `/slides/hello` | SlideWire 入門ガイド |

### 新しいプレゼンテーションの作成

```bash
# スライドファイルを生成
php artisan make:slidewire my-section/my-slides --title="タイトル"
```

`routes/web.php` にルートを追加:

```php
Route::slidewire('/slides/my-slides', 'my-section/my-slides');
```

## 技術スタック

- [Laravel](https://laravel.com/) - PHP フレームワーク
- [Livewire](https://livewire.laravel.com/) - リアクティブ UI
- [SlideWire](https://slidewire.dev/) - プレゼンテーションパッケージ
- [Tailwind CSS](https://tailwindcss.com/) - ユーティリティ CSS
- [Flux](https://flux.livewire.laravel.com/) - Livewire UI コンポーネント
