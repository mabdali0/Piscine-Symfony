<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    'index' => [[], ['_controller' => 'App\\Controller\\DatabaseController::index'], [], [['text', '/e01']], [], [], []],
    'create_table' => [[], ['_controller' => 'App\\Controller\\DatabaseController::createTable'], [], [['text', '/create-table']], [], [], []],
];
