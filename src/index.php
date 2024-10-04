<?php
const MAX_POKEMON = 1025;
$id = rand(1, MAX_POKEMON);
$url = "https://pokeapi.co/api/v2/pokemon/$id";
$response = file_get_contents($url);
$data = json_decode($response, true);
$datos = [
    $data['id'],
    $data['name'],
    $data['abilities'][0]['ability']['name'],
    $data['sprites']['front_default']
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta a Pokemon Api</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function checkPokemon(answer, name) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("check").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "checkPokemon.php?answer=" + answer + "&name=" + name, true);
            xmlhttp.send();
        }
    </script>
</head>

<body class="bg-light">
    <img src="pokemon.png" class="rounded mx-auto d-block">
    <div class="container mt-5">
        <?php
        $vowels = array("a", "e", "i", "o", "u");
        $name = str_replace($vowels, "_", $datos[1]);
        echo "<div class='card mt-3 p-3 shadow-sm'>";
        echo "<h4 class='card-title'>Pokemon: <strong>" . ucfirst($name) . "</strong></h4>";
        echo "<p><strong>ID:</strong> $datos[0]</p>";
        echo "<p><strong>Habilidad:</strong> $datos[2]</p>";
        echo "<img src='$datos[3]' class='img-fluid' width='150px'>";
        echo "</div>";

        ?>

        <div class="mt-4">

            <div class="mb-3">
                <label for="pokemonId" class="form-label"><b>ADIVINA EL NOMBRE DEL POKEMON</b></label>
                <input type="text" id="pokemonId" name="pokemon" class="form-control" placeholder="Introduce el nombre del pokemon">
            </div>
            <div class="d-grid">
                <div class="w3-show-inline-block">
                    <div class="w3-bar">
                        <input type='button' onclick="checkPokemon(pokemonId.value, '<?php echo $datos[1];?>' )"
                            class="btn btn-primary" value="Comprobar">
                        <input type="button" onclick="location.href='.';" class="btn btn-dark"
                            style="margin-left: 10px" value="Siguiente" />
                    </div>

                </div>
                <div id='check'></div>
            </div>

            <!-- Bootstrap JS and Popper.js CDN -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>