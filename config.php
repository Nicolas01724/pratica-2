<?php
declare(strict_types = 1);

define("VIEW_PATH", "");
define("ROOT_PATH", __DIR__);
define("CONSTROLLER_PATH", "\controllers");
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "EPTRAN_DS24M2");

include "Router.php";

foreach ($_POST as $key => $value) {
    $name = "_$key";
    $$name = $value;
}
