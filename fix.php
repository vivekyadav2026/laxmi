<?php
$files = [
    'resources/views/pages/service-generic.blade.php',
    'resources/views/pages/services/category.blade.php',
    'resources/views/pages/services/index.blade.php'
];

$home_utf8 = "\xE0\xA4\x99\xE0\xA5\x8B\xE0\xA4\xAE";
$services_utf8 = "\xE0\xA4\xB8\xE0\xA4\xAD\xE0\xA5\x80 \xE0\xA4\xB8\xE0\xA5\x87\xE0\xA4\xB5\xE0\xA4\xBE\xE0\xA4\x8F\xE0\xA4\x82";

foreach ($files as $file) {
    if (!file_exists($file)) continue;
    $content = file_get_contents($file);

    // Replace Home
    $content = preg_replace(
        '/(<span class="font-bold leading-tight">)(.*?)(<\/span>\s*<span class="text-\[10px\] uppercase">Home<\/span>)/s',
        '$1' . $home_utf8 . '$3',
        $content
    );

    // Replace Services
    $content = preg_replace(
        '/(<span class="font-bold leading-tight">)(.*?)(<\/span>\s*<span class="text-\[10px\] uppercase">(All )?Services<\/span>)/s',
        '$1' . $services_utf8 . '$3',
        $content
    );

    file_put_contents($file, $content);
    echo "Fixed $file\n";
}
?>
