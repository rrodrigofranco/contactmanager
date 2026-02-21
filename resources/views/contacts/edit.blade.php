<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Contact') }}
        </h2>
        
    </x-slot>

    <form action="{{ route('contacts.update', $contact) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $contact->name }}">
        <input type="text" name="contact" value="{{ $contact->contact }}">
        <input type="email" name="email" value="{{ $contact->email }}">

        <button type="submit">Update</button>
    </form>


</x-app-layout>