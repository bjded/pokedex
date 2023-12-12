<?php
    // File path
    $json_path = "js/p-essentials.json";
    // Read the file
    $json_data = file_get_contents($json_path);
    // Parse the data
    $pokemon_data = json_decode($json_data, true);

    // Display Limit
    $display_limit = 649;

    require_once("php/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gen 1-5 Pokedex</title>
    <link rel="icon" type="image/webp" href="img/favicon.webp">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
    <div id="top"></div>
    <div id="logo">
        <img src="img/pokemon-logo.webp" alt="Pokemon logo">
        <h1>Pokemon Gen 1-5 Pokedex</h1>
        <small>All Pokémon assets are the property of Game Freak and Nintendo.</small>
        <!-- Search -->
        <div id="search">
            <label for="search-input"><span class="sr-only">Find a Pokemon</span></label>
            <input type="text" name="" id="search-input" placeholder="Find a Pokemon..">
            <button id="search-button">Search</button>
        </div>
    </div>

    <div id="pokedex">
        <?php for ($i = 0; $i < $display_limit; $i++) : ?>
            <div class="pokemon" data-aos="<?= aosRandom(); ?>">
                <!-- Icons -->
                <div class="icons">
                    <!-- Shiny -->
                    <img class="icon shiny" src="img/icon_shiny.webp" loading="lazy" title="View Shiny">
                </div>

                <!-- Image -->
                <div class="sprite-container">
                    <img class="sprite" src="img/pokemon/<?= urlize($pokemon_data[$i]['Name']); ?>.gif" alt="<?= $pokemon_data[$i]['Name']; ?>" loading="lazy">
                </div>

                <!-- Number -->
                <p id="<?= sprintf("%03d", $i+1); ?>" class="number">#<?= sprintf("%03d", $i+1); ?></p>

                <!-- Name(s) -->
                <p id="<?= strtolower($pokemon_data[$i]['Name']); ?>" class="name"><?= $pokemon_data[$i]['Name']; ?></p>

                <!-- Type(s) -->
                <div class="type">
                    <?php
                        $types = str_getcsv($pokemon_data[$i]["Types"]);
                        foreach ($types as $type) {
                            echo "<span class=".strtolower($type).">".$type."</span>";
                        }
                    ?>
                </div>
            </div>
        <?php endfor; ?>
    </div>

    <a href="javascript:void(0)" id="back-to-top" class="smooth">
        <img src="img/icon_up_arrow.webp" alt="back to top">
    </a>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
