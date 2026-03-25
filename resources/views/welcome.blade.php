<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>スライド一覧 - {{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-zinc-950 text-white">
        <div class="mx-auto max-w-4xl px-6 py-16">
            <header class="mb-12">
                <h1 class="text-4xl font-bold tracking-tight">スライド一覧</h1>
                <p class="mt-2 text-zinc-400">SlideWire で作成されたプレゼンテーション</p>
            </header>

            <div class="grid gap-4">
                @forelse ($slides as $slide)
                    <a href="{{ $slide['url'] }}" class="group block rounded-xl border border-zinc-800 bg-zinc-900 px-6 py-5 transition hover:border-zinc-600 hover:bg-zinc-800">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold group-hover:text-white">{{ $slide['title'] }}</h2>
                                <p class="mt-1 text-sm text-zinc-400">{{ $slide['path'] }}</p>
                            </div>
                            <span class="text-zinc-600 transition group-hover:text-zinc-300">&rarr;</span>
                        </div>
                    </a>
                @empty
                    <p class="text-zinc-500">スライドがまだありません。</p>
                @endforelse
            </div>
        </div>
    </body>
</html>
