<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-6 gap-8 items-center justify-center">
        @foreach($lists as $list)
            <a href={{ route('list.items', ['id' => $list->id]) }} class="bg-white border border-gray-200 w-48 h-56
               rounded-lg flex flex-col gap-2.5 items-center justify-center hover:bg-gray-50 hover:border-gray-300
               hover:text-gray-500 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=".5"
                 stroke="currentColor" class="size-20 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z"/>
            </svg>

            <span class="font-medium text-black">
                    {{ $list->name }}
                </span>
            </a>
        @endforeach

        @livewire("dashboard.create-list-form")
    </div>
</x-app-layout>
