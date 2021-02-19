<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sitio web en construcci&oacute;n</title>
	<link rel="icon" type="image/png" href="/favicon.png">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
	<style>
		* {
		    font-family: Montserrat;
		    margin: 0;
		    padding: 0;
		}
		body {
		    display: flex;
		    justify-content: center;
		    align-items: center;
		    min-height: 100vh;
		    overflow: hidden;
		}
		#contenido {
		    padding: 1rem;
		    display: flex;
		    flex-direction: column;
		    justify-content: center;
		    align-items: center;
		    text-align: center;
		    line-height: 2.1rem;
		}
		#contenido img {
		    max-width: 100%;
		}
		h1 {
		    margin-top: 2rem;
		    font-weight: 500;
		}
		div#nodo1 {
		    position: absolute;
		    top: 0;
		    left: 0;
		    border-right: 5px solid black;
		    border-bottom: 5px solid black;
		    width: 25%;
		    height: 3rem;
		}
		div#c1 {
		    position: absolute;
		    bottom: -10.5px;
		    right: -10.5px;
		    width: 10px;
		    height: 10px;
		    border: 5px solid black;
		    background-color: #bc0000;
		    border-radius: 50%;
		}
		#nodo2 {
		    position: absolute;
		    top: 0;
		    right: 0;
		    border-left: 5px solid black;
		    border-bottom: 5px solid black;
		    width: 12%;
		    height: 6rem;
		}
		div#c2 {
		    position: absolute;
		    bottom: -10.5px;
		    left: -10.5px;
		    width: 10px;
		    height: 10px;
		    border: 5px solid black;
		    background-color: #bc0000;
		    border-radius: 50%;
		}
		div#c3 {
		    position: absolute;
		    top: -10.5px;
		    left: -10.5px;
		    width: 10px;
		    height: 10px;
		    border: 5px solid black;
		    background-color: #bc0000;
		    border-radius: 50%;
		}
		div#c4 {
		    position: absolute;
		    top: -10.5px;
		    right: -10.5px;
		    width: 10px;
		    height: 10px;
		    border: 5px solid black;
		    background-color: #bc0000;
		    border-radius: 50%;
		}
		div#nodo3 {
		    position: absolute;
		    bottom: 0;
		    /* right: 0; */
		    border-left: 5px solid black;
		    border-right: 5px solid black;
		    border-top: 5px solid black;
		    width: 50%;
		    height: 3rem;
		}
	</style>
</head>
<body>
	<div id="nodo1">
		<div id="c1"></div>
	</div>
	<div id="nodo2">
		<div id="c2"></div>
	</div>
	<div id="contenido">
		<img src="https://www.nodorojo.com/w2020/img/NR_logo.png" alt="Nodo Rojo">
		<h1>Sitio web en construcci&oacute;n</h1>
	</div>
	<div id="nodo3">
		<div id="c3"></div>
		<div id="c4"></div>
	</div>
</body>
</html>