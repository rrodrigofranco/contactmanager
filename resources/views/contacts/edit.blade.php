<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Contact') }}
        </h2>
        
    </x-slot>

    <form method="post" action="{{ route('contacts.update', $contact) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- NAME -->
        <div>
            <x-input-label for="name" :value="__('Name')" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                :value="old('name', $contact->name)"
                required
                minlength="6"
                autocomplete="name"
            />

            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- CONTACT -->
        <div>
            <x-input-label for="contact" :value="__('Contact')" />

            <x-text-input
                id="contact"
                name="contact"
                type="text"
                class="mt-1 block w-full"
                :value="old('contact', $contact->contact)"
                required
                pattern="\d{9}"
                maxlength="9"
                title="Contact must contain exactly 9 digits"
                autocomplete="off"
            />

            <x-input-error class="mt-2" :messages="$errors->get('contact')" />
        </div>

        <!-- EMAIL -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                :value="old('email', $contact->email)"
                required
                autocomplete="email"
            />

            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>

</x-app-layout>

<script>
    document.querySelector('form').addEventListener('submit', function(e) {

        const contact = document.querySelector('input[name="contact"]').value;

        if (!/^\d{9}$/.test(contact)) {
            e.preventDefault();
            alert('Contact must contain exactly 9 digits.');
        }
    });
</script>