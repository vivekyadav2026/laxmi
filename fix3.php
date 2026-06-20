<?php
$files = [
    'resources/views/pages/service-generic.blade.php',
    'resources/views/pages/services/category.blade.php',
    'resources/views/pages/services/index.blade.php'
];

$home_utf8 = "\xE0\xA4\x99\xE0\xA5\x8B\xE0\xA4\xAE"; // होम
$services_utf8 = "\xE0\xA4\xB8\xE0\xA4\xAD\xE0\xA5\x80 \xE0\xA4\xB8\xE0\xA5\x87\xE0\xA4\xB5\xE0\xA4\xBE\xE0\xA4\x8F\xE0\xA4\x82"; // सभी सेवाएं

$home_corrupted = base64_decode('w6DCpMK5w6DCpeKAucOgwqTCrg==');
$services_corrupted = base64_decode('w6DCpMK4w6DCpMKtw6DCpeKCrCDDoMKkwrjDoMKl4oChw6DCpMK1w6DCpMK+w6DCpCDDoMKk4oCa');

foreach ($files as $file) {
    if (!file_exists($file)) continue;
    $content = file_get_contents($file);

    $content = str_replace($home_corrupted, $home_utf8, $content);
    $content = str_replace($services_corrupted, $services_utf8, $content);

    file_put_contents($file, $content);
    echo "Fixed $file\n";
}
?>
