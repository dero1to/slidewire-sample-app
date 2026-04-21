<div
    x-data="{
        items: [],
        since: Date.now(),
        map: { clap: '👏', heart: '❤️', tada: '🎉' },
        async poll() {
            try {
                const res = await fetch(`/react/recent?since=${this.since}`);
                if (!res.ok) return;
                const data = await res.json();
                this.since = data.now;
                data.reactions.forEach((r) => {
                    const id = Date.now().toString(36) + Math.random().toString(36).slice(2);
                    this.items.push({ id, emoji: this.map[r.emoji] || '?' });
                    setTimeout(() => {
                        this.items = this.items.filter((i) => i.id !== id);
                    }, 2500);
                });
            } catch (e) {
                // ignore transient network errors
            }
        },
    }"
    x-init="poll(); setInterval(() => poll(), 1000)"
    style="position: fixed; bottom: 24px; right: 24px; display: flex; flex-direction: column-reverse; gap: 8px; pointer-events: none; z-index: 9999;"
>
    <template x-for="item in items" :key="item.id">
        <div
            x-text="item.emoji"
            style="font-size: 56px; line-height: 1; animation: slidewire-float 2.5s ease-out forwards;"
        ></div>
    </template>
</div>

<style>
    @keyframes slidewire-float {
        0%   { opacity: 0; transform: translateY(20px) scale(0.7); }
        15%  { opacity: 1; transform: translateY(0) scale(1.1); }
        60%  { opacity: 1; transform: translateY(-30px) scale(1); }
        100% { opacity: 0; transform: translateY(-80px) scale(0.9); }
    }
</style>
