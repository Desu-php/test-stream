<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Main page
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto p-10">
        @auth()
            <a href="{{route('broadcasts.create')}}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                add
            </a>
        @endif
        <div class="py-12">
            @foreach($broadcasts as $broadcast)
                <a href="{{route('broadcasts.show', $broadcast->id)}}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:cursor-pointer hover:bg-gray-400 mb-5">
                    <div class="p-6 bg-white border-b border-gray-200 flex">
                        <div style="height: 100px; width: 100px; overflow: hidden">
                            <img class="object-cover" src="{{$broadcast->preview_url}}" alt="{{$broadcast->name}}" />
                        </div>
                        <div class="ml-10">
                            <h4 class="font-bold">{{$broadcast->name}}</h4>
                            <p class="text-gray-500">{{$broadcast->description}}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {!! $broadcasts->links() !!}
    </div>

</x-app-layout>
