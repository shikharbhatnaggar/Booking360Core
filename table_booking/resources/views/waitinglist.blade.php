<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting List Page</title>
</head>
<body>
    <h1>Waiting List</h1>
    <table border="1" cellpadding="10" cellspacing="0">
    	<tr>
    		<th>Guest Name</th>
	    	<th>Number of Persons</th>
	    	<th>Status</th>
	    	<th>Requested At</th>
	    </tr>
    	@foreach($waitingList as $wl)
	    <tr>
    		<td>{{ $wl->guest_name }}</td>
    		<td>{{ $wl->number_of_persons }}</td>
    		<td>{{ $wl->status }}</td>
            <td>{{ $wl->created_at }}</td>
    	</tr>
    	@endforeach
    </table>

    <br><br>

    <a href="{{ route('reservation.create') }}">Reserve Table</a>
    <a href="{{ route('table.index') }}">Show Tables</a>
    
</body>
</html>

