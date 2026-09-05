<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('応募者一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" />
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 lg:py-12 mx-auto">
                            @if ($applicants->isNotEmpty())
                                <div class="flex flex-col text-center w-full mb-20">
                                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">
                                        応募者一覧</h1>
                                </div>
                                <div class="w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                                    求人タイトル</th>
                                                <th
                                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                    氏名</th>
                                                <th
                                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                    年齢</th>
                                                <th
                                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                    現在の職業</th>
                                                <th
                                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($applicants as $key => $applicant)
                                                <tr>
                                                    <td class="w-1/2 border-t-2 border-b-2 border-gray-200 px-4 py-3">
                                                        <div>
                                                            {{ $applicant->job->title }}
                                                        </div>
                                                    </td>
                                                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                                                        {{ $applicant->user->name }}</td>
                                                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                                                        {{ $applicant->user->age }}歳</td>
                                                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                                                        {{ $current_jobs[$key] }}</td>
                                                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                                                        <a href="{{ route('owner.applicant.show', ['user' => $applicant->user->id, 'job' => $applicant->job->id]) }}"
                                                            class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">確認する
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" class="w-4 h-4 ml-2"
                                                                viewBox="0 0 24 24">
                                                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="flex flex-col text-center w-full mb-20">
                                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">
                                        応募者がいません
                                    </h1>
                                </div>
                            @endif
                        </div>
                    </section>
                    {{ $applicants->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
