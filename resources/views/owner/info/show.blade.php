<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('会員情報') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" />
                    <div class="container pb-6 border-b-2 border-gray-100">
                        <div class="flex flex-col justify-center md:flex-row">
                            <div class="lg:w-3/4 w-full mt-6 lg:mt-0">
                                <div class="border-b-2 border-gray-300 mt-10">
                                    <h1 class="text-gray-900 text-3xl title-font font-medium text-center pb-4">
                                        会員情報
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
                                                    <x-input id="name"
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50"
                                                        type="text" name="name" value="{{ $owner->name }}"
                                                        required autofocus disabled />
                                                </div>
                                            </div> {{-- /UserName --}}
                                            {{-- UserAge --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="age" :value="__('年齢')" />
                                                    <x-input id="age" type="text" name="age"
                                                        value="{{ $age }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                </div>
                                            </div> {{-- /UserAge --}}
                                            {{-- UserGender --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="gender" :value="__('性別')" />
                                                    <x-input id="gender" type="text" name="gender"
                                                        value="{{ $gender }}" disabled
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
                                                    <x-label for="email" :value="__('メールアドレス')" />
                                                    <x-input id="email" type="text" name="email"
                                                        value="{{ $owner->email }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                </div>
                                            </div> {{-- /UserPrefecture --}}
                                            {{-- UserPrefecture --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="prefecture" :value="__('都道府県')" />
                                                    <x-input id="prefecture" type="text" name="prefecture"
                                                        value="{{ $prefecture }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                </div>
                                            </div> {{-- /UserPrefecture --}}
                                            {{-- UserMunicipalities --}}
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <x-label for="municipalities" :value="__('住所')" />
                                                    <x-input id="municipalities" type="text" name="municipalities"
                                                        value="{{ $owner->municipalities }}" disabled
                                                        class="block mt-1 w-full bg-gray-300 bg-opacity-50" />
                                                </div>
                                            </div> {{-- /UserMunicipalities --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <x-a href="{{ route('owner.info.edit', ['id' => $owner->id]) }}" class="ml-4">
                                        {{ __('編集する') }}
                                    </x-a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
