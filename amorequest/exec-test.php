<?php
exec('whoami', $output, $code);
echo "<pre>";
echo "Return code: $code\n";
print_r($output);
echo "</pre>";