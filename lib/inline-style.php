<?php

// main-style-inline-css

$inline_style_selectors = array(
    'body' => array(
        'background-color' => 'themename_color_picker'
    )
);

$inline_css = '';

foreach($inline_style_selectors as $key => $selector) {
    $inline_css .= "{$key} {";
        foreach($selector as $i => $value) {
            $inline_css .= "{$i} :" . get_theme_mod($value, 'red') . ";";
        }
    $inline_css .= "}";
};


// $color_code = get_theme_mod('themename_color_picker', 'red');

// $inline_css = "
//     body {
//         background-color : {$color_code}
//     }
// ";