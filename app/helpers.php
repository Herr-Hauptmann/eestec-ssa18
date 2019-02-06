<?php

if (! \function_exists('ssaconfig')) {
    function ssaconfig($prop) {
        $config = \file_exists(config_path('ssa.php')) ? 'ssa' : 'ssaexample';
        if (\is_array($prop)) {
            return config(["{$config}." . key($prop) => $prop[key($prop)]]);
        } 
        return config("{$config}." . $prop);
    }
}