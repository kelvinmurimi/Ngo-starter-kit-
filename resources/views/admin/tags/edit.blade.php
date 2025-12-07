@extends('layouts.base')
@section('content')
    <div class="flex-1 p-8">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-indigo-700">{{ __('Update Tag') }}</h1>
        </div>
        <div x-data="{ submitting: false }" class="mt-6">
            <x-form x-on:submit="submitting = true" action="{{ route('tags.update', $tag->id) }}" method="POST"
                class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <x-form.input name='name' label='Tag Name'>{{ $tag->name }}</x-form.input>
                </div>
                <div>
                    <button type="submit" x-bind:disabled="submitting"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg x-show="submitting" class="w-5 h-5 mr-2 -ml-1 text-white animate-spin"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span
                            x-text="submitting ? '{{ __('Updating...') }}'
                        : '{{ __('Update Tag') }}'"></span>
                    </button>
                </div>
            </x-form>
        </div>
    </div>
@endsection
