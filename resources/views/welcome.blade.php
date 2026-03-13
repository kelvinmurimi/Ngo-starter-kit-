<x-layouts.front>
    <main class="mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-15 mb-10">
        <div class="text-center">

            <h1 class="text-6xl">
                {{ config('app.name') }}
            </h1>

            <div class="mx-auto mt-8 max-w-2xl space-y-4 text-left">
                <div class="rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <svg class="mr-2 inline size-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="font-medium">Merging </span> .....
                </div>

                <div class="rounded-lg bg-blue-50 p-4 text-sm text-blue-800 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <span class="font-medium">Info!</span> **Full Changelog**: https://github.com/kelvinmurimi/Ngo-starter-kit-/commits/v0.1.0-beta.9
                </div>

                <div class="rounded-lg bg-yellow-50 p-4 text-sm text-yellow-800 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                    <span class="font-medium">Warning!</span> Vite reload error :500
                </div>
            </div>

        </div>
    </main>
</x-layouts.front>
