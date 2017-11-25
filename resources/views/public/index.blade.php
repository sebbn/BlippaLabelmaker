<head>
	<title>BLiPPA Labelmaker</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>

	<div class="content">	
		<h2>BLiPPA</h2>
		{{ Form::open(['route' => 'customer', 'name' => 'printCustomer']) }}
			
		    <div class="form-group" style="width: 25%;">
		        {{ Form::label('customerNr', 'Kund.Nr') }}
		        {{ Form::text('customerNr', null, array('class' => 'form-control')) }}
		    </div>

        	<button type="submit" class="button">Skapa från mina produkter</button>
        	<span>eller</span>
        	<a class="button" href="{{ URL::route('build') }}">Skapa en egen lista</a>
    	{{ Form::close() }}
	</div>
</body>

<script>
</script>