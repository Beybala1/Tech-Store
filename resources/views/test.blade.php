<form action="/test" method="post">
    @csrf

    <label for="name">Company Name:</label>
    <input type="text" name="name" id="name" required>

    <div id="phone_numbers_container">
        <label>Phone Numbers:</label>
        <input type="text" name="phone_numbers[]" required>
    </div>

    <div id="addresses_container">
        <label>Addresses:</label>
        <input type="text" name="addresses[]" required>
    </div>

    <button type="button" id="add_phone_number">Add Phone Number</button>
    <button type="button" id="add_address">Add Address</button>
    <button type="submit">Submit</button>
</form>


<!-- resources/views/contact_info/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Contact Info List</title>
</head>
<body>
<h1>Contact Info List</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone Numbers</th>
        <th>Addresses</th>
        <!-- Add other table headers for additional fields if needed -->
    </tr>
    </thead>
    <tbody>
    @foreach ($companies as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ implode(', ', $company->phone_numbers) }}</td>
            <td>{{ implode(', ', $company->addresses) }}</td>
            <!-- Add other table cells for additional fields if needed -->
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addPhoneNumberButton = document.getElementById('add_phone_number');
        const phoneNumbersContainer = document.getElementById('phone_numbers_container');

        addPhoneNumberButton.addEventListener('click', function () {
            const newInput = document.createElement('input');
            newInput.setAttribute('type', 'text');
            newInput.setAttribute('name', 'phone_numbers[]');
            newInput.setAttribute('required', 'required');

            phoneNumbersContainer.appendChild(newInput);
        });

        const addAddressButton = document.getElementById('add_address');
        const addressesContainer = document.getElementById('addresses_container');

        addAddressButton.addEventListener('click', function () {
            const newInput = document.createElement('input');
            newInput.setAttribute('type', 'text');
            newInput.setAttribute('name', 'addresses[]');
            newInput.setAttribute('required', 'required');

            addressesContainer.appendChild(newInput);
        });
    });
</script>

