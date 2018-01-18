<head>
	<title>BLiPPA Labelmaker</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>

	<div class="content">	
		<h2>Statistik</h2></br>
		
		<table>
			<tr>
				<th class="statsHeader">ID</th>
				<th class="statsHeader">Namn</th>
				<th class="statsHeader">Värde</th>
				<th class="statsHeader">Användare</th>
				<th class="statsHeader">Device</th>
				<th class="statsHeader">Datum</th>			
			</tr>

			@foreach ($events as $event)
				<tr>
					<td class="statsHeader">{{ $event->eventId }}</td>
					<td class="statsHeader">{{ $event->name }}</td>
					<td class="statsHeader">{{ $event->value }}</td>
					<td class="statsHeader">{{ $event->user }}</td>
					<td class="statsHeader">{{ $event->useragent }}</td>
					<td class="statsHeader">{{ $event->created_at }}</td>
				</tr>
			@endforeach
		</table>
	</div>
</body>

<script>
</script>