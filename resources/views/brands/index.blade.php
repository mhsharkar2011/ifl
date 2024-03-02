<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Category') }}
        </h2>
    </x-slot>
    <div class="continer">
        <div class="content">
            <div class="row">
                @foreach ($brands as $brand)
                    <ul>
                        <li>{{ $brand->name }}</li>
                    </ul>
                    
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
