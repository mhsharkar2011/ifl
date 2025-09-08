<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Branch') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-guest-layout>
                        <form action="{{ route('branches.update', $branch->id) }}" method="POST">
                            @csrf
                            @method('PUT') {{-- This is required for PUT request --}}

                            <div class="row g-3">
                                <!-- Branch Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Branch Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name', $branch->name)" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Location -->
                                <div>
                                    <x-input-label for="location_id" :value="__('Location')" />
                                    <select id="location_id" name="location_id"
                                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="">Select Location</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}"
                                                {{ old('location_id', $branch->location_id) == $location->id ? 'selected' : '' }}>
                                                {{ $location->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('location_id')" class="mt-2" />
                                </div>

                                <!-- Status -->
                                <div>
                                    <label for="status" class="inline-flex items-center">
                                        <!-- Hidden input ensures "0" is sent if unchecked -->
                                        <input type="hidden" name="status" value="0">
                                        <input id="status" type="checkbox" name="status" value="1"
                                            {{ old('status', $branch->status) ? 'checked' : '' }}
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ml-2 text-sm text-gray-600">Active</span>
                                    </label>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <x-primary-button class="ms-4">
                                        {{ __('Update Data') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </form>
                    </x-guest-layout>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Appointment End -->
</x-app-layout>
