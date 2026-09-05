<x-guest-layout>
    @if (Route::has('owner.login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth('owners')
                <a href="{{ url('/owner/dashboard') }}"
                    class="text-sm text-gray-700 dark:text-gray-500 underline">求人登録一覧</a>
            @else
                <a href="{{ route('owner.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>

                @if (Route::has('owner.register'))
                    <a href="{{ route('owner.register') }}"
                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">新規登録</a>
                @endif
            @endauth
        </div>
    @endif
    <x-auth-card>
        <div></div>
        <x-slot name="logo">
            <a href="/">
                <div class="w-28">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </div>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('owner.login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('メールアドレス')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('ログイン情報を保存する') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('owner.password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('owner.password.request') }}">
                        {{ __('パスワードを忘れた方') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('ログインする') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
