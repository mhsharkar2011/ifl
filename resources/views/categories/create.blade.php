<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Create') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-guest-layout>
                        <form method="POST" action="{{ route('categories.store') }}">
                            @csrf

                            <!-- Product Name -->
                            <div>
                                <x-input-label for="name" :value="__('Category Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Sub Category -->
                            <div class="mt-4">
                                <x-input-label for="sub_category_id" :value="__('Sub Category')" />
                                <select id="sub_category_id" name="sub_category_id"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}"
                                            {{ old('sub_category_id') == $subCategory->id ? 'selected' : '' }}>
                                            {{ $subCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('sub_category_id')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-center mt-4">
                                <x-primary-button class="ms-4">
                                    {{ __('Save Data') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </x-guest-layout>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
