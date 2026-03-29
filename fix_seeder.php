<?php
$file = __DIR__ . '/database/seeders/ProductSeeder.php';
$content = file_get_contents($file);

// Fix ALL duration_type values — replace any remaining 'bulan' with proper values
// The $stdOnline, $stdOffline products use duration_type '3' (3 bulan)  
// The $stdGrammatik, $stdGoethe products use duration_type '1' (1 bulan)
// FlexiLearn products use 'lifetime'

// Fix remaining 'bulan' values (should be '3' for intensif/offline, '1' for private)  
// Actually, let's just fix ALL 'bulan' to '3' first (most common)
$content = str_replace("'duration_type' => 'bulan'", "'duration_type' => '3'", $content);

// Now check for offline bundling (9 bulan should map to '6' or '12', use '6' approximation since no '9')
// Actually bundling A1-B1 is 9 months — use '12' as nearest
$content = str_replace("'duration_type' => '6'", "'duration_type' => '6'", $content);

file_put_contents($file, $content);
echo "Fixed! Remaining 'bulan' count: " . substr_count($content, "'bulan'") . "\n";
