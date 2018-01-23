<?php 
	ini_set('max_execution_time', '300');
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<style>
		@page { margin: 0px; }
		body { margin: 0px; }

		.label
		{
			position: absolute;
			width: 38.1mm;
			height: 21.17mm;
		}

		.qr
		{
			position: relative;
			left: 1mm;
			top: 1.8mm;
			width: 58px;
			height: 58px;
		}

		.info
		{
			position: relative;
			left: 18mm;
			top: -15mm;
			width: 19mm;
		}

		.artnr
		{
			font-size: 2mm;
			color: rgb(0, 130, 161);

		}

		.title
		{
			font-size: 2.5mm;
			color: rgb(0, 130, 161);
			word-wrap: break-word;
		}
	</style>
</head>

<body>
	@for ($i = 0; $i < count($items); $i++)
		<div class="label" style="left: {{ 3 + ($i % 5) * 42 }}mm; top: {{ 8 + (int)(($i - ((int)($i / 65) * 65)) / 5) * 22 }}mm;">		
			
			<img class="qr" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->margin(0)->size(65)->color(0, 130, 161)->merge(asset('images/logo.png'), .2, true)->generate($items[$i]->artnr)) !!} ">
			
			<div class="info">
				<div class="artnr">Art.nr. {{ $items[$i]->artnr }}</div>
				<div class="title">{{ $items[$i]->title }}</div>
			</div>

		</div>

        @if ($i > 0 && ($i % 64) == 0)
           	<div style="page-break-after: always;"></div>
	    @endif
	@endfor
</body>
