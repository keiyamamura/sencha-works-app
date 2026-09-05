<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('会員情報編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('user.info.update', ['id' => $user->id]) }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('名前')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                value="{{$user->name}}" required autofocus />
                        </div>

                        <!-- Age -->
                        <div class="mt-4">
                            <x-label for="age" :value="__('年齢')" />
                            <select name="age" id="age" required
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                <option value="">選択してください</option>
                                <option value="19" {{ $user->age == 19 ? 'selected' : '' }}>19歳</option>
                                <option value="20" {{ $user->age == 20 ? 'selected' : '' }}>20歳</option>
                                <option value="21" {{ $user->age == 21 ? 'selected' : '' }}>21歳</option>
                                <option value="22" {{ $user->age == 22 ? 'selected' : '' }}>22歳</option>
                                <option value="23" {{ $user->age == 23 ? 'selected' : '' }}>23歳</option>
                                <option value="24" {{ $user->age == 24 ? 'selected' : '' }}>24歳</option>
                                <option value="25" {{ $user->age == 25 ? 'selected' : '' }}>25歳</option>
                                <option value="26" {{ $user->age == 26 ? 'selected' : '' }}>26歳</option>
                                <option value="27" {{ $user->age == 27 ? 'selected' : '' }}>27歳</option>
                                <option value="28" {{ $user->age == 28 ? 'selected' : '' }}>28歳</option>
                                <option value="29" {{ $user->age == 29 ? 'selected' : '' }}>29歳</option>
                                <option value="30" {{ $user->age == 30 ? 'selected' : '' }}>30歳</option>
                                <option value="31" {{ $user->age == 31 ? 'selected' : '' }}>31歳</option>
                                <option value="32" {{ $user->age == 32 ? 'selected' : '' }}>32歳</option>
                                <option value="33" {{ $user->age == 33 ? 'selected' : '' }}>33歳</option>
                                <option value="34" {{ $user->age == 34 ? 'selected' : '' }}>34歳</option>
                                <option value="35" {{ $user->age == 35 ? 'selected' : '' }}>35歳</option>
                                <option value="36" {{ $user->age == 36 ? 'selected' : '' }}>36歳</option>
                                <option value="37" {{ $user->age == 37 ? 'selected' : '' }}>37歳</option>
                                <option value="38" {{ $user->age == 38 ? 'selected' : '' }}>38歳</option>
                                <option value="39" {{ $user->age == 39 ? 'selected' : '' }}>39歳</option>
                                <option value="40" {{ $user->age == 40 ? 'selected' : '' }}>40歳</option>
                                <option value="41" {{ $user->age == 41 ? 'selected' : '' }}>41歳</option>
                                <option value="42" {{ $user->age == 42 ? 'selected' : '' }}>42歳</option>
                                <option value="43" {{ $user->age == 43 ? 'selected' : '' }}>43歳</option>
                                <option value="44" {{ $user->age == 44 ? 'selected' : '' }}>44歳</option>
                                <option value="45" {{ $user->age == 45 ? 'selected' : '' }}>45歳</option>
                                <option value="46" {{ $user->age == 46 ? 'selected' : '' }}>46歳</option>
                                <option value="47" {{ $user->age == 47 ? 'selected' : '' }}>47歳</option>
                                <option value="48" {{ $user->age == 48 ? 'selected' : '' }}>48歳</option>
                                <option value="49" {{ $user->age == 49 ? 'selected' : '' }}>49歳</option>
                                <option value="50" {{ $user->age == 50 ? 'selected' : '' }}>50歳</option>
                                <option value="51" {{ $user->age == 51 ? 'selected' : '' }}>51歳</option>
                                <option value="52" {{ $user->age == 52 ? 'selected' : '' }}>52歳</option>
                                <option value="53" {{ $user->age == 53 ? 'selected' : '' }}>53歳</option>
                                <option value="54" {{ $user->age == 54 ? 'selected' : '' }}>54歳</option>
                                <option value="55" {{ $user->age == 55 ? 'selected' : '' }}>55歳</option>
                                <option value="56" {{ $user->age == 56 ? 'selected' : '' }}>56歳</option>
                                <option value="57" {{ $user->age == 57 ? 'selected' : '' }}>57歳</option>
                                <option value="58" {{ $user->age == 58 ? 'selected' : '' }}>58歳</option>
                                <option value="59" {{ $user->age == 59 ? 'selected' : '' }}>59歳</option>
                                <option value="60" {{ $user->age == 60 ? 'selected' : '' }}>60歳</option>
                                <option value="61" {{ $user->age == 61 ? 'selected' : '' }}>61歳</option>
                                <option value="62" {{ $user->age == 62 ? 'selected' : '' }}>62歳</option>
                                <option value="63" {{ $user->age == 63 ? 'selected' : '' }}>63歳</option>
                                <option value="64" {{ $user->age == 64 ? 'selected' : '' }}>64歳</option>
                                <option value="65" {{ $user->age == 65 ? 'selected' : '' }}>65歳</option>
                                <option value="66" {{ $user->age == 66 ? 'selected' : '' }}>66歳</option>
                                <option value="67" {{ $user->age == 67 ? 'selected' : '' }}>67歳</option>
                                <option value="68" {{ $user->age == 68 ? 'selected' : '' }}>68歳</option>
                                <option value="69" {{ $user->age == 69 ? 'selected' : '' }}>69歳</option>
                                <option value="70" {{ $user->age == 70 ? 'selected' : '' }}>70歳</option>
                            </select>
                            </select>
                        </div>

                        <!-- Gender -->
                        <div class="mt-4">
                            <x-label :value="__('性別')" />
                            <div class="flex">
                                <div class="mr-6 flex">
                                    <input id="male" type="radio" name="gender" value="0" required
                                        {{ $user->gender === 0 ? 'checked' : '' }} />
                                    <x-label for="male" :value="__('男性')" />
                                </div>
                                <div class="flex">
                                    <input id="female" type="radio" name="gender" value="1" required
                                        {{ $user->gender === 1 ? 'checked' : '' }} />
                                    <x-label for="female" :value="__('女性')" />
                                </div>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('メールアドレス')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                value="{{$user->email}}" required />
                        </div>

                        <!-- Prefectures -->
                        <div class="mt-4">
                            <x-label for="prefectures_id" :value="__('都道府県')" />
                            <select name="prefectures_id" id="prefectures_id" required
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                <option value="">選択してください</option>
                                <option value="1" {{ $user->prefectures_id == 1 ? 'selected' : '' }}>北海道</option>
                                <option value="2" {{ $user->prefectures_id == 2 ? 'selected' : '' }}>青森県</option>
                                <option value="3" {{ $user->prefectures_id == 3 ? 'selected' : '' }}>岩手県</option>
                                <option value="4" {{ $user->prefectures_id == 4 ? 'selected' : '' }}>宮城県</option>
                                <option value="5" {{ $user->prefectures_id == 5 ? 'selected' : '' }}>秋田県</option>
                                <option value="6" {{ $user->prefectures_id == 6 ? 'selected' : '' }}>山形県</option>
                                <option value="7" {{ $user->prefectures_id == 7 ? 'selected' : '' }}>福島県</option>
                                <option value="8" {{ $user->prefectures_id == 8 ? 'selected' : '' }}>茨城県</option>
                                <option value="9" {{ $user->prefectures_id == 9 ? 'selected' : '' }}>栃木県</option>
                                <option value="10" {{ $user->prefectures_id == 10 ? 'selected' : '' }}>群馬県
                                </option>
                                <option value="11" {{ $user->prefectures_id == 11 ? 'selected' : '' }}>埼玉県
                                </option>
                                <option value="12" {{ $user->prefectures_id == 12 ? 'selected' : '' }}>千葉県
                                </option>
                                <option value="13" {{ $user->prefectures_id == 13 ? 'selected' : '' }}>東京都
                                </option>
                                <option value="14" {{ $user->prefectures_id == 14 ? 'selected' : '' }}>神奈川県
                                </option>
                                <option value="15" {{ $user->prefectures_id == 15 ? 'selected' : '' }}>新潟県
                                </option>
                                <option value="16" {{ $user->prefectures_id == 16 ? 'selected' : '' }}>富山県
                                </option>
                                <option value="17" {{ $user->prefectures_id == 17 ? 'selected' : '' }}>石川県
                                </option>
                                <option value="18" {{ $user->prefectures_id == 18 ? 'selected' : '' }}>福井県
                                </option>
                                <option value="19" {{ $user->prefectures_id == 19 ? 'selected' : '' }}>山梨県
                                </option>
                                <option value="20" {{ $user->prefectures_id == 20 ? 'selected' : '' }}>長野県
                                </option>
                                <option value="21" {{ $user->prefectures_id == 21 ? 'selected' : '' }}>岐阜県
                                </option>
                                <option value="22" {{ $user->prefectures_id == 22 ? 'selected' : '' }}>静岡県
                                </option>
                                <option value="23" {{ $user->prefectures_id == 23 ? 'selected' : '' }}>愛知県
                                </option>
                                <option value="24" {{ $user->prefectures_id == 24 ? 'selected' : '' }}>三重県
                                </option>
                                <option value="25" {{ $user->prefectures_id == 25 ? 'selected' : '' }}>滋賀県
                                </option>
                                <option value="26" {{ $user->prefectures_id == 26 ? 'selected' : '' }}>京都府
                                </option>
                                <option value="27" {{ $user->prefectures_id == 27 ? 'selected' : '' }}>大阪府
                                </option>
                                <option value="28" {{ $user->prefectures_id == 28 ? 'selected' : '' }}>兵庫県
                                </option>
                                <option value="29" {{ $user->prefectures_id == 29 ? 'selected' : '' }}>奈良県
                                </option>
                                <option value="30" {{ $user->prefectures_id == 30 ? 'selected' : '' }}>和歌山県
                                </option>
                                <option value="31" {{ $user->prefectures_id == 31 ? 'selected' : '' }}>鳥取県
                                </option>
                                <option value="32" {{ $user->prefectures_id == 32 ? 'selected' : '' }}>島根県
                                </option>
                                <option value="33" {{ $user->prefectures_id == 33 ? 'selected' : '' }}>岡山県
                                </option>
                                <option value="34" {{ $user->prefectures_id == 34 ? 'selected' : '' }}>広島県
                                </option>
                                <option value="35" {{ $user->prefectures_id == 35 ? 'selected' : '' }}>山口県
                                </option>
                                <option value="36" {{ $user->prefectures_id == 36 ? 'selected' : '' }}>徳島県
                                </option>
                                <option value="37" {{ $user->prefectures_id == 37 ? 'selected' : '' }}>香川県
                                </option>
                                <option value="38" {{ $user->prefectures_id == 38 ? 'selected' : '' }}>愛媛県
                                </option>
                                <option value="39" {{ $user->prefectures_id == 39 ? 'selected' : '' }}>高知県
                                </option>
                                <option value="40" {{ $user->prefectures_id == 40 ? 'selected' : '' }}>福岡県
                                </option>
                                <option value="41" {{ $user->prefectures_id == 41 ? 'selected' : '' }}>佐賀県
                                </option>
                                <option value="42" {{ $user->prefectures_id == 42 ? 'selected' : '' }}>長崎県
                                </option>
                                <option value="43" {{ $user->prefectures_id == 43 ? 'selected' : '' }}>熊本県
                                </option>
                                <option value="44" {{ $user->prefectures_id == 44 ? 'selected' : '' }}>大分県
                                </option>
                                <option value="45" {{ $user->prefectures_id == 45 ? 'selected' : '' }}>宮崎県
                                </option>
                                <option value="46" {{ $user->prefectures_id == 46 ? 'selected' : '' }}>鹿児島県
                                </option>
                                <option value="47" {{ $user->prefectures_id == 47 ? 'selected' : '' }}>沖縄県
                                </option>
                            </select>
                            </select>
                        </div>

                        <!-- Municipalities -->
                        <div class="mt-4">
                            <x-label for="municipalities" :value="__('住所')" />

                            <x-input id="municipalities" class="block mt-1 w-full" type="text"
                                name="municipalities" value="{{$user->municipalities}}" required autofocus />
                        </div>

                       <!-- Current_job -->
                        <div class="mt-4">
                            <x-label for="current_job" :value="__('現在のご職業')" />
                            <select name="current_job" id="current_job" required
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                <option value="">選択してください</option>
                                <option value="1" {{ $user->current_job == 1 ? 'selected' : '' }}>公務員</option>
                                <option value="2" {{ $user->current_job == 2 ? 'selected' : '' }}>経営者・役員</option>
                                <option value="3" {{ $user->current_job == 3 ? 'selected' : '' }}>会社員</option>
                                <option value="4" {{ $user->current_job == 4 ? 'selected' : '' }}>自営業</option>
                                <option value="5" {{ $user->current_job == 5 ? 'selected' : '' }}>専業主婦</option>
                                <option value="6" {{ $user->current_job == 6 ? 'selected' : '' }}>パート・アルバイト</option>
                                <option value="7" {{ $user->current_job == 7 ? 'selected' : '' }}>学生</option>
                                <option value="8" {{ $user->current_job == 8 ? 'selected' : '' }}>その他</option>
                            </select>
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('更新する') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
