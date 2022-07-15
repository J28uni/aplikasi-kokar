<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

echo"<meta http-equiv='refresh' content='0;url=index.html'/>";
exit;