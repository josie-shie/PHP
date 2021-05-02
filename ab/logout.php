<?php
session_start();
session_destroy();
header("Refresh: 9; url=./index.php");