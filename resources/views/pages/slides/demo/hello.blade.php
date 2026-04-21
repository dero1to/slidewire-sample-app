<?php

use Livewire\Component;

new class extends Component {
    //
}; ?>

<x-slidewire::deck theme="default">

    {{-- 1. タイトルスライド --}}
    <x-slidewire::slide>
        <x-slidewire::title-slide
            title="SlideWire 入門ガイド"
            subtitle="Laravel + Livewire でプレゼンテーションを作ろう"
            overline="v1.3"
            speaker="SlideWire チュートリアル"
            variant="hero"
            align="center"
        />
    </x-slidewire::slide>

    {{-- 2. アジェンダ --}}
    <x-slidewire::slide>
        <x-slidewire::agenda-slide title="目次" style="cards">
            <x-slidewire::agenda-item title="SlideWire とは" description="概要と特徴" style="cards" />
            <x-slidewire::agenda-item title="インストール" description="セットアップ手順" style="cards" />
            <x-slidewire::agenda-item title="基本コンポーネント" description="Deck / Slide / Fragment" style="cards" />
            <x-slidewire::agenda-item title="レイアウト" description="タイトル / 2カラム / メディア分割" style="cards" />
            <x-slidewire::agenda-item title="コンテンツ" description="Markdown / Code / Diagram" style="cards" />
            <x-slidewire::agenda-item title="テーマとカスタマイズ" description="6つのプリセットテーマ" style="cards" />
        </x-slidewire::agenda-slide>
    </x-slidewire::slide>

    {{-- 3. SlideWire とは --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-8">
            <h2 class="text-4xl font-bold">SlideWire とは？</h2>
            <x-slidewire::fragment>
                <p class="text-xl text-slate-300">Laravel + Livewire で動くプレゼンテーションパッケージ</p>
            </x-slidewire::fragment>
            <x-slidewire::fragment>
                <div class="grid grid-cols-3 gap-6 text-center">
                    <x-slidewire::panel variant="glass" title="Blade ベース">
                        普段の Blade テンプレートとして記述
                    </x-slidewire::panel>
                    <x-slidewire::panel variant="glass" title="リッチな機能">
                        テーマ・アニメーション・コードハイライト
                    </x-slidewire::panel>
                    <x-slidewire::panel variant="glass" title="簡単セットアップ">
                        Composer + 数行の設定で完了
                    </x-slidewire::panel>
                </div>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::slide>

    {{-- 4. 要件 --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">動作要件</h2>
            <x-slidewire::steps-slide columns="2" style="cards">
                <x-slidewire::step-item title="PHP ^8.4" description="最新の PHP バージョン" style="cards" />
                <x-slidewire::step-item title="Laravel ^13.0" description="Laravel フレームワーク" style="cards" />
                <x-slidewire::step-item title="Livewire ^4.0" description="リアクティブ UI" style="cards" />
                <x-slidewire::step-item title="Tailwind CSS ^4.0" description="ユーティリティ CSS" style="cards" />
            </x-slidewire::steps-slide>
        </div>
    </x-slidewire::slide>

    {{-- 5. インストール手順 --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">インストール手順</h2>
            <x-slidewire::fragment>
                <p class="text-lg text-slate-300 mb-2">1. Composer でインストール</p>
                <x-slidewire::code language="bash" size="text-base">
composer require wendelladriel/slidewire
                </x-slidewire::code>
            </x-slidewire::fragment>
            <x-slidewire::fragment>
                <p class="text-lg text-slate-300 mb-2">2. SlideWire のソースを @source で追加</p>
                <x-slidewire::code language="css" size="text-sm">
/* app.css */
@source '../../vendor/wendelladriel/slidewire/resources/views/**/*.blade.php';
@source '../../vendor/wendelladriel/slidewire/src/**/*.php';
                </x-slidewire::code>
            </x-slidewire::fragment>
            <x-slidewire::fragment>
                <p class="text-lg text-slate-300 mb-2">3. プレゼンテーションを作成</p>
                <x-slidewire::code language="bash" size="text-base">
php artisan make:slidewire demo/hello --title="Hello SlideWire"
                </x-slidewire::code>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::slide>

    {{-- 6. ルーティング --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">ルーティング</h2>
            <p class="text-lg text-slate-300">routes/web.php にルートを登録するだけ</p>
            <x-slidewire::code language="php" size="text-base">
use Illuminate\Support\Facades\Route;

// 基本的なルート登録
Route::slidewire('/slides/hello', 'demo/hello');
            </x-slidewire::code>
            <x-slidewire::fragment>
                <x-slidewire::panel variant="outlined" title="ポイント">
                    第1引数が URL パス、第2引数が Blade ファイルのキー（resources/views/pages/slides/ 以下）
                </x-slidewire::panel>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::slide>

    {{-- 7. 基本構造: Deck と Slide --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">基本構造: Deck と Slide</h2>
            <p class="text-slate-300">すべてのプレゼンは <code class="text-emerald-400">&lt;x-slidewire::deck&gt;</code> で囲み、各スライドを <code class="text-emerald-400">&lt;x-slidewire::slide&gt;</code> で定義します。</p>
            <x-slidewire::code language="html" size="text-sm">
<x-slidewire::deck theme="default">
    <x-slidewire::slide class="bg-slate-900 text-white">
        <h1>最初のスライド</h1>
    </x-slidewire::slide>

    <x-slidewire::slide class="bg-white text-slate-900">
        <h1>2枚目のスライド</h1>
    </x-slidewire::slide>
</x-slidewire::deck>
            </x-slidewire::code>
        </div>
    </x-slidewire::slide>

    {{-- 8. Fragment --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">Fragment（段階表示）</h2>
            <p class="text-slate-300">コンテンツを順番に表示できます</p>
            <x-slidewire::fragment>
                <x-slidewire::panel variant="glass">
                    ステップ 1: まずこれが表示されます
                </x-slidewire::panel>
            </x-slidewire::fragment>
            <x-slidewire::fragment>
                <x-slidewire::panel variant="glass">
                    ステップ 2: 次にこれが表示されます
                </x-slidewire::panel>
            </x-slidewire::fragment>
            <x-slidewire::fragment>
                <x-slidewire::panel variant="glass">
                    ステップ 3: 最後にこれが表示されます
                </x-slidewire::panel>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::slide>

    {{-- 9. Fragment コード例 --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">Fragment の書き方</h2>
            <x-slidewire::code language="html" size="text-sm">
<x-slidewire::fragment>
    <p>最初に表示</p>
</x-slidewire::fragment>

<x-slidewire::fragment>
    <p>次に表示</p>
</x-slidewire::fragment>

<!-- index で順番を指定することも可能 -->
<x-slidewire::fragment index="2">
    <p>3番目</p>
</x-slidewire::fragment>
            </x-slidewire::code>
        </div>
    </x-slidewire::slide>

    {{-- 10. レイアウト: TitleSlide --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">タイトルスライド</h2>
            <p class="text-slate-300">3つのバリアント: <code class="text-emerald-400">default</code> / <code class="text-emerald-400">hero</code> / <code class="text-emerald-400">minimal</code></p>
            <x-slidewire::code language="html" size="text-sm">
<x-slidewire::slide>
    <x-slidewire::title-slide
        title="プレゼンタイトル"
        subtitle="サブタイトル"
        speaker="発表者名"
        event="イベント名"
        date="2025-03-25"
        variant="hero"
        align="center"
    />
</x-slidewire::slide>
            </x-slidewire::code>
        </div>
    </x-slidewire::slide>

    {{-- 11. レイアウト: 2カラム --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <x-slidewire::two-column-slide ratio="1:1" gap="xl" align="center">
            <x-slot name="left">
                <div class="space-y-4">
                    <h2 class="text-3xl font-bold">2カラムレイアウト</h2>
                    <p class="text-slate-300">左右に分割してコンテンツを配置</p>
                    <ul class="text-slate-300 space-y-2 list-disc list-inside">
                        <li>ratio: 1:1 / 2:1 / 1:2</li>
                        <li>gap: md / lg / xl</li>
                        <li>align: start / center / stretch</li>
                    </ul>
                </div>
            </x-slot>
            <x-slot name="right">
                <x-slidewire::code language="html" size="text-xs">
<x-slidewire::two-column-slide
    ratio="1:1"
    gap="xl"
    align="center"
>
    <x-slot name="left">
        左側のコンテンツ
    </x-slot>
    <x-slot name="right">
        右側のコンテンツ
    </x-slot>
</x-slidewire::two-column-slide>
                </x-slidewire::code>
            </x-slot>
        </x-slidewire::two-column-slide>
    </x-slidewire::slide>

    {{-- 12. Markdown --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">Markdown サポート</h2>
            <x-slidewire::two-column-slide ratio="1:1" gap="lg">
                <x-slot name="left">
                    <p class="text-slate-400 mb-2">書き方:</p>
                    <x-slidewire::code language="html" size="text-xs">
<x-slidewire::markdown>
## 見出し

- リスト項目 1
- リスト項目 2
- **太字** と *斜体*
</x-slidewire::markdown>
                    </x-slidewire::code>
                </x-slot>
                <x-slot name="right">
                    <p class="text-slate-400 mb-2">表示結果:</p>
                    <x-slidewire::panel variant="outlined">
                        <x-slidewire::markdown>
## 見出し

- リスト項目 1
- リスト項目 2
- **太字** と *斜体*
                        </x-slidewire::markdown>
                    </x-slidewire::panel>
                </x-slot>
            </x-slidewire::two-column-slide>
        </div>
    </x-slidewire::slide>

    {{-- 13. コードハイライト --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">コードハイライト</h2>
            <p class="text-slate-300">Phiki による構文ハイライト。language 属性で言語を指定</p>
            <x-slidewire::fragment>
                <x-slidewire::code language="php" size="text-sm">
// PHP の例
class PresentationController extends Controller
{
    public function show(string $slug): View
    {
        return view("slides.{$slug}");
    }
}
                </x-slidewire::code>
            </x-slidewire::fragment>
            <x-slidewire::fragment>
                <x-slidewire::code language="javascript" size="text-sm">
// JavaScript の例
const slides = document.querySelectorAll('.slide');
slides.forEach((slide, index) => {
    slide.dataset.index = index;
});
                </x-slidewire::code>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::slide>

    {{-- 14. Diagram --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">ダイアグラム（Mermaid）</h2>
            <x-slidewire::two-column-slide ratio="1:1" gap="lg">
                <x-slot name="left">
                    <p class="text-slate-400 mb-2">書き方:</p>
                    <x-slidewire::code language="html" size="text-xs">
<x-slidewire::diagram>
graph TD
    A[インストール] --> B[設定]
    B --> C[スライド作成]
    C --> D[公開]
</x-slidewire::diagram>
                    </x-slidewire::code>
                </x-slot>
                <x-slot name="right">
                    <p class="text-slate-400 mb-2">表示結果:</p>
                    <x-slidewire::diagram>
graph TD
    A[インストール] --> B[設定]
    B --> C[スライド作成]
    C --> D[公開]
                    </x-slidewire::diagram>
                </x-slot>
            </x-slidewire::two-column-slide>
        </div>
    </x-slidewire::slide>

    {{-- 15. Panel コンポーネント --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">Panel コンポーネント</h2>
            <p class="text-slate-300">4つのバリアントでコンテンツを装飾</p>
            <div class="grid grid-cols-2 gap-4">
                <x-slidewire::fragment>
                    <x-slidewire::panel variant="default" title="default">
                        デフォルトスタイル
                    </x-slidewire::panel>
                </x-slidewire::fragment>
                <x-slidewire::fragment>
                    <x-slidewire::panel variant="elevated" title="elevated">
                        シャドウ付きスタイル
                    </x-slidewire::panel>
                </x-slidewire::fragment>
                <x-slidewire::fragment>
                    <x-slidewire::panel variant="outlined" title="outlined">
                        ボーダーのみスタイル
                    </x-slidewire::panel>
                </x-slidewire::fragment>
                <x-slidewire::fragment>
                    <x-slidewire::panel variant="glass" title="glass">
                        グラスモーフィズムスタイル
                    </x-slidewire::panel>
                </x-slidewire::fragment>
            </div>
        </div>
    </x-slidewire::slide>

    {{-- 16. テーマ一覧 --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">プリセットテーマ</h2>
            <p class="text-slate-300">Deck の theme 属性で指定。スライド単位でも上書き可能</p>
            <div class="grid grid-cols-3 gap-4 text-sm">
                <x-slidewire::panel variant="glass" title="default">
                    ダークブルーのグラデーション
                </x-slidewire::panel>
                <x-slidewire::panel variant="glass" title="black">
                    ピュアダークテーマ
                </x-slidewire::panel>
                <x-slidewire::panel variant="glass" title="white">
                    ライトテーマ
                </x-slidewire::panel>
                <x-slidewire::panel variant="glass" title="aurora">
                    エメラルド → シアン
                </x-slidewire::panel>
                <x-slidewire::panel variant="glass" title="sunset">
                    ローズ → アンバー
                </x-slidewire::panel>
                <x-slidewire::panel variant="glass" title="neon">
                    フクシア → バイオレット → シアン
                </x-slidewire::panel>
            </div>
            <x-slidewire::fragment>
                <x-slidewire::code language="html" size="text-sm">
<!-- テーマの適用 -->
<x-slidewire::deck theme="aurora">
    <!-- スライド単位で上書きも可能 -->
    <x-slidewire::slide theme="sunset">
        ...
    </x-slidewire::slide>
</x-slidewire::deck>
                </x-slidewire::code>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::slide>

    {{-- 17. トランジション --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">トランジション</h2>
            <p class="text-slate-300">スライド切り替え時のアニメーション</p>
            <div class="grid grid-cols-3 gap-4">
                <x-slidewire::panel variant="outlined" title="slide">水平スライド</x-slidewire::panel>
                <x-slidewire::panel variant="outlined" title="fade">フェード</x-slidewire::panel>
                <x-slidewire::panel variant="outlined" title="zoom">ズーム</x-slidewire::panel>
                <x-slidewire::panel variant="outlined" title="convex">凸型 3D</x-slidewire::panel>
                <x-slidewire::panel variant="outlined" title="concave">凹型 3D</x-slidewire::panel>
                <x-slidewire::panel variant="outlined" title="none">なし</x-slidewire::panel>
            </div>
            <x-slidewire::code language="html" size="text-sm">
<x-slidewire::deck transition="fade" transitionSpeed="slow">
    ...
</x-slidewire::deck>
            </x-slidewire::code>
        </div>
    </x-slidewire::slide>

    {{-- 18. 背景オプション --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">スライド背景オプション</h2>
            <p class="text-slate-300">各スライドに個別の背景を設定</p>
            <x-slidewire::code language="html" size="text-sm">
<!-- 単色背景 -->
<x-slidewire::slide background="#1e293b">

<!-- グラデーション -->
<x-slidewire::slide background="linear-gradient(135deg, #667eea, #764ba2)">

<!-- 背景画像 -->
<x-slidewire::slide
    backgroundImage="https://example.com/bg.jpg"
    backgroundSize="cover"
    backgroundPosition="center"
    backgroundOpacity="0.5"
>

<!-- 背景動画 -->
<x-slidewire::slide
    backgroundVideo="video.mp4"
    :backgroundVideoLoop="true"
    :backgroundVideoMuted="true"
>
            </x-slidewire::code>
        </div>
    </x-slidewire::slide>

    {{-- 19. 垂直スライド --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">垂直スライド</h2>
            <p class="text-slate-300">スライドを縦方向にグループ化できます</p>
            <x-slidewire::code language="html" size="text-sm">
<x-slidewire::vertical-slide>
    <x-slidewire::slide>
        上下キーでナビゲーション（1/3）
    </x-slidewire::slide>
    <x-slidewire::slide>
        縦に並んだスライド（2/3）
    </x-slidewire::slide>
    <x-slidewire::slide>
        セクション分けに便利（3/3）
    </x-slidewire::slide>
</x-slidewire::vertical-slide>
            </x-slidewire::code>
        </div>
    </x-slidewire::slide>

    {{-- 20. Deck の設定オプション --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">Deck の設定オプション</h2>
            <x-slidewire::code language="html" size="text-sm">
<x-slidewire::deck
    theme="default"
    transition="slide"
    transitionSpeed="default"
    :showControls="true"
    :showProgress="true"
    :showFullscreenButton="true"
    :keyboard="true"
    :touch="true"
    :autoSlide="0"
    :autoSlidePauseOnInteraction="true"
>
    ...
</x-slidewire::deck>
            </x-slidewire::code>
            <x-slidewire::fragment>
                <x-slidewire::panel variant="outlined" title="autoSlide">
                    ミリ秒単位で設定。例: :autoSlide="5000" で5秒ごとに自動送り
                </x-slidewire::panel>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::slide>

    {{-- 21. Artisan コマンド --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">Artisan コマンド</h2>
            <x-slidewire::code language="bash" size="text-base">
# プレゼンテーション作成
php artisan make:slidewire demo/hello --title="タイトル"

# 設定ファイルの公開
php artisan vendor:publish --tag=slidewire-config

# ビューの公開（カスタマイズ用）
php artisan vendor:publish --tag=slidewire-views

# スタブの公開
php artisan vendor:publish --tag=slidewire-stubs
            </x-slidewire::code>
        </div>
    </x-slidewire::slide>

    {{-- 22. ナビゲーション --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">ナビゲーション方法</h2>
            <div class="grid grid-cols-3 gap-6">
                <x-slidewire::fragment>
                    <x-slidewire::panel variant="glass" title="キーボード">
                        ← → ↑ ↓ 矢印キー / PageUp / PageDown / Space
                    </x-slidewire::panel>
                </x-slidewire::fragment>
                <x-slidewire::fragment>
                    <x-slidewire::panel variant="glass" title="マウス / タッチ">
                        クリックまたはスワイプで移動
                    </x-slidewire::panel>
                </x-slidewire::fragment>
                <x-slidewire::fragment>
                    <x-slidewire::panel variant="glass" title="URL ハッシュ">
                        URL フラグメントで直接ジャンプ可能
                    </x-slidewire::panel>
                </x-slidewire::fragment>
            </div>
        </div>
    </x-slidewire::slide>

    {{-- 23. まとめ --}}
    <x-slidewire::slide>
        <x-slidewire::title-slide
            title="さあ、始めよう！"
            subtitle="SlideWire でプレゼンを Blade で書く新体験"
            overline="まとめ"
            variant="hero"
            align="center"
        />
    </x-slidewire::slide>

</x-slidewire::deck>
