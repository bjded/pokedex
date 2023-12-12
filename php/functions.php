<?php
    // AOS Random
    function aosRandom() {
        switch (rand(1, 4)) {
            case 1:
                return "fade-up";
                break;
            case 2:
                return "fade-down";
                break;
            case 3:
                return "fade-right";
                break;
            case 4:
                return "fade-left";
                break;
        }
    }

    function urlize($str) {
        // Convert the string to lowercase
        $str = strtolower($str);
        
        // Replace ♂ with -m and ♀ with -f
        $str = str_replace('♂', '-m', $str);
        $str = str_replace('♀', '-f', $str);

        // Remove special characters and spaces
        $str = preg_replace('/[^a-z0-9]+/', '-', $str);
        
        // Remove leading and trailing hyphens
        $str = trim($str, '-');
        
        return $str;
    }
?>
