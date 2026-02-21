<h1>Contacts</h1>

<a href="{{ route('contacts.create') }}">Add Contact</a>

<table>
    <tr>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    @foreach($contacts as $contact)
    <tr>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->contact }}</td>
        <td>{{ $contact->email }}</td>
        <td>
            <a href="{{ route('contacts.show', $contact) }}">View</a>
            <a href="{{ route('contacts.edit', $contact) }}">Edit</a>

            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>