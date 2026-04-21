# CLAUDE.md

このリポジトリは、**登壇資料（プレゼンテーション）を管理する** Laravel アプリケーションです。スライドは [SlideWire](https://slidewire.dev/) (`wendelladriel/slidewire`) で記述・配信します。

## 技術スタック

- PHP ^8.4 / Laravel ^13
- Livewire ^4 + Flux UI
- SlideWire ^1.3（`x-slidewire::*` Blade コンポーネント）
- Tailwind CSS ^4 + Vite
- Pest（テスト）/ Laravel Pint（フォーマッタ）

## スライドの置き場所

- 実体: `resources/views/pages/slides/{section}/{name}.blade.php`
- トップ一覧: `routes/web.php` の `$slides` 配列にエントリを追加すると `/` のインデックスに出る
- ルーティング: 同ファイルで `Route::slidewire('/slides/{url}', '{section}/{name}')` を登録

## 新しい登壇資料を追加する手順

1. Artisan で雛形を生成:
   ```bash
   php artisan make:slidewire my-section/my-slides --title="タイトル"
   ```
2. `routes/web.php` にルートとインデックス項目を追加:
   ```php
   Route::slidewire('/slides/my-slides', 'my-section/my-slides');
   ```
3. Blade を編集。`<x-slidewire::deck>` 内に `<x-slidewire::slide>` を並べる。利用可能なコンポーネント例は `resources/views/pages/slides/demo/hello.blade.php` を参照（title-slide, agenda-slide, two-column-slide, fragment, code, markdown, diagram, panel など）。

## よく使うコマンド

| 用途 | コマンド |
|------|----------|
| 開発サーバー一式（Laravel + Vite + queue + Pail） | `composer run dev` |
| Lint（Pint） | `composer run lint` / チェックのみ `composer run lint:check` |
| テスト | `composer run test`（内部で config:clear + lint:check + Pest） |
| スライド雛形生成 | `php artisan make:slidewire {section}/{name} --title="..."` |

ブラウザは `http://127.0.0.1:8000` を使うこと（README 参照）。

## Tailwind の注意点

`resources/css/app.css` 冒頭の `@source` ディレクティブで SlideWire の Blade / PHP を取り込んでいる。これが無いと SlideWire 側で使われている Tailwind クラスが CSS に含まれず、見た目が崩れる。SlideWire をアップデートしたりパスが変わったときはここを確認する。

```css
@source '../../vendor/wendelladriel/slidewire/resources/views/**/*.blade.php';
@source '../../vendor/wendelladriel/slidewire/src/**/*.php';
```

## ディレクトリ構成（抜粋）

```
resources/
  css/app.css                        # Tailwind エントリ（@source 設定あり）
  views/
    welcome.blade.php                # スライド一覧ページ
    pages/slides/
      demo/hello.blade.php           # SlideWire 入門ガイド（コンポーネントのリファレンス代わり）
      my-section/my-slides.blade.php # ユーザーのスライド
routes/
  web.php                            # インデックスと Route::slidewire 登録
```
