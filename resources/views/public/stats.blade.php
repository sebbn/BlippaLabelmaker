<head>
	<title>BLiPPA Labelmaker</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>

	<div class="content">	
		<h2>Statistik</h2></br>
		
		<table>
			<tr>
				<th>ID<th>
				<th>Namn<th>
				<th>Värde</th>
				<th>Användare<th>
				<th>Device</th>
				<th>Datum</th>			
			</tr>

			@foreach ($events as $event)
				<tr>
					<td>$event->eventId<td>
					<td>$event->name<td>
					<td>$event->value</td>
					<td>$event->user<td>
					<td>$event->useragent</td>
					<td>$event->created_at</td>
				</tr>
			@endforeach
		</table>
	</div>
</body>

<script>
</script>