// Variables
const back_to_top = document.getElementById("back-to-top");
const shiny_button = document.querySelectorAll(".shiny");
const search_input = document.getElementById("search-input");
const search_button = document.getElementById("search-button");

// Functions
function checkScrollPosition() {
    if (window.scrollY > 0) {
        back_to_top.style.visibility = "visible";
    } else {
        back_to_top.style.visibility = "hidden";
    }
}
function toggleShiny(img_src) {
    let temp_src = img_src.split(".");
    // If shiny, toggle back to normal sprite
    if (temp_src[0].includes("_s")) {
        temp_src[0] = temp_src[0].replace(/_s/g, "");
    } else {
        temp_src[0] += "_s";
    }
    return temp_src.join(".");
}
function search() {
    var term = search_input.value.toLowerCase().trim();
    var current_pokemon = "000";

    // Adjust for number or name
    if (/^\d+$/.test(term)) {
        current_pokemon = document.getElementById(term.padStart(3, "0"));
    } else {
        current_pokemon = document.getElementById(term);
    }

    if (current_pokemon) {
        var rect = current_pokemon.getBoundingClientRect();
        var offset = 250;

        // Scroll to Pokemon
        window.scrollTo({
            top: (window.scrollY + rect.top) - offset,
            block: 'center'
        });

        var pokemon = current_pokemon.closest(".pokemon");

        setTimeout(function() {
            pokemon.style.outline = "2px solid #033570";
        }, 500);
        setTimeout(function() {
            pokemon.style.outline = "none";
        }, 2000);

        // Clear chat
        search_input.value = "";
    } else {
        alert(term.toUpperCase() + " was not found. Please check your spelling and try again.");
    }
}

// Show Back to Top
window.addEventListener("scroll", function() {
    checkScrollPosition();
});

// Back to Top
back_to_top.addEventListener("click", function() {
    window.scrollTo({
        top: 0
    });
});

// Search
search_input.addEventListener("keydown", function(e) {
    if (e.key === "Enter") {
        search();
    }
})
search_button.addEventListener("click", function() {
    search();
});

// Toggle Shiny
shiny_button.forEach(button => {
    button.addEventListener("click", function() {
        const pokemon = this.closest('.pokemon');
        const sprite = pokemon.querySelector('.sprite');
        const img_src = sprite ? sprite.getAttribute('src') : null;

        // Toggle Icon
        if (button.src.includes("_x")) {
            button.src = "img/icon_shiny.webp";
            button.setAttribute("title", "View Shiny");
        } else {
            button.src = "img/icon_x.webp";
            button.setAttribute("title", "View Regular");
        }

        sprite.src = toggleShiny(img_src);
    });
});

// Init
AOS.init({once: true});
