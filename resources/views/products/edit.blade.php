<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Product') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">
        <!-- Card -->
        <div class="bg-white shadow-xl rounded-2xl p-8">
            <h3 class="text-2xl font-semibold text-gray-700 mb-6 text-center">
                Edit Product Details
            </h3>

            <!-- Show messages -->
            @if (session('success'))
                <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-800 text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-800 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('products.update', $product->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Product Name</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}"
                        class="w-full rounded-xl border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm"
                        placeholder="Enter product name..." required>
                </div>

                <!-- Product Price -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Price</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}"
                        class="w-full rounded-xl border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm"
                        placeholder="Enter product price..." required>
                </div>

                <!-- Product Description -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full rounded-xl border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm"
                        placeholder="Write product details...">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Discontinue Field -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Discontinue Product</label>
                    <div class="flex items-center gap-2">
                        <input type="hidden" name="discontinued" value="0"> <!-- default when unchecked -->
                        <input type="checkbox" name="discontinued" value="1"
                            {{ old('discontinued', $product->discontinued) ? 'checked' : '' }}
                            class="w-5 h-5 text-red-600 rounded border-gray-300 focus:ring-red-500 focus:ring-2">
                        <span class="text-gray-600">Mark as discontinued</span>
                    </div>
                </div>



                <!-- Buttons -->
                <div class="flex justify-end gap-3">
                    <a href="{{ route('products.index') }}"
                        class="px-5 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium transition">
                        Cancel
                    </a>
                    <x-primary-button class="px-6 py-2 rounded-xl shadow-lg">
                        {{ __('Update Data') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
