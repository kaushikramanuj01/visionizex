<?php
// Define the command to run your PHP script
$command = 'php /test_cron2.php';

// $command = 'php /path/to/your/php/script.php';
// /usr/local/bin/php /home/visioniz/public_html/path/to/cron/script

// Define the timing for the cron job (e.g., every minute)
$timing = '* * * * *';

// Append the command and timing to the crontab file
$crontab_entry = $timing . ' ' . $command . "\n";

// Write the crontab entry to a temporary file
$temp_file = tempnam(sys_get_temp_dir(), 'cron');
file_put_contents($temp_file, $crontab_entry);

// Add the cron job from the temporary file
exec('crontab ' . $temp_file);

// Remove the temporary file
unlink($temp_file);

echo 'Cron job added successfully.';
?>
