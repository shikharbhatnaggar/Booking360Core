<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Status Page</title>
</head>
<body>
    <h1>Table Status</h1>
    <table border="1" cellpadding="10" cellspacing="0">
    	<tr>
    		<th>Table Name</th>
	    	<th>Seats</th>
	    	<th>Status</th>
	    	<th>Guest Name</th>
            <th>Action</th>
	    </tr>
    	@foreach($tables as $table)
	    <tr>
    		<td>{{ $table->name }}</td>
    		<td>{{ $table->seats }}</td>
    		<td>{{ $table->status }}</td>
    		<td>
    		@if($table->status === 'Booked')
    			{{ $table->reservation->guest_name }}
    		@else
    			-
    		@endif	
    		</td>
            <td>
                @if($table->status === 'Booked')
                    <a href="{{ route('table.freetable', $table->id) }}">Free Table</a>
                @else
                    -
                @endif
            </td>
    	</tr>
    	@endforeach
    </table>

    <br><br>

    <a href="{{ route('reservation.create') }}">Reserve Table</a>
    <a href="{{ route('reservation.waitinglist') }}">Show Waiting List</a>

</body>
</html>

