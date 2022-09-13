<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Стрим пользователя: {{$broadcast->user->login}}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto p-10">
        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:cursor-pointer mb-5">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>{{$broadcast->name}}</h1>
                    <div>
                        @if($broadcast->is_online)
                            <iframe width="560" height="315" src="http://89.22.229.228:5080/Ikromov/play.html?name={{$broadcast->stream_id}}" frameborder="0" allowfullscreen></iframe>
                        @else
                            <img src="{{$broadcast->preview_url}}" alt="{{$broadcast->name}}">
                        @endif
                    </div>
                    <div>
                        {{$broadcast->description}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
