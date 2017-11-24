<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


@foreach ($items as $item)
	<div style="float: left; width: 38.1mm; height: 21.17mm; background-color: red; margin-right: 2mm; margin-bottom: 2mm;">
		<div style="float: right; width: 19mm;">
			<div style="font-size: 2mm;">{{ $item->artnr }}</div>
			<div style="font-size: 3mm;">{{ $item->title }}</div>
		</div>
	</div>
@endforeach
