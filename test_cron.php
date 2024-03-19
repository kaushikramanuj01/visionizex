<?php
// Define the command to run your PHP script
$command = 'php /test_cron2.php'; // Update with your actual PHP script path

// Define the timing for the cron job (e.g., every minute)
$timing = '* * * * *';

// Append the command and timing to the crontab file
$crontab_entry = $timing . ' ' . $command . "\n";

// Write the crontab entry to a temporary file
$temp_file = tempnam(sys_get_temp_dir(), 'cron');
if (!$temp_file) {
    echo 'Error creating temporary file.';
    exit;
}

if (!file_put_contents($temp_file, $crontab_entry)) {
    echo 'Error writing to temporary file.';
    exit;
}

// Add the cron job from the temporary file
$output = shell_exec('crontab ' . $temp_file);
if (!$output) {
    echo 'Error adding cron job. Check permissions and command syntax.';
    exit;
}

// Remove the temporary file
unlink($temp_file);

echo 'Cron job added successfully.';
?>