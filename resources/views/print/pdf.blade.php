<?php 
	ini_set('max_execution_time', '300');
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<style>
		@page { margin: 0px; }
		body { margin: 0px; }
	</style>
</head>

<body>
	@php
		$m = 0;
		$n = 0;
		$i = 0;
	@endphp

	@foreach ($items as $item)
		@php
			$r = ($i + 1) / 5;

			$x = 3 + $n * 42;
			$y = 8 + $m * 22;
		@endphp
		<div style="position: absolute; width: 38.1mm; height: 21.17mm; left: {{ $x }}mm; top: {{ $y }}mm;">		
			
			<img style="position: relative; left: 1mm; top: 1.8mm; width: 58px; height: 58px;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->margin(0)->size(65)->color(0, 130, 161)->merge(asset('images/logo.png'), .2, true)->generate($item->artnr)) !!} ">
			
			<div style="position: relative; left: 18mm; top: -15mm; width: 19mm;">
				<div style="font-size: 1.5mm; color:rgb(0, 130, 161);">Art.nr. {{ $item->artnr }}</div>
				<div style="font-size: 2mm; color:rgb(0, 130, 161); word-wrap: break-word;">{{ $item->title }}</div>
			</div>

		</div>

		@php 
			if ($n == 4)
	    	{
	    		if ($m == 3)
	    			break;
		        $n = 0;
		        $m++;
		        
		        if ($m == 13)
		        {
		            echo '<div style="page-break-after: always;"></div>';
		            $m = 0;
		        }
		    }
		    else 
		        $n++;
			$i++;
		@endphp
	@endforeach
</body>
