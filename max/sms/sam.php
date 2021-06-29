<?php
session_start();
$_SESSION['aa']=77;
if (isset($_SESSION['order']))
    print($_SESSION['order']);
