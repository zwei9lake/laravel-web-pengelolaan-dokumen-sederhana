<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Details</title>
</head>
<body>
	<h2>{{$data->title}}</h2>
	<h3>{{$data->description}}</h3>
	<p>
		<iframe src="{{url('moyai/'.$data->file)}}" style="width:600px height:700px"></iframe>
	</p>
</body>
</html>