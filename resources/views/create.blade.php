<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавление стрима
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto p-10">
        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:cursor-pointer mb-5">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                    <form method="POST" action="{{ route('broadcasts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="name" value="Название"/>

                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="old('name')" required autofocus/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" value="Описание"/>

                            <x-textarea id="description" class="block mt-1 w-full" name="description"
                                        :value="old('description')" required/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="preview" value="Превью"/>

                            <x-text-input
                                id="preview"
                                class="block mt-1 w-full"
                                type="file"
                                name="preview"
                                required
                            />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                Добавить
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
