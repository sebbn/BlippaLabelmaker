<head>
	<title>BLiPPA Labelmaker</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
</head>

<body>
	<div class="content">
		{{ Form::open(['route' => 'print', 'name' => 'print']) }}
		<div class="content" style="float: left;">		
	    		<h3>Lägg till</h3>		
			    <div class="form-group" style="width: 50%;">
			        {{ Form::label('artnr', 'Art.Nr') }}
			        {{ Form::text('artnr', null, array('class' => 'form-control')) }}
					{{ Form::hidden('invisible', null, array('name' => 'ids', 'id' => 'ids')) }}
	            	<button type="button" class="buttonSmall" id="addProductButton">Lägg till</button>
			    </div>
    	</div>
    	<div class="content" style="float: right;">
    		<h3>Produkter</h3>
    		<div id="products">
			</div>
			<hr>
        	<button type="submit" class="button">Skapa</button>
    	</div>
    	{{ Form::close() }}
	</div>
</body>

<script>
	$(document).ready(function(){
		$("#artnr").keyup(function(event) {
		    if (event.keyCode === 13) {
		        $("#addProductButton").click();
		    }
		});

		$(window).keydown(function(event){
			if(event.keyCode == 13) 
			{
				event.preventDefault();
				return false;
			}
		});

	    $("#addProductButton").click(function(){
	    	var id = $('#artnr').val();
	    	$('#artnr').val('');
	     	$('#products').append('<span>' + id + '</span></br>');

	     	var val = $('#ids').val();
	     	if (val == '')
	     		$('#ids').val(id);
	     	else
	     		$('#ids').val(val + ',' + id);
	    });
	});
</script>