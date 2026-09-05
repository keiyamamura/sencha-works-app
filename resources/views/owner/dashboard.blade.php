<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('求人登録一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" />
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            @forelse ($jobs as $key => $job)
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
                                                                    name="prefectures_id"
                                                                    value="{{ $prefecture[$key] }}" disabled
                                                                    class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                            </div>
                                                        </div> {{-- /Prefecture --}}

                                                        {{-- /Status --}}
                                                        <div class="p-2 w-full">
                                                            <div class="relative">
                                                                <x-label for="status" :value="__('雇用形態')" />

                                                                <x-input id="status" type="text" name="status"
                                                                    value="{{ $status[$key] }}" disabled
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
                                                                                name="{{ 'wage_type' . $key}}" value="0"
                                                                                disabled="true"
                                                                                {{ $job->wage_type == 0 ? 'checked' : '' }} />
                                                                            <x-label for="monthly_salary"
                                                                                :value="__('月給')" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <input id="hourly_wage" type="radio"
                                                                                name="{{ 'wage_type' . $key}}" value="1"
                                                                                disabled="true"
                                                                                {{ $job->wage_type == 1 ? 'checked' : '' }} />
                                                                            <x-label for="hourly_wage"
                                                                                :value="__('時給')" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex items-center">
                                                                        <x-input type="text" name="salary_amount"
                                                                            value="{{ $job->salary_amount }}" disabled
                                                                            class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                                        <span>円</span>
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
                                                            value="{{ $age_limit[$key] }}" disabled
                                                            class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                    </div>
                                                </div>
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <x-label for="license" :value="__('車免許')" />
                                                        <x-input id="license" type="text" name="license"
                                                            value="{{ $license[$key] }}" disabled
                                                            class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                    </div>
                                                </div>
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <x-label for="experience" :value="__('経験')" />
                                                        <x-input id="experience" type="text" name="experience"
                                                            value="{{ $experience[$key] }}" disabled
                                                            class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                    </div>
                                                </div>{{-- /Qualifications --}}
                                            </div>
                                        </div>
                                        <div class="text-right cursor-pointer">
                                            <a href="{{ route('owner.job.edit', ['id' => $job->id]) }}"
                                                class="text-indigo-500 inline-flex items-center mt-3">編集する
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                                    viewBox="0 0 24 24">
                                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>{{-- Right --}}
                                </div>
                            @empty
                                <div class="flex flex-col text-center w-full mb-20">
                                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">
                                        登録している求人がありません
                                    </h1>
                                </div>
                            @endforelse
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
