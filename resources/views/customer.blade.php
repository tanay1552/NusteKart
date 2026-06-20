<h2>Customer Page</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="/customer">
    @csrf

    <label>Customer Name</label>
    <input type="text" name="name" required>

    <label>Phone Number</label>
    <input type="text" name="phone" required>

    <label>Address</label>
    <textarea name="address" required></textarea>

    <label>Google Map Location Link</label>
    <input type="text" name="geo_location" placeholder="https://maps.google.com/...">

    <button type="submit">Add Customer</button>
</form>
