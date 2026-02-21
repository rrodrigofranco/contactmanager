<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
        
    </x-slot>
    <div>
        <a href="{{ route('contacts.create') }}">Add Contact</a>
    </div>
    
    <div
        class="relative flex flex-col w-full h-full overflow-x-auto text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">

  <table class="w-full text-left table-auto min-w-max">
    <thead>
      <tr>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block text-sm font-normal leading-none text-blue-gray-900 opacity-70">
            Name
          </p>
        </th>

        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block text-sm font-normal leading-none text-blue-gray-900 opacity-70">
            Contact
          </p>
        </th>

        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block text-sm font-normal leading-none text-blue-gray-900 opacity-70">
            Email
          </p>
        </th>

        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block text-sm font-normal leading-none text-blue-gray-900 opacity-70 text-right">
            Actions
          </p>
        </th>
      </tr>
    </thead>

    <tbody>

      @forelse($contacts as $contact)
        <tr class="hover:bg-gray-50 transition">

          <td class="p-4 border-b border-blue-gray-50">
            <p class="text-sm text-blue-gray-900">
              {{ $contact->name }}
            </p>
          </td>

          <td class="p-4 border-b border-blue-gray-50">
            <p class="text-sm text-blue-gray-900">
              {{ $contact->contact }}
            </p>
          </td>

          <td class="p-4 border-b border-blue-gray-50">
            <p class="text-sm text-blue-gray-900">
              {{ $contact->email }}
            </p>
          </td>

          <td class="p-4 border-b border-blue-gray-50 text-right space-x-3">

            <a href="{{ route('contacts.show', $contact) }}"
               class="text-blue-600 hover:text-blue-800 font-medium">
              View
            </a>

            <a href="{{ route('contacts.edit', $contact) }}"
               class="text-indigo-600 hover:text-indigo-800 font-medium">
              Edit
            </a>

            <form action="{{ route('contacts.destroy', $contact) }}"
                  method="POST"
                  class="inline"
                  onsubmit="return confirm('Delete this contact?')">
              @csrf
              @method('DELETE')

              <button type="submit"
                      class="text-red-600 hover:text-red-800 font-medium">
                Delete
              </button>
            </form>

          </td>
        </tr>

      @empty
        <tr>
          <td colspan="4" class="p-6 text-center text-gray-500">
            No contacts found.
          </td>
        </tr>
      @endforelse

    </tbody>
  </table>
</div>
</x-app-layout>