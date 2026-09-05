<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('求人情報詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" />
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto flex flex-col">
                            <div class="lg:w-4/6 mx-auto">
                                <div class="border-b-2 border-gray-300 mb-10">
                                    <h2 class="text-gray-900 text-2xl title-font font-medium pb-4">
                                        {{ $job->title }}
                                    </h2>
                                </div>
                                <div class="rounded-lg overflow-hidden w-96 mx-auto mb-10">
                                    <x-thumbnail :filename="$job->img_path" />
                                </div>
                                <div>
                                    {!! nl2br(e($job->description)) !!}
                                </div>
                            </div>
                            <div class="w-10/12 mx-auto">
                                <div class="flex flex-col sm:flex-row mt-10">
                                    <div class="flex justify-around sm:w-3/4 sm:pr-8 sm:py-8">
                                        <div class="w-full">
                                            {{-- Prefecture --}}
                                            <div class="p-2">
                                                <div class="relative">
                                                    <x-label for="prefectures_id" :value="__('都道府県')" />

                                                    <x-input id="prefectures_id" type="text" name="prefectures_id"
                                                        value="{{ $prefecture }}" disabled
                                                        class="block mt-1 bg-gray-300 bg-opacity-50 w-full" />
                                                </div>
                                            </div> {{-- /Prefecture --}}

                                            {{-- /Status --}}
                                            <div class="p-2">
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
                                                                    name="wage_type" value="0" disabled="true"
                                                                    {{ $job->wage_type == 0 ? 'checked' : '' }} />
                                                                <x-label for="monthly_salary" :value="__('月給')" />
                                                            </div>
                                                            <div class="flex">
                                                                <input id="hourly_wage" type="radio" name="wage_type"
                                                                    value="1" disabled="true"
                                                                    {{ $job->wage_type == 1 ? 'checked' : '' }} />
                                                                <x-label for="hourly_wage" :value="__('時給')" />
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <x-input type="text" name="salary_amount"
                                                                value="{{ $job->salary_amount . ' 円' }}" disabled
                                                                class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>{{-- /Salaly --}}
                                        </div>
                                        <div class="w-full">
                                            <div class="p-2">
                                                <div class="relative">
                                                    <x-label for="age" :value="__('年齢')" />
                                                    <x-input id="age" type="text" name="age"
                                                        value="{{ $age_limit }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <div class="relative">
                                                    <x-label for="license" :value="__('車免許')" />
                                                    <x-input id="license" type="text" name="license"
                                                        value="{{ $license }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <div class="relative">
                                                    <x-label for="experience" :value="__('経験')" />
                                                    <x-input id="experience" type="text" name="experience"
                                                        value="{{ $experience }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                </div>
                                            </div>{{-- /Qualifications --}}
                                        </div>
                                    </div>
                                    <div
                                        class="sm:w-1/4 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                                        <fieldset
                                            class="mx-auto mt-4 border-2 border-gray-200 rounded-lg text-center font-bold">
                                            <legend class="text-md">会社概要</legend>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="company_name" :value="__('会社名')" />
                                                    <x-input id="company_name" type="text" name="company_name"
                                                        value="{{ $job->company_name }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50 text-center" />
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="company_tel" :value="__('電話番号')" />
                                                    <x-input id="company_tel" type="text" name="company_tel"
                                                        value="{{ $job->company_tel }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50 text-center" />
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="company_email" :value="__('メールアドレス')" />
                                                    <x-input id="company_email" type="text" name="company_email"
                                                        value="{{ $job->company_email }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50 text-center" />
                                                </div>
                                        </fieldset>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="flex items-start justify-between mt-8">
                            <x-a href="{{ route('user.dashboard') }}" class="bg-red-500 hover:bg-red-400">戻る</x-a>

                            <div class="text-center">
                                @if ($applicant_list->isEmpty())
                                    <div>
                                        <form action="{{ route('user.applicant.create', ['job' => $job->id]) }}"
                                            method="get">
                                            <input type="submit" value="応募する"
                                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" />
                                        </form>
                                    </div>
                                @else
                                    <input type="submit" value="この求人は応募済みです" disabled
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" />
                                @endif
                                <div class="mt-5">
                                    @if (is_null($favorite))
                                        <form action="{{ route('user.favorite.store', ['user' => Auth::id(), 'job' => $job->id]) }}"
                                            method="post">
                                            @csrf
                                            <input type="submit" value="お気に入り登録" data-id="{{ $job->id }}"
                                                class="cursor-pointer inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" />
                                        </form>
                                    @else
                                        <form action="{{ route('user.favorite.destroy', ['user' => Auth::id(), 'job' => $job->id]) }}"
                                            method="post">
                                            @csrf
                                            <input type="submit" value="お気に入りから解除" data-id="{{ $job->id }}"
                                                class="cursor-pointer inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" />
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
