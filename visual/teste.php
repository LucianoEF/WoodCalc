<html>
<head>
<script type="text/javascript">
function teste(valor)
{
	if( valor=="novo" )
		window.open("../cadastro/socio_pop.php", "Cadastro de Socio", "width=300, height=200");
}
</script>
</head>

<body>
	<select name="teste" id="teste" onchange="teste( this.value );">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="novo">novo</option>
	</select>
</body>
</html>