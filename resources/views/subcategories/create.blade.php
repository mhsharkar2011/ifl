<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Create') }}
        </h2>
    </x-slot>
<!-- Appointment Start -->
    <div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-12">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Create Category</h1>
                        <form action="{{ route('subcategories.store') }}" method="POST">
                            @csrf
                        <div class="row g-3">
                                <div class="col">
                                    <input type="text" name="name" class="form-control bg-light border-0" style="height: 55px;" placeholder="Enter Category Name Here..">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->
</x-app-layout>
