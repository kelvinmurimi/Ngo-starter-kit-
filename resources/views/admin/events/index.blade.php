@extends('layouts.base')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>
        <a href="{{ route('admin.events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create
            New Event</a>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Start Time</th>
                    <th class="py-2 px-4 border-b">End Time</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $event->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $event->start_time }}</td>
                        <td class="py-2 px-4 border-b">{{ $event->end_time }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2 cursor-pointer">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
