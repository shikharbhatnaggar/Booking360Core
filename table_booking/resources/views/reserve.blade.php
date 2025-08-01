<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Reservation Page</title>
</head>
<body>
    <h1>Create Reservation</h1>

    <br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>

    <form method="post" action="{{ route('reservation.store') }}">
        @csrf
        <label>Guest Name:</label>
        <input type="text" name="guest_name" required>
        <br><br>
        <label>Number of Persons:</label>
        <input type="number" name="number_of_persons" min="1" max="10" required>
        <br><br>
        <button type="submit">Book Table</button>
    </form>


    <br><br>

    <a href="{{ route('table.index') }}">Show Tables</a>
    <a href="{{ route('reservation.waitinglist') }}">Show Waiting List</a>

</body>
</html>

