<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Desc</th>
			<th>Dokumen</th>
		</tr>

		@foreach($file as $key=>$data)
		<tr>
			<td>{{++$key}}</td>
			<td>{{$data->title}}</td>
			<td>{{$data->description}}</td>
			<td><a href="{{url('moyai/'.$data->file)}}">{{$data->file}}</a></td>
		</tr>
		@endforeach
	</table>
	
</body>
</html>