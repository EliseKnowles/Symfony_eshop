<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    'admin' => [[], ['_controller' => 'App\\Controller\\AdminController::index'], [], [['text', '/admin']], [], []],
    'commande' => [[], ['_controller' => 'App\\Controller\\CommandeController::index'], [], [['text', '/commande']], [], []],
    'commande_achat' => [[], ['_controller' => 'App\\Controller\\CommandeController::achat'], [], [['text', '/commande/achat']], [], []],
    'panier' => [[], ['_controller' => 'App\\Controller\\PanierController::index'], [], [['text', '/']], [], []],
    'panier_delete' => [['id'], ['_controller' => 'App\\Controller\\PanierController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/panier/delete']], [], []],
    'produits' => [[], ['_controller' => 'App\\Controller\\ProduitsController::index'], [], [['text', '/produits/']], [], []],
    'produit_new' => [[], ['_controller' => 'App\\Controller\\ProduitsController::new'], [], [['text', '/produits/new']], [], []],
    'produit_view' => [['id'], ['_controller' => 'App\\Controller\\ProduitsController::produit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/produits']], [], []],
    'edit_produit' => [['id'], ['_controller' => 'App\\Controller\\ProduitsController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/produits/edit']], [], []],
    'produit_delete' => [['id'], ['_controller' => 'App\\Controller\\ProduitsController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/produits/produits/delete']], [], []],
    'app_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/register']], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], []],
    'user' => [['id'], ['_controller' => 'App\\Controller\\UserController::index'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
    'edit_role' => [['id'], ['_controller' => 'App\\Controller\\UserController::edit_role'], [], [['text', '/editRole'], ['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
];
