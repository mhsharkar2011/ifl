<x-app-layout>
    <x-slot name="header">
        <nav class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-14 items-center">
                    <!-- Left side -->
                    <div class="flex space-x-6">
                        <a href="{{ route('products.create') }}"
                            class="text-gray-500 dark:text-gray-200 hover:text-blue-300 font-medium">
                            Add Product
                        </a>
                    </div>

                    <!-- Right side (optional, like user profile/logout) -->
                    <div class="flex space-x-4">
                        <a href="{{ route('products.create') }}"
                            class="text-gray-500 dark:text-gray-200 hover:text-blue-300 font-medium">
                            Product Assign
                        </a>

                    </div>
                </div>
            </div>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 shadow sm:rounded-lg">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class=" max-w-screen-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    SL No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sub Category Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Units
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Rate
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Updated At
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->id }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->name }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->description }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->Category->name }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->SubCategory->name }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->Unit->name }}
                                    </th>

                                    <td class="px-6 py-4">
                                        {{ $product->price }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <!-- View -->
                                            <a href="{{ route('products.show', $product) }}"
                                                class="flex items-center justify-center transition">
                                                <span class="material-icons text-base">visibility</span>
                                            </a>

                                            <!-- Edit -->
                                            <a href="{{ route('products.edit', $product) }}">
                                                <span class="material-icons text-base">edit</span>
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <span class="material-icons text-base">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($product->discontinued)
                                            <span class="px-2 py-1 rounded-full text-red-700 text-sm font-semibold">
                                                Discontinued
                                            </span>
                                        @else
                                            <span class="px-2 py-1 rounded-full text-green-700 text-sm font-semibold">
                                                Running
                                            </span>
                                        @endif
                                    </td>
                                     <td class="px-6 py-4">
                                        {{ $product->updated_at->diffForHumans() }} ({{ $product->updated_at->format('Y-m-d H:i:s') }})

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
