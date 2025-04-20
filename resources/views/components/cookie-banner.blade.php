<div 
    x-data="{
        showBanner: localStorage.getItem('cookieAccepted') !== 'true',
        init() {
            if (this.showBanner) {
                setTimeout(() => {
                    this.acceptCookies(); // auto-accept after 10s
                }, 10000);
            }
        },
        acceptCookies() {
            localStorage.setItem('cookieAccepted', 'true');
            this.showBanner = false;
        }
    }"
    x-show="showBanner"
    x-transition
    class="fixed bottom-4 left-4 right-4 md:left-8 md:right-auto md:max-w-xl z-50 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 shadow-lg rounded-xl p-4 flex flex-col md:flex-row items-start md:items-center justify-between gap-4"
>
    <div class="text-sm">
        This website uses cookies to ensure you get the best experience. Read our 
        <a href="{{ route('privacy') }}" class="text-cyan-600 hover:underline">Privacy & Cookie Policy</a>.
    </div>

    <button 
        @click="acceptCookies"
        class="bg-cyan-600 hover:bg-cyan-700 text-white text-sm px-4 py-2 rounded-lg transition"
    >
        Accept
    </button>
</div>
