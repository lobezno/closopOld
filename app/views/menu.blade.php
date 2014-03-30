<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<ul>
		<li><a href=”{{ route(‘pasta_meatballs’, array($idTable, ‘long’)) }}”>Pasta larga</a></li>
		<li><a href=”{{ route(‘pasta_meatballs’, array($idTable, ‘short’)) }}”>Pasta corta</a></li>
	</ul>	
</body>
</html>
