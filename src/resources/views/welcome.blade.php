<x-guest-layout>
    <div class="w-full max-w-4xl px-6 py-10 mx-auto">
        <div class="mb-8 text-center">
            <a href="{{ route('user.home') }}" class="inline-flex justify-center mb-6">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>

            <h1 class="text-3xl font-bold text-gray-900">Sencha Works</h1>
            <p class="mt-3 text-sm text-gray-600">
                茶農家の求人と、茶業で働きたい方をつなぐサービスです。
            </p>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-lg">
                <p class="text-xs font-semibold tracking-widest text-green-700 uppercase">User</p>
                <h2 class="mt-2 text-xl font-semibold text-gray-900">仕事を探す方</h2>
                <p class="mt-3 text-sm leading-6 text-gray-600">
                    募集中の求人を確認し、気になる求人への応募やお気に入り登録ができます。
                </p>

                <div class="flex flex-col gap-3 mt-6 sm:flex-row">
                    @auth('users')
                        <a href="{{ route('user.dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 rounded-md hover:bg-gray-700">
                            仕事を探す
                        </a>
                    @else
                        <a href="{{ route('user.login') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 rounded-md hover:bg-gray-700">
                            ログイン
                        </a>
                        <a href="{{ route('user.register') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                            新規登録
                        </a>
                    @endauth
                </div>
            </div>

            <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-lg">
                <p class="text-xs font-semibold tracking-widest text-green-700 uppercase">Owner</p>
                <h2 class="mt-2 text-xl font-semibold text-gray-900">求人を出す方</h2>
                <p class="mt-3 text-sm leading-6 text-gray-600">
                    求人の作成や編集、応募者情報の確認、採用可否の管理ができます。
                </p>

                <div class="flex flex-col gap-3 mt-6 sm:flex-row">
                    <a href="{{ route('owner.login') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 rounded-md hover:bg-gray-700">
                        ログイン
                    </a>
                    <a href="{{ route('owner.register') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                        新規登録
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
