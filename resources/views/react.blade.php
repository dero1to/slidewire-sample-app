<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reactions</title>
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body class="min-h-screen bg-zinc-950 text-white">
    <div
        x-data="{
            busy: false,
            last: null,
            async send(emoji) {
                if (this.busy) return;
                this.busy = true;
                this.last = emoji;
                try {
                    await fetch('/react/send', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                        },
                        body: JSON.stringify({ emoji }),
                    });
                } catch (e) {
                    // swallow network errors; UI already responded
                }
                setTimeout(() => (this.busy = false), 200);
            },
        }"
        class="min-h-screen flex flex-col items-center justify-center gap-8 p-6"
    >
        <p class="text-zinc-400 text-sm">登壇にリアクションを送れます</p>
        <div class="flex items-center justify-center gap-4 md:gap-6 flex-wrap">
            <button
                type="button"
                @click="send('clap')"
                class="text-7xl p-8 rounded-3xl bg-zinc-900 hover:bg-zinc-800 active:scale-95 transition shadow-lg"
            >👏</button>
            <button
                type="button"
                @click="send('heart')"
                class="text-7xl p-8 rounded-3xl bg-zinc-900 hover:bg-zinc-800 active:scale-95 transition shadow-lg"
            >❤️</button>
            <button
                type="button"
                @click="send('tada')"
                class="text-7xl p-8 rounded-3xl bg-zinc-900 hover:bg-zinc-800 active:scale-95 transition shadow-lg"
            >🎉</button>
        </div>
    </div>

    @livewireScripts
</body>
</html>
