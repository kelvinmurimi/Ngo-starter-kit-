@extends('layouts.base')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-700">{{ $title }}</h1>
            <a href="{{ route('galleries.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <x-heroicon-o-plus class="w-4 h-4 mr-2" />
                <span>Create New Gallery</span>
            </a>
        </div>

        @if ($galleries->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                <p>No galleries found. <a href="{{ route('galleries.create') }}" class="font-bold underline">Create one
                        now</a>!</p>
            </div>
        @else
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                ID</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Caption</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Featured Image</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($galleries as $gallery)
                            <tr class="hover:bg-gray-50">
                                <td class="px-5 py-4 text-sm">{{ $gallery->id }}</td>
                                <td class="px-5 py-4 text-sm">{{ $gallery->caption }}</td>
                                <td class="px-5 py-4 text-sm">
                                    @if ($gallery->featured_image)
                                        <img src="{{ asset('storage/' . $gallery->featured_image) }}"
                                            alt="{{ $gallery->caption }}" class="w-24 h-auto rounded">
                                    @else
                                        <span class="text-gray-400">No Image</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-sm flex items-center space-x-4">
                                    <a href="{{ route('galleries.edit', $gallery->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900"
                                        title="Edit"><x-heroicon-o-pencil-square class="w-5 h-5" /></a>
                                    <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this gallery?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            title="Delete"><x-heroicon-o-trash class="w-5 h-5" /></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
