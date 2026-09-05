<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('求人更新') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('owner.job.update', ['id' => $job->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <x-flash-message status="info" />

                        <section class="text-gray-600 body-font overflow-hidden">
                            <div class="lg:px-5 mx-auto">
                                <div class="flex flex-wrap mb-4">
                                    {{-- Left --}}
                                    <div class="md:p-2 lg:p-12 md:w-1/2 flex flex-col">
                                        <div class="flex flex-wrap sm:mb-4 -m-2">
                                            {{-- Title --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="title" :value="__('タイトル')" />
                                                    <input type="text" id="title" name="title"
                                                        value="{{ old('title') ?? $job->title }}" required
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div> {{-- /Title --}}

                                            {{-- Description --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="description" :value="__('説明文')" />
                                                    <textarea id="description" name="description" required
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('description') ?? $job->description }}</textarea>
                                                </div>
                                            </div> {{-- /Description --}}

                                            {{-- Prefecture --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="prefectures_id" :value="__('都道府県')" />
                                                    <select name="prefectures_id" id="prefectures_id" required
                                                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                                        <option value="">選択してください</option>
                                                        <option value="1"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 1 ? 'selected' : '' }}>
                                                            北海道
                                                        </option>
                                                        <option value="2"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 2 ? 'selected' : '' }}>
                                                            青森県
                                                        </option>
                                                        <option value="3"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 3 ? 'selected' : '' }}>
                                                            岩手県
                                                        </option>
                                                        <option value="4"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 4 ? 'selected' : '' }}>
                                                            宮城県
                                                        </option>
                                                        <option value="5"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 5 ? 'selected' : '' }}>
                                                            秋田県
                                                        </option>
                                                        <option value="6"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 6 ? 'selected' : '' }}>
                                                            山形県
                                                        </option>
                                                        <option value="7"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 7 ? 'selected' : '' }}>
                                                            福島県
                                                        </option>
                                                        <option value="8"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 8 ? 'selected' : '' }}>
                                                            茨城県
                                                        </option>
                                                        <option value="9"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 9 ? 'selected' : '' }}>
                                                            栃木県
                                                        </option>
                                                        <option value="10"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 10 ? 'selected' : '' }}>
                                                            群馬県
                                                        </option>
                                                        <option value="11"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 11 ? 'selected' : '' }}>
                                                            埼玉県
                                                        </option>
                                                        <option value="12"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 12 ? 'selected' : '' }}>
                                                            千葉県
                                                        </option>
                                                        <option value="13"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 13 ? 'selected' : '' }}>
                                                            東京都
                                                        </option>
                                                        <option value="14"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 14 ? 'selected' : '' }}>
                                                            神奈川県
                                                        </option>
                                                        <option value="15"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 15 ? 'selected' : '' }}>
                                                            新潟県
                                                        </option>
                                                        <option value="16"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 16 ? 'selected' : '' }}>
                                                            富山県
                                                        </option>
                                                        <option value="17"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 17 ? 'selected' : '' }}>
                                                            石川県
                                                        </option>
                                                        <option value="18"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 18 ? 'selected' : '' }}>
                                                            福井県
                                                        </option>
                                                        <option value="19"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 19 ? 'selected' : '' }}>
                                                            山梨県
                                                        </option>
                                                        <option value="20"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 20 ? 'selected' : '' }}>
                                                            長野県
                                                        </option>
                                                        <option value="21"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 21 ? 'selected' : '' }}>
                                                            岐阜県
                                                        </option>
                                                        <option value="22"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 22 ? 'selected' : '' }}>
                                                            静岡県
                                                        </option>
                                                        <option value="23"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 23 ? 'selected' : '' }}>
                                                            愛知県
                                                        </option>
                                                        <option value="24"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 24 ? 'selected' : '' }}>
                                                            三重県
                                                        </option>
                                                        <option value="25"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 25 ? 'selected' : '' }}>
                                                            滋賀県
                                                        </option>
                                                        <option value="26"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 26 ? 'selected' : '' }}>
                                                            京都府
                                                        </option>
                                                        <option value="27"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 27 ? 'selected' : '' }}>
                                                            大阪府
                                                        </option>
                                                        <option value="28"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 28 ? 'selected' : '' }}>
                                                            兵庫県
                                                        </option>
                                                        <option value="29"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 29 ? 'selected' : '' }}>
                                                            奈良県
                                                        </option>
                                                        <option value="30"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 30 ? 'selected' : '' }}>
                                                            和歌山県
                                                        </option>
                                                        <option value="31"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 31 ? 'selected' : '' }}>
                                                            鳥取県
                                                        </option>
                                                        <option value="32"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 32 ? 'selected' : '' }}>
                                                            島根県
                                                        </option>
                                                        <option value="33"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 33 ? 'selected' : '' }}>
                                                            岡山県
                                                        </option>
                                                        <option value="34"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 34 ? 'selected' : '' }}>
                                                            広島県
                                                        </option>
                                                        <option value="35"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 35 ? 'selected' : '' }}>
                                                            山口県
                                                        </option>
                                                        <option value="36"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 36 ? 'selected' : '' }}>
                                                            徳島県
                                                        </option>
                                                        <option value="37"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 37 ? 'selected' : '' }}>
                                                            香川県
                                                        </option>
                                                        <option value="38"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 38 ? 'selected' : '' }}>
                                                            愛媛県
                                                        </option>
                                                        <option value="39"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 39 ? 'selected' : '' }}>
                                                            高知県
                                                        </option>
                                                        <option value="40"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 40 ? 'selected' : '' }}>
                                                            福岡県
                                                        </option>
                                                        <option value="41"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 41 ? 'selected' : '' }}>
                                                            佐賀県
                                                        </option>
                                                        <option value="42"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 42 ? 'selected' : '' }}>
                                                            長崎県
                                                        </option>
                                                        <option value="43"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 43 ? 'selected' : '' }}>
                                                            熊本県
                                                        </option>
                                                        <option value="44"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 44 ? 'selected' : '' }}>
                                                            大分県
                                                        </option>
                                                        <option value="45"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 45 ? 'selected' : '' }}>
                                                            宮崎県
                                                        </option>
                                                        <option value="46"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 46 ? 'selected' : '' }}>
                                                            鹿児島県
                                                        </option>
                                                        <option value="47"
                                                            {{ old('prefectures_id') ?? $job->prefectures_id == 47 ? 'selected' : '' }}>
                                                            沖縄県
                                                        </option>
                                                    </select>
                                                </div>
                                            </div> {{-- /Prefecture --}}

                                            {{-- /Status --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="status" :value="__('雇用形態')" />
                                                    <select name="status" id="status" required
                                                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                                        <option value="">選択してください</option>
                                                        <option value="1"
                                                            {{ old('status') ?? $job->status == 1 ? 'selected' : '' }}>
                                                            正社員</option>
                                                        <option value="2"
                                                            {{ old('status') ?? $job->status == 2 ? 'selected' : '' }}>
                                                            派遣</option>
                                                        <option value="3"
                                                            {{ old('status') ?? $job->status == 3 ? 'selected' : '' }}>
                                                            アルバイト</option>
                                                    </select>
                                                </div>
                                            </div> {{-- /Status --}}
                                        </div>
                                    </div> {{-- /Left --}}

                                    {{-- Right --}}
                                    <div class="md:p-2 lg:p-12 md:w-1/2 flex flex-col">
                                        <div class="flex flex-wrap -m-2">

                                            {{-- Salaly --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label :value="__('給与')" />
                                                    <div class="flex flex-col">
                                                        <div class="flex">
                                                            <div class="flex mr-6">
                                                                <input id="monthly_salary" type="radio"
                                                                    name="wage_type" value="0" required
                                                                    {{ old('wage_type') ?? $job->wage_type == 0 ? 'checked' : '' }} />
                                                                <x-label for="monthly_salary" :value="__('月給')" />
                                                            </div>
                                                            <div class="flex">
                                                                <input id="hourly_wage" type="radio"
                                                                    name="wage_type" value="1" required
                                                                    {{ old('wage_type') ?? $job->wage_type == 1 ? 'checked' : '' }} />
                                                                <x-label for="hourly_wage" :value="__('時給')" />
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input type="text" id="salary_amount"
                                                                name="salary_amount"
                                                                value="{{ old('salary_amount') ?? $job->salary_amount}}"
                                                                required
                                                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mr-2">
                                                                <span>円</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>{{-- /Salaly --}}

                                            {{-- Img --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="img" :value="__('画像')" />
                                                    <div class="w-32">
                                                        <x-thumbnail :filename="$job->img_path" />
                                                    </div>
                                                    <input type="file" id="img" name="img"
                                                        accept="image/png,image/jpeg,image/jpg"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div> {{-- /Img --}}

                                            {{-- Qualifications --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="age" :value="__('年齢')" />
                                                    <select name="age" id="age" required
                                                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                                        <option value="">選択してください</option>
                                                        <option value="1"
                                                            {{ old('age') ?? $job->age == 1 ? 'selected' : '' }}>
                                                            ~19歳</option>
                                                        <option value="2"
                                                            {{ old('age') ?? $job->age == 2 ? 'selected' : '' }}>
                                                            20歳~29歳</option>
                                                        <option value="3"
                                                            {{ old('age') ?? $job->age == 3 ? 'selected' : '' }}>
                                                            30歳~39歳</option>
                                                        <option value="4"
                                                            {{ old('age') ?? $job->age == 4 ? 'selected' : '' }}>
                                                            40歳~</option>
                                                        <option value="5"
                                                            {{ old('age') ?? $job->age == 4 ? 'selected' : '' }}>
                                                            年齢制限なし</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="license" :value="__('車免許')" />
                                                    <select name="license" id="license" required
                                                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                                        <option value="">選択してください</option>
                                                        <option value="1"
                                                            {{ old('license') ?? $job->license == 1 ? 'selected' : '' }}>
                                                            AT</option>
                                                        <option value="2"
                                                            {{ old('license') ?? $job->license == 2 ? 'selected' : '' }}>
                                                            MT</option>
                                                        <option value="3"
                                                            {{ old('license') ?? $job->license == 3 ? 'selected' : '' }}>
                                                            不問</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="experience" :value="__('経験')" />
                                                    <select name="experience" id="experience" required
                                                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                                        <option value="">選択してください</option>
                                                        <option value="1"
                                                            {{ old('experience') ?? $job->experience == 1 ? 'selected' : '' }}>
                                                            経験者</option>
                                                        <option value="2"
                                                            {{ old('experience') ?? $job->experience == 2 ? 'selected' : '' }}>
                                                            未経験者歓迎</option>
                                                    </select>
                                                </div>
                                            </div>{{-- /Qualifications --}}
                                        </div>
                                    </div> {{-- /Right --}}
                                </div>

                                <fieldset class="container lg:max-w-3xl border border-gray-300 rounded mx-auto">
                                    <legend class="text-md">会社概要</legend>
                                    {{-- Company_name --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <x-label for="company_name" :value="__('会社名')" />
                                            <input type="text" id="company_name" name="company_name"
                                                value="{{ old('company_name') ?? $job->company_name }}" required
                                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <x-label for="company_tel" :value="__('電話番号')" />
                                            <input type="tel" id="company_tel" name="company_tel"
                                                value="{{ old('company_tel') ?? $job->company_tel }}" required
                                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <x-label for="company_email" :value="__('メールアドレス')" />
                                            <input type="email" id="company_email" name="company_email"
                                                value="{{ old('company_email') ?? $job->company_email }}" required
                                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                </fieldset> {{-- /Company_name --}}
                            </div>
                        </section>
                        <div class="flex items-start justify-between mt-8">
                            <x-a href="{{ route('owner.dashboard') }} " class="bg-red-500 hover:bg-red-400">戻る</x-a>
                            <input type="submit" value="更新する"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" />
                        </div>
                    </form>
                    <div class="mt-5 text-right">
                        <form action="{{ route('owner.job.destroy', ['id' => $job->id]) }}" method="post">
                            @csrf
                            {{-- <input type="submit" value="削除する" data-id="{{ $job->id }}" onclick="deleteJob(this)" --}}
                            <input type="submit" value="削除する" data-id="{{ $job->id }}" onclick="return confirm('本当に削除しますか？')"
                                class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
