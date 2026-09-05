<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('求人登録確認') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('owner.job.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            <h1 class="text-3xl text-center">この内容で登録しますか？</h1>
                        </div>
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
                                                    <x-input id="title" type="text" name="title"
                                                        value="{{ $input['title'] }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                </div>
                                            </div> {{-- /Title --}}

                                            {{-- Description --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="description" :value="__('説明文')" />
                                                    <textarea id="description" name="description" disabled="true"
                                                        class="w-full bg-gray-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $input['description'] }}</textarea>
                                                </div>
                                            </div> {{-- /Description --}}

                                            {{-- Prefecture --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="prefectures_id" :value="__('都道府県')" />

                                                    <x-input id="prefectures_id" type="text" name="prefectures_id"
                                                        value="{{ $prefecture }}" disabled
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
                                                                    name="wage_type" value="0"
                                                                    disabled="true"
                                                                    {{ $input['wage_type'] == 0 ? 'checked' : '' }} />
                                                                <x-label for="monthly_salary" :value="__('月給')" />
                                                            </div>
                                                            <div class="flex">
                                                                <input id="hourly_wage" type="radio" name="wage_type"
                                                                    value="1" disabled="true"
                                                                    {{ $input['wage_type'] == 1 ? 'checked' : '' }} />
                                                                <x-label for="hourly_wage" :value="__('時給')" />
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <x-input type="text" name="salary_amount"
                                                                value="{{ $input['salary_amount'] }}" disabled
                                                                class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
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
                                                            <x-thumbnail :filename="$imagePath" />
                                                        </div>
                                                </div>
                                            </div> {{-- /Img --}}

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
                                    </div> {{-- /Right --}}
                                </div>

                                <fieldset class="container lg:max-w-3xl border border-gray-300 rounded mx-auto">
                                    <legend class="text-md">会社概要</legend>
                                    {{-- Company_name --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <x-label for="company_name" :value="__('会社名')" />
                                            <x-input id="company_name" type="text" name="company_name"
                                                        value="{{ $input['company_name'] }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                        </div>
                                    </div>

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <x-label for="company_tel" :value="__('電話番号')" />
                                            <x-input id="company_tel" type="text" name="company_tel"
                                                        value="{{ $input['company_tel'] }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                        </div>
                                    </div>

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <x-label for="company_email" :value="__('メールアドレス')" />
                                            <x-input id="company_email" type="text" name="company_email"
                                                        value="{{ $input['company_email'] }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                    </div>
                                </fieldset> {{-- /Company_name --}}
                            </div>
                        </section>
                        <div class="flex items-center justify-between mt-8">
                            <input name="back" type="submit" value="やり直す" class="bg-red-500 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" />
                            <input type="submit" value="登録する" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
