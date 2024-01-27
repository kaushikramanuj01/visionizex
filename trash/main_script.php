
<?php
// exec('php background_script.php > /dev/null 2>&1 &');
exec('php background_script.php >> background_log.txt 2>&1 &');

echo 'Background process started.';
?>
