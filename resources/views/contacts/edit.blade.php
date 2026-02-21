<h1>Edit Contact</h1>

<form action="{{ route('contacts.update', $contact) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $contact->name }}">
    <input type="text" name="contact" value="{{ $contact->contact }}">
    <input type="email" name="email" value="{{ $contact->email }}">

    <button type="submit">Update</button>
</form>