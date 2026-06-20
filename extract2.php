<?php
$c = file_get_contents('resources/views/pages/services/category.blade.php');
preg_match('/<span class="font-bold leading-tight">([^<]+)<\/span>\s*<span class="text-\[10px\] uppercase">Services<\/span>/', $c, $m);
echo base64_encode($m[1]) . "\n";
?>
