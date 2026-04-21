<?php

use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Livewire\Component;

new class extends Component {
    public string $qrSvg = '';

    public string $reactUrl = '';

    public function mount(): void
    {
        $this->reactUrl = url('/react');

        $renderer = new ImageRenderer(
            new RendererStyle(380, 0),
            new SvgImageBackEnd()
        );

        $this->qrSvg = (new Writer($renderer))->writeString($this->reactUrl);
    }
}; ?>

<x-slidewire::deck theme="default">

    {{-- 1. タイトル --}}
    <x-slidewire::slide>
        <x-slidewire::title-slide
            title="LT 資料、AI に手伝ってもらいたくない？"
            subtitle="Blade で書く SlideWire のススメ"
            overline="LT"
            variant="hero"
            align="center"
        />
    </x-slidewire::slide>

    {{-- 2. つかみ: Google Slide の辛み --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-5xl space-y-8">
            <h2 class="text-4xl font-bold">Google Slide、正直しんどくない？</h2>
            <div class="grid grid-cols-2 gap-4">
                <x-slidewire::fragment>
                    <x-slidewire::panel variant="glass" title="レイアウト調整がマウス芸">
                        ピクセル単位の位置合わせに時間が溶ける
                    </x-slidewire::panel>
                </x-slidewire::fragment>
                <x-slidewire::fragment>
                    <x-slidewire::panel variant="glass" title="AI に丸投げしづらい">
                        結局テキストを手でコピペする羽目に
                    </x-slidewire::panel>
                </x-slidewire::fragment>
                <x-slidewire::fragment>
                    <x-slidewire::panel variant="glass" title="git diff が効かない">
                        バージョン管理はコメント頼み
                    </x-slidewire::panel>
                </x-slidewire::fragment>
                <x-slidewire::fragment>
                    <x-slidewire::panel variant="glass" title="デザイン迷子">
                        フォントと色選びで本題に入れない
                    </x-slidewire::panel>
                </x-slidewire::fragment>
            </div>
        </div>
    </x-slidewire::slide>

    {{-- 3. スライドがコードだったら --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">じゃあ、スライドがコードだったら？</h2>
            <x-slidewire::steps-slide columns="2" style="cards">
                <x-slidewire::step-item title="AI がそのまま書ける" description="Blade なのでプロンプト1発で生成できる" style="cards" />
                <x-slidewire::step-item title="git で差分管理" description="プルリクでレビューもできる" style="cards" />
                <x-slidewire::step-item title="Tailwind でデザイン" description="クラスを足すだけで整う" style="cards" />
                <x-slidewire::step-item title="コピペで再利用" description="過去の LT からパーツを引き継げる" style="cards" />
            </x-slidewire::steps-slide>
        </div>
    </x-slidewire::slide>

    {{-- 4. SlideWire とは --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-5xl space-y-8">
            <h2 class="text-4xl font-bold">それ、SlideWire でできます</h2>
            <p class="text-xl text-slate-300">Laravel + Livewire で動く Blade 製プレゼンパッケージ</p>
            <div class="grid grid-cols-3 gap-6 text-center">
                <x-slidewire::panel variant="glass" title="Blade">
                    普段のテンプレート構文で書く
                </x-slidewire::panel>
                <x-slidewire::panel variant="glass" title="Livewire">
                    スライドに状態と動きを持てる
                </x-slidewire::panel>
                <x-slidewire::panel variant="glass" title="Tailwind">
                    クラス1つで見た目が決まる
                </x-slidewire::panel>
            </div>
            <x-slidewire::fragment>
                <p class="text-sm text-slate-400">※ スライドに &lt;livewire:your-component /&gt; で埋め込めば、サーバー側コードでインタラクティブに。あとで実演します</p>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::slide>

    {{-- 5. 最小の書き方 --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">最小の書き方</h2>
            <p class="text-slate-300">Artisan コマンドで雛形を生成</p>
            <x-slidewire::code language="bash" size="text-base">
php artisan make:slidewire lt/my-talk --title="LT タイトル"
            </x-slidewire::code>
            <x-slidewire::fragment>
                <p class="text-slate-300">あとは deck と slide で囲むだけ</p>
                <x-slidewire::code language="html" size="text-sm">
<x-slidewire::deck>
    <x-slidewire::slide>
        <h1>最初のスライド</h1>
    </x-slidewire::slide>
    <x-slidewire::slide>
        <h1>次のスライド</h1>
    </x-slidewire::slide>
</x-slidewire::deck>
                </x-slidewire::code>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::slide>

    {{-- 6. AI との協業 --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <x-slidewire::two-column-slide ratio="1:1" gap="lg" align="center">
            <x-slot name="left">
                <div class="space-y-4">
                    <h2 class="text-3xl font-bold">AI にこう投げる</h2>
                    <x-slidewire::panel variant="outlined">
                        「Laravel 13 の新機能を SlideWire で紹介する 5 枚のスライドを作って。各スライドに code コンポーネントでサンプルも添えて」
                    </x-slidewire::panel>
                    <p class="text-slate-400 text-sm">Claude / Copilot / Cursor、なんでも OK</p>
                </div>
            </x-slot>
            <x-slot name="right">
                <div class="space-y-4">
                    <h2 class="text-3xl font-bold">返ってくる Blade</h2>
                    <x-slidewire::code language="html" size="text-xs">
<x-slidewire::slide class="bg-slate-900 text-white">
    <h2>Laravel 13 の新機能</h2>
    <ul>
        <li>Starter Kits の刷新</li>
        <li>Workos AuthKit 対応</li>
        <li>Livewire 4 との統合</li>
    </ul>
</x-slidewire::slide>
                    </x-slidewire::code>
                    <p class="text-slate-400 text-sm">そのまま貼れば動く</p>
                </div>
            </x-slot>
        </x-slidewire::two-column-slide>
    </x-slidewire::slide>

    {{-- 7. Markdown デモ --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-6xl space-y-6">
            <h2 class="text-3xl font-bold">Markdown もそのまま書ける</h2>
            <x-slidewire::two-column-slide ratio="1:1" gap="lg">
                <x-slot name="left">
                    <p class="text-slate-400 mb-2 text-sm">書き方</p>
                    <x-slidewire::code language="html" size="text-xs">
<x-slidewire::markdown>
## Markdown Support

- 素の **Markdown** が書ける
- *斜体* や ~~取り消し線~~ もOK
- `インラインコード` も使える
</x-slidewire::markdown>
                    </x-slidewire::code>
                </x-slot>
                <x-slot name="right">
                    <p class="text-slate-400 mb-2 text-sm">表示結果</p>
                    <x-slidewire::panel variant="outlined">
                        <x-slidewire::markdown>
## Markdown Support

- 素の **Markdown** が書ける
- *斜体* や ~~取り消し線~~ もOK
- `インラインコード` も使える
                        </x-slidewire::markdown>
                    </x-slidewire::panel>
                </x-slot>
            </x-slidewire::two-column-slide>
        </div>
    </x-slidewire::slide>

    {{-- 8. Mermaid デモ --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-5xl space-y-6">
            <h2 class="text-3xl font-bold">ダイアグラムもコードで</h2>
            <x-slidewire::two-column-slide ratio="1:1" gap="lg">
                <x-slot name="left">
                    <p class="text-slate-400 mb-2 text-sm">書き方</p>
                    <x-slidewire::code language="html" size="text-xs">
<x-slidewire::diagram>
graph TD
    A[プロンプト] --> B[AI]
    B --> C[Blade 生成]
    C --> D[LT 完成]
</x-slidewire::diagram>
                    </x-slidewire::code>
                </x-slot>
                <x-slot name="right">
                    <p class="text-slate-400 mb-2 text-sm">表示結果</p>
                    <x-slidewire::diagram>
graph TD
    A[プロンプト] --> B[AI]
    B --> C[Blade 生成]
    C --> D[LT 完成]
                    </x-slidewire::diagram>
                </x-slot>
            </x-slidewire::two-column-slide>
        </div>
    </x-slidewire::slide>

    {{-- 9. ライブデモ (上下2段: デモ → タネ明かし) --}}
    <x-slidewire::vertical-slide>
        <x-slidewire::slide class="bg-slate-900 text-white">
            <div class="mx-auto max-w-4xl space-y-10 text-center">
                <h2 class="text-3xl font-bold">しかもスライド、動きます</h2>
                <livewire:counter />
                <x-slidewire::fragment>
                    <p class="text-slate-300 text-lg">↑ 押してみてください</p>
                </x-slidewire::fragment>
            </div>
        </x-slidewire::slide>
        <x-slidewire::slide class="bg-slate-900 text-white">
            <div class="mx-auto max-w-4xl space-y-6">
                <h2 class="text-3xl font-bold">タネ明かし</h2>
                <p class="text-slate-300">Livewire コンポーネントを 1 つ作って、スライドに埋め込むだけ</p>
                <x-slidewire::code language="php" size="text-sm">
class Counter extends Component
{
    public int $count = 0;

    public function increment(): void
    {
        $this->count++;
    }
}
                </x-slidewire::code>
                <p class="text-slate-300">スライド側はこれ 1 行</p>
                <x-slidewire::code language="html" size="text-sm">
<livewire:counter />
                </x-slidewire::code>
            </div>
        </x-slidewire::slide>
    </x-slidewire::vertical-slide>

    {{-- 10. 聴衆と繋がる (QR リアクションデモ) --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6 text-center">
            <h2 class="text-3xl font-bold">しかも、聴衆と繋がる</h2>
            <p class="text-slate-300">スマホで QR を読んで、絵文字を押してみてください 👇</p>
            <div class="inline-block bg-white p-6 rounded-2xl">
                {!! $qrSvg !!}
            </div>
            <p class="text-lg font-mono text-emerald-400">{{ $reactUrl }}</p>
        </div>
    </x-slidewire::slide>

    {{-- 11. Laravel があるから薄く書ける --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">これ、Laravel があるから</h2>
            <p class="text-slate-400 text-sm">リアクション送信は、ルート 1 本</p>
            <x-slidewire::code language="php" size="text-sm">
Route::post('/react/send', function (Request $request) {
    $emoji = $request->validate([
        'emoji' => 'in:clap,heart,tada',
    ])['emoji'];

    $reactions = Cache::get('lt.reactions', []);
    $reactions[] = ['emoji' => $emoji, 'at' => now()->timestamp];
    Cache::put('lt.reactions', $reactions, now()->addHour());

    return response()->noContent();
});
            </x-slidewire::code>
            <x-slidewire::fragment>
                <div class="pt-6 mt-4 border-t-2 border-emerald-500/40 space-y-3">
                    <p class="text-emerald-400 font-bold text-3xl">さらに本気なら Reverb</p>
                    <p class="text-lg text-slate-300">
                        <code class="bg-slate-800 px-3 py-1 rounded text-emerald-300">composer require laravel/reverb</code>
                    </p>
                    <p class="text-lg text-slate-300">
                        polling → WebSocket に置き換わって、<strong class="text-white">リアクションは瞬時に届く</strong>
                    </p>
                </div>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::slide>

    {{-- 12. 始め方 --}}
    <x-slidewire::slide class="bg-slate-900 text-white">
        <div class="mx-auto max-w-4xl space-y-6">
            <h2 class="text-3xl font-bold">今日から始められる</h2>
            <x-slidewire::steps-slide columns="2" style="cards">
                <x-slidewire::step-item title="1. インストール" description="composer require wendelladriel/slidewire" style="cards" />
                <x-slidewire::step-item title="2. Tailwind" description="app.css に @source を追加" style="cards" />
                <x-slidewire::step-item title="3. 雛形生成" description="php artisan make:slidewire my/talk" style="cards" />
                <x-slidewire::step-item title="4. ルート登録" description="Route::slidewire('/lt', 'my/talk')" style="cards" />
            </x-slidewire::steps-slide>
        </div>
    </x-slidewire::slide>

    {{-- 13. まとめ --}}
    <x-slidewire::slide>
        <x-slidewire::title-slide
            title="AI 時代の LT は、コードで書こう"
            subtitle="次の LT は SlideWire で"
            overline="まとめ"
            variant="hero"
            align="center"
        />
    </x-slidewire::slide>

</x-slidewire::deck>
