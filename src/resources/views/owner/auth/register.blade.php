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
        <x-slot name="logo">
            <a href="/">
                <div class="w-28">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </div>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('owner.register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('名前')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
            </div>

            <!-- Age -->
            <div class="mt-4">
                <x-label for="age" :value="__('年齢')" />
                <select name="age" id="age" required
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                    <option value="">選択してください</option>
                    <option value="19" {{ old('age') == 19 ? 'selected' : '' }}>19歳</option>
                    <option value="20" {{ old('age') == 20 ? 'selected' : '' }}>20歳</option>
                    <option value="21" {{ old('age') == 21 ? 'selected' : '' }}>21歳</option>
                    <option value="22" {{ old('age') == 22 ? 'selected' : '' }}>22歳</option>
                    <option value="23" {{ old('age') == 23 ? 'selected' : '' }}>23歳</option>
                    <option value="24" {{ old('age') == 24 ? 'selected' : '' }}>24歳</option>
                    <option value="25" {{ old('age') == 25 ? 'selected' : '' }}>25歳</option>
                    <option value="26" {{ old('age') == 26 ? 'selected' : '' }}>26歳</option>
                    <option value="27" {{ old('age') == 27 ? 'selected' : '' }}>27歳</option>
                    <option value="28" {{ old('age') == 28 ? 'selected' : '' }}>28歳</option>
                    <option value="29" {{ old('age') == 29 ? 'selected' : '' }}>29歳</option>
                    <option value="30" {{ old('age') == 30 ? 'selected' : '' }}>30歳</option>
                    <option value="31" {{ old('age') == 31 ? 'selected' : '' }}>31歳</option>
                    <option value="32" {{ old('age') == 32 ? 'selected' : '' }}>32歳</option>
                    <option value="33" {{ old('age') == 33 ? 'selected' : '' }}>33歳</option>
                    <option value="34" {{ old('age') == 34 ? 'selected' : '' }}>34歳</option>
                    <option value="35" {{ old('age') == 35 ? 'selected' : '' }}>35歳</option>
                    <option value="36" {{ old('age') == 36 ? 'selected' : '' }}>36歳</option>
                    <option value="37" {{ old('age') == 37 ? 'selected' : '' }}>37歳</option>
                    <option value="38" {{ old('age') == 38 ? 'selected' : '' }}>38歳</option>
                    <option value="39" {{ old('age') == 39 ? 'selected' : '' }}>39歳</option>
                    <option value="40" {{ old('age') == 40 ? 'selected' : '' }}>40歳</option>
                    <option value="41" {{ old('age') == 41 ? 'selected' : '' }}>41歳</option>
                    <option value="42" {{ old('age') == 42 ? 'selected' : '' }}>42歳</option>
                    <option value="43" {{ old('age') == 43 ? 'selected' : '' }}>43歳</option>
                    <option value="44" {{ old('age') == 44 ? 'selected' : '' }}>44歳</option>
                    <option value="45" {{ old('age') == 45 ? 'selected' : '' }}>45歳</option>
                    <option value="46" {{ old('age') == 46 ? 'selected' : '' }}>46歳</option>
                    <option value="47" {{ old('age') == 47 ? 'selected' : '' }}>47歳</option>
                    <option value="48" {{ old('age') == 48 ? 'selected' : '' }}>48歳</option>
                    <option value="49" {{ old('age') == 49 ? 'selected' : '' }}>49歳</option>
                    <option value="50" {{ old('age') == 50 ? 'selected' : '' }}>50歳</option>
                    <option value="51" {{ old('age') == 51 ? 'selected' : '' }}>51歳</option>
                    <option value="52" {{ old('age') == 52 ? 'selected' : '' }}>52歳</option>
                    <option value="53" {{ old('age') == 53 ? 'selected' : '' }}>53歳</option>
                    <option value="54" {{ old('age') == 54 ? 'selected' : '' }}>54歳</option>
                    <option value="55" {{ old('age') == 55 ? 'selected' : '' }}>55歳</option>
                    <option value="56" {{ old('age') == 56 ? 'selected' : '' }}>56歳</option>
                    <option value="57" {{ old('age') == 57 ? 'selected' : '' }}>57歳</option>
                    <option value="58" {{ old('age') == 58 ? 'selected' : '' }}>58歳</option>
                    <option value="59" {{ old('age') == 59 ? 'selected' : '' }}>59歳</option>
                    <option value="60" {{ old('age') == 60 ? 'selected' : '' }}>60歳</option>
                    <option value="61" {{ old('age') == 61 ? 'selected' : '' }}>61歳</option>
                    <option value="62" {{ old('age') == 62 ? 'selected' : '' }}>62歳</option>
                    <option value="63" {{ old('age') == 63 ? 'selected' : '' }}>63歳</option>
                    <option value="64" {{ old('age') == 64 ? 'selected' : '' }}>64歳</option>
                    <option value="65" {{ old('age') == 65 ? 'selected' : '' }}>65歳</option>
                    <option value="66" {{ old('age') == 66 ? 'selected' : '' }}>66歳</option>
                    <option value="67" {{ old('age') == 67 ? 'selected' : '' }}>67歳</option>
                    <option value="68" {{ old('age') == 68 ? 'selected' : '' }}>68歳</option>
                    <option value="69" {{ old('age') == 69 ? 'selected' : '' }}>69歳</option>
                    <option value="70" {{ old('age') == 70 ? 'selected' : '' }}>70歳</option>
                </select>
                </select>
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-label :value="__('性別')" />
                <div class="flex">
                    <div class="mr-6 flex">
                        <input id="male" type="radio" name="gender" value="0" required
                            {{ old('gender') == 0 ? 'checked' : '' }} />
                        <x-label for="male" :value="__('男性')" />
                    </div>
                    <div class="flex">
                        <input id="female" type="radio" name="gender" value="1" required
                            {{ old('gender') == 1 ? 'checked' : '' }} />
                        <x-label for="female" :value="__('女性')" />
                    </div>
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('メールアドレス')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Prefectures -->
            <div class="mt-4">
                <x-label for="prefectures_id" :value="__('都道府県')" />
                <select name="prefectures_id" id="prefectures_id" required
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                    <option value="">選択してください</option>
                    <option value="1" {{ old('prefectures_id') == 1 ? 'selected' : '' }}>北海道</option>
                    <option value="2" {{ old('prefectures_id') == 2 ? 'selected' : '' }}>青森県</option>
                    <option value="3" {{ old('prefectures_id') == 3 ? 'selected' : '' }}>岩手県</option>
                    <option value="4" {{ old('prefectures_id') == 4 ? 'selected' : '' }}>宮城県</option>
                    <option value="5" {{ old('prefectures_id') == 5 ? 'selected' : '' }}>秋田県</option>
                    <option value="6" {{ old('prefectures_id') == 6 ? 'selected' : '' }}>山形県</option>
                    <option value="7" {{ old('prefectures_id') == 7 ? 'selected' : '' }}>福島県</option>
                    <option value="8" {{ old('prefectures_id') == 8 ? 'selected' : '' }}>茨城県</option>
                    <option value="9" {{ old('prefectures_id') == 9 ? 'selected' : '' }}>栃木県</option>
                    <option value="10" {{ old('prefectures_id') == 10 ? 'selected' : '' }}>群馬県</option>
                    <option value="11" {{ old('prefectures_id') == 11 ? 'selected' : '' }}>埼玉県</option>
                    <option value="12" {{ old('prefectures_id') == 12 ? 'selected' : '' }}>千葉県</option>
                    <option value="13" {{ old('prefectures_id') == 13 ? 'selected' : '' }}>東京都</option>
                    <option value="14" {{ old('prefectures_id') == 14 ? 'selected' : '' }}>神奈川県</option>
                    <option value="15" {{ old('prefectures_id') == 15 ? 'selected' : '' }}>新潟県</option>
                    <option value="16" {{ old('prefectures_id') == 16 ? 'selected' : '' }}>富山県</option>
                    <option value="17" {{ old('prefectures_id') == 17 ? 'selected' : '' }}>石川県</option>
                    <option value="18" {{ old('prefectures_id') == 18 ? 'selected' : '' }}>福井県</option>
                    <option value="19" {{ old('prefectures_id') == 19 ? 'selected' : '' }}>山梨県</option>
                    <option value="20" {{ old('prefectures_id') == 20 ? 'selected' : '' }}>長野県</option>
                    <option value="21" {{ old('prefectures_id') == 21 ? 'selected' : '' }}>岐阜県</option>
                    <option value="22" {{ old('prefectures_id') == 22 ? 'selected' : '' }}>静岡県</option>
                    <option value="23" {{ old('prefectures_id') == 23 ? 'selected' : '' }}>愛知県</option>
                    <option value="24" {{ old('prefectures_id') == 24 ? 'selected' : '' }}>三重県</option>
                    <option value="25" {{ old('prefectures_id') == 25 ? 'selected' : '' }}>滋賀県</option>
                    <option value="26" {{ old('prefectures_id') == 26 ? 'selected' : '' }}>京都府</option>
                    <option value="27" {{ old('prefectures_id') == 27 ? 'selected' : '' }}>大阪府</option>
                    <option value="28" {{ old('prefectures_id') == 28 ? 'selected' : '' }}>兵庫県</option>
                    <option value="29" {{ old('prefectures_id') == 29 ? 'selected' : '' }}>奈良県</option>
                    <option value="30" {{ old('prefectures_id') == 30 ? 'selected' : '' }}>和歌山県</option>
                    <option value="31" {{ old('prefectures_id') == 31 ? 'selected' : '' }}>鳥取県</option>
                    <option value="32" {{ old('prefectures_id') == 32 ? 'selected' : '' }}>島根県</option>
                    <option value="33" {{ old('prefectures_id') == 33 ? 'selected' : '' }}>岡山県</option>
                    <option value="34" {{ old('prefectures_id') == 34 ? 'selected' : '' }}>広島県</option>
                    <option value="35" {{ old('prefectures_id') == 35 ? 'selected' : '' }}>山口県</option>
                    <option value="36" {{ old('prefectures_id') == 36 ? 'selected' : '' }}>徳島県</option>
                    <option value="37" {{ old('prefectures_id') == 37 ? 'selected' : '' }}>香川県</option>
                    <option value="38" {{ old('prefectures_id') == 38 ? 'selected' : '' }}>愛媛県</option>
                    <option value="39" {{ old('prefectures_id') == 39 ? 'selected' : '' }}>高知県</option>
                    <option value="40" {{ old('prefectures_id') == 40 ? 'selected' : '' }}>福岡県</option>
                    <option value="41" {{ old('prefectures_id') == 41 ? 'selected' : '' }}>佐賀県</option>
                    <option value="42" {{ old('prefectures_id') == 42 ? 'selected' : '' }}>長崎県</option>
                    <option value="43" {{ old('prefectures_id') == 43 ? 'selected' : '' }}>熊本県</option>
                    <option value="44" {{ old('prefectures_id') == 44 ? 'selected' : '' }}>大分県</option>
                    <option value="45" {{ old('prefectures_id') == 45 ? 'selected' : '' }}>宮崎県</option>
                    <option value="46" {{ old('prefectures_id') == 46 ? 'selected' : '' }}>鹿児島県</option>
                    <option value="47" {{ old('prefectures_id') == 47 ? 'selected' : '' }}>沖縄県</option>
                </select>
                </select>
            </div>

            <!-- Municipalities -->
            <div class="mt-4">
                <x-label for="municipalities" :value="__('住所')" />

                <x-input id="municipalities" class="block mt-1 w-full" type="text" name="municipalities"
                    :value="old('municipalities')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('パスワード確認')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('owner.login') }}">
                    {{ __('登録済みの方はこちら') }}
                </a>

                <x-button class="ml-4">
                    {{ __('登録する') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
