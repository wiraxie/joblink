<?php 

if ($query==""){var_dump(http_response_code(404));ob_clean();echo '[{"status":"404","message":"api not found"}]';}

?>