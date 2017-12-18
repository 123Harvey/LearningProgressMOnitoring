<!DOCTYPE html>
<html>
<head>
	<title>Procurement Info</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token}}">
		<input type="file" name="procurement">
		<input type="submit" value="Import"></input>
</form>
</body>
</html>