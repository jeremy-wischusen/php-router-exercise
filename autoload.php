<?php
    spl_autoload_register(
        function ($classname) {
            $classname = str_replace("\\", DIRECTORY_SEPARATOR, $classname);
            include $classname . '.php';
        }
    );
