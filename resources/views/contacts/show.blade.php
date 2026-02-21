<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Details') }}
        </h2>
        
    </x-slot>

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" disabled name="name" type="text" class="mt-1 block w-full" :value="old('name', $contact->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="contact" :value="__('Contact')" />
        <x-text-input id="contact" disabled name="contact" type="number" class="mt-1 block w-full" :value="old('contact', $contact->contact)" required autofocus autocomplete="contact" />
        <x-input-error class="mt-2" :messages="$errors->get('contact')" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" disabled name="email" type="email" class="mt-1 block w-full" :value="old('email', $contact->email)" required autofocus autocomplete="email" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>
    
    <div class="flex items-center gap-4 mt-6">

        <!-- Edit -->
        <form method="GET" action="{{ route('contacts.edit', $contact) }}">
            <x-primary-button>
                {{ __('Edit') }}
            </x-primary-button>
        </form>

        <!-- Delete -->
        <form method="POST" action="{{ route('contacts.destroy', $contact) }}"
            onsubmit="return confirm('Are you sure you want to delete this contact?');">
            @csrf
            @method('DELETE')

            <x-danger-button>
                {{ __('Delete') }}
            </x-danger-button>
        </form>

    </div>

</x-app-layout>