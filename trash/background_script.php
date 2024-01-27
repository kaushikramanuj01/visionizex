
<?php
sleep(6); // Simulate some time-consuming process
file_put_contents('output.txt', 'Process completed at ' . date('Y-m-d H:i:s'));
?>
