<h1>Add Contact</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('contacts.store') }}" method="POST">
    @csrf

    <input 
        type="text" 
        name="name" 
        placeholder="Name"
        value="{{ old('name') }}"
        required
        minlength="6"
    >

    <input 
        type="text" 
        name="contact" 
        placeholder="Contact"
        value="{{ old('contact') }}"
        required
        pattern="\d{9}"
        maxlength="9"
        title="Contact must contain exactly 9 digits"
    >

    <input 
        type="email" 
        name="email" 
        placeholder="Email"
        value="{{ old('email') }}"
        required
    >

    <button type="submit">Save</button>
</form>

<script>
    document.querySelector('form').addEventListener('submit', function(e) {

        const contact = document.querySelector('input[name="contact"]').value;

        if (!/^\d{9}$/.test(contact)) {
            e.preventDefault();
            alert('Contact must contain exactly 9 digits.');
        }
    });
</script>