@extends('layouts.base')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">{{ $title }}</h1>

        <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-md rounded-lg p-6">
            @csrf

            <div class="mb-4">
                <x-form.input label="Caption" name="caption" />

            </div>

            <div class="mb-4">
                {{-- featured Image --}}
                <x-form.input name="featured_image" type="file"></x-form.input>
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center cursor-pointer">
                <x-heroicon-o-plus class="w-4 h-4 mr-2" />
                <span>Create Gallery</span>
            </button>
        </form>
    </div>
@endsection
