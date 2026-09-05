<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('応募者確認') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" />
                    <section class="text-gray-600 body-font overflow-hidden">
                        <div class="container pt-6">
                            <div class="flex flex-col md:flex-row py-10 border-b border-gray-200">
                                <div class="w-full md:w-1/4 rounded-lg overflow-hidden">
                                    <div class="rounded-lg">
                                        <x-thumbnail :filename="$job->img_path" />
                                    </div>
                                    <fieldset class="border border-gray-300 rounded mx-auto mt-3">
                                        <legend class="text-md">会社概要</legend>
                                        {{-- Company_name --}}
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <x-label for="company_name" :value="__('会社名')" />
                                                <x-input id="company_name" type="text" name="company_name"
                                                    value="{{ $job->company_name }}" disabled
                                                    class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                            </div>
                                        </div>

                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <x-label for="company_tel" :value="__('電話番号')" />
                                                <x-input id="company_tel" type="text" name="company_tel"
                                                    value="{{ $job->company_tel }}" disabled
                                                    class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                            </div>
                                        </div>

                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <x-label for="company_email" :value="__('メールアドレス')" />
                                                <x-input id="company_email" type="text" name="company_email"
                                                    value="{{ $job->company_email }}" disabled
                                                    class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                            </div>
                                    </fieldset> {{-- /Company_name --}}
                                </div>
                                {{-- Right --}}
                                <div class="lg:w-3/4 w-full lg:pl-10 mt-6 lg:mt-0">
                                    <div class="border-b-2 border-gray-300">
                                        <h2 class="text-gray-900 text-2xl title-font font-medium">
                                            {{ $job->title }}
                                        </h2>
                                    </div>

                                    {{-- Description --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <x-label for="description" :value="__('説明文')" />
                                            <textarea id="description" name="description" disabled="true"
                                                class="w-full bg-gray-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $job->description }}</textarea>
                                        </div>
                                    </div> {{-- /Description --}}

                                    <div class="flex justify-around items-start">
                                        <div class="flex w-1/2 border-r-2 border-gray-300 pr-3">
                                            <div class="flex flex-col">
                                                <div class="flex flex-wrap sm:mb-4 -m-2">
                                                    {{-- Prefecture --}}
                                                    <div class="p-2 w-full">
                                                        <div class="relative">
                                                            <x-label for="prefectures_id" :value="__('都道府県')" />

                                                            <x-input id="prefectures_id" type="text"
                                                                name="prefectures_id" value="{{ $prefecture }}"
                                                                disabled
                                                                class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                        </div>
                                                    </div> {{-- /Prefecture --}}

                                                    {{-- /Status --}}
                                                    <div class="p-2 w-full">
                                                        <div class="relative">
                                                            <x-label for="status" :value="__('雇用形態')" />

                                                            <x-input id="status" type="text" name="status"
                                                                value="{{ $status }}" disabled
                                                                class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                        </div>
                                                    </div> {{-- /Status --}}

                                                    {{-- Salaly --}}
                                                    <div class="p-2 w-full">
                                                        <div class="relative">
                                                            <x-label :value="__('給与')" />
                                                            <div class="flex flex-col">
                                                                <div class="flex">
                                                                    <div class="flex mr-6">
                                                                        <input id="monthly_salary" type="radio"
                                                                            name="wage_type" value="0"
                                                                            disabled="true"
                                                                            {{ $job->wage_type == 0 ? 'checked' : '' }} />
                                                                        <x-label for="monthly_salary"
                                                                            :value="__('月給')" />
                                                                    </div>
                                                                    <div class="flex">
                                                                        <input id="hourly_wage" type="radio"
                                                                            name="wage_type" value="1"
                                                                            disabled="true"
                                                                            {{ $job->wage_type == 1 ? 'checked' : '' }} />
                                                                        <x-label for="hourly_wage" :value="__('時給')" />
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <x-input type="text" name="salary_amount"
                                                                        value="{{ $job->salary_amount . ' 円'}}" disabled
                                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>{{-- /Salaly --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-col w-1/2 pl-3">
                                            {{-- Qualifications --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="age" :value="__('年齢')" />
                                                    <x-input id="age" type="text" name="age"
                                                        value="{{ $age_limit }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="license" :value="__('車免許')" />
                                                    <x-input id="license" type="text" name="license"
                                                        value="{{ $license }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="experience" :value="__('経験')" />
                                                    <x-input id="experience" type="text" name="experience"
                                                        value="{{ $experience }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                </div>
                                            </div>{{-- /Qualifications --}}
                                        </div>
                                    </div>
                                </div>{{-- Right --}}
                            </div>
                        </div>
                    </section>

                    <section class="text-gray-600 body-font overflow-hidden">
                        <div class="container pb-6 border-b-2 border-gray-100">
                            <div class="flex flex-col justify-center md:flex-row">
                                <div class="lg:w-3/4 w-full mt-6 lg:mt-0">
                                    <div class="border-b-2 border-gray-300 mt-10">
                                        <h1 class="text-gray-900 text-3xl title-font font-medium text-center pb-4">
                                            応募者情報
                                        </h1>
                                    </div>
                                    {{-- <span class="text-sm">{!! nl2br(e($job->description)) !!}</span> --}}
                                    <div class="flex justify-around mt-6 items-start pb-5 my-5">
                                        <div class="flex flex-col w-1/2 border-r-2 border-gray-300 pr-3">
                                            <div class="flex flex-wrap sm:mb-4 -m-2">
                                                {{-- UserName --}}
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <x-label for="name" :value="__('氏名')" />
                                                        <x-input id="name" type="text" name="name"
                                                            value="{{ $user->name }}" disabled
                                                            class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                    </div>
                                                </div> {{-- /UserName --}}
                                                {{-- UserAge --}}
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <x-label for="age" :value="__('年齢')" />
                                                        <x-input id="age" type="text" name="age"
                                                            value="{{ $user_age }}" disabled
                                                            class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                    </div>
                                                </div> {{-- /UserAge --}}
                                                {{-- UserGender --}}
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <x-label for="gender" :value="__('性別')" />
                                                        <x-input id="gender" type="text" name="gender"
                                                            value="{{ $user_gender }}" disabled
                                                            class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                    </div>
                                                </div> {{-- /UserGender --}}
                                            </div>
                                        </div>

                                        <div class="flex flex-col w-1/2 pl-3">
                                            <div class="flex flex-wrap sm:mb-4 -m-2">
                                                {{-- UserPrefecture --}}
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <x-label for="prefecture" :value="__('都道府県')" />
                                                        <x-input id="prefecture" type="text" name="prefecture"
                                                            value="{{ $user_prefecture }}" disabled
                                                            class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                    </div>
                                                </div> {{-- /UserPrefecture --}}
                                                {{-- UserMunicipalities --}}
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <x-label for="municipalities" :value="__('住所')" />
                                                        <x-input id="municipalities" type="text"
                                                            name="municipalities" value="{{ $user->municipalities }}"
                                                            disabled
                                                            class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                    </div>
                                                </div> {{-- /UserMunicipalities --}}
                                                {{-- UserCurrentJob --}}
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <x-label for="current_job" :value="__('現在の職業')" />
                                                        <x-input id="current_job" type="text" name="current_job"
                                                            value="{{ $user_current_job }}" disabled
                                                            class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                    </div>
                                                </div> {{-- /UserCurrentJob --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between mt-5">
                            <div>
                                <form
                                    action="{{ route('owner.applicant.destroy', ['user' => $user->id, 'job' => $job->id]) }}"
                                    method="post">
                                    @csrf
                                    <input type="submit" value="承諾しない" onclick="return confirm('承諾しないでよろしいですか？')"
                                        class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" />
                                </form>
                            </div>
                            <div>
                                <form
                                    action="{{ route('owner.applicant.consent', ['user' => $user->id, 'job' => $job->id]) }}"
                                    method="post">
                                    @csrf
                                    <input type="submit" value="承諾する" onclick="return confirm('承諾してよろしいですか？')"
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" />
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
