<h1>Contact Details</h1>

<p>Name: {{ $contact->name }}</p>
<p>Contact: {{ $contact->contact }}</p>
<p>Email: {{ $contact->email }}</p>

<a href="{{ route('contacts.edit', $contact) }}">Edit</a>

<form action="{{ route('contacts.destroy', $contact) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>