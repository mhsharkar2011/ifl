<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Create') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-guest-layout>
                        <form method="POST" action="{{ route('products.store') }}">
                            @csrf

                            <!-- Product Name -->
                            <div>
                                <x-input-label for="name" :value="__('Product Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Category -->
                            <div class="mt-4">
                                <x-input-label for="category_id" :value="__('Category')" />
                                <select id="category_id" name="category_id"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
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

                            <!-- Brand -->
                            <div class="mt-4">
                                <x-input-label for="brand_id" :value="__('Brand')" />
                                <select id="brand_id" name="brand_id"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('brand_id')" class="mt-2" />
                            </div>

                            <!-- Unit -->
                             <div class="mt-4">
                                <x-input-label for="unit_id" :value="__('Unit')" />
                                <select id="unit_id" name="unit_id"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('brand_id')" class="mt-2" />
                            </div>


                            <!-- Price -->
                            <div class="mt-4">
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01"
                                    name="price" :value="old('price')" required />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
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
