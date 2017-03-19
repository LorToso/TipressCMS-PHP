<?php
require_once 'vendor/autoload.php';
require_once 'generated-conf/config.php';

foreach (glob("generated-classes/Map/*.php") as $c) {
    require_once $c;
}
foreach (glob("generated-classes/Base/*.php") as $c) {
    require_once $c;
}
foreach (glob("generated-classes/*.php") as $c) {
    require_once $c;
}