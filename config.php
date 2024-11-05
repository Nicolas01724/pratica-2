<?php
declare(strict_types = 1);

define("ROOT_PATH", __DIR__);
define("MODEL_PATH", "\modelos");
define("VIEW_PATH", "\views");
define("CONTROLLER_PATH", "\controllers");
define("IMG_PATH", "\uploads");
define("IMG_ROUTER", "\uploads");
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "EPTRAN_DS24M2");

require_once "Router.php";
require_once "Controller.php";
require_once "Database.php";

foreach ($_POST as $key => $value) {
    $name = "_$key";
    $$name = $value;

}

function assert_array_keys(array $keys, array $array): bool {
    foreach ($keys as $key) {
        if (!array_key_exists($key, $array)) {
            return false;
        }
    }

    return true;
}
