<?php
function analyzeWebsite($url) {
    $start = microtime(true);
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($ch);
    curl_close($ch);
    
    $load_time = microtime(true) - $start;
    $word_count = str_word_count(strip_tags($html));
    $image_count = substr_count($html, '<img');
    $link_count = substr_count($html, '<a');
    $script_count = substr_count($html, '<script');

    return [
        'load_time' => $load_time,
        'word_count' => $word_count,
        'image_count' => $image_count,
        'link_count' => $link_count,
        'script_count' => $script_count
    ];
}
?>
