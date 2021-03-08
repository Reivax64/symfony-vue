<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, null, null, false, false, null]],
        '/api/cours' => [[['_route' => 'api_cours_index', '_controller' => 'App\\Controller\\Api\\CoursController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/cours/today' => [[['_route' => 'api_cours__today', '_controller' => 'App\\Controller\\Api\\CoursController::today'], null, ['GET' => 0], null, false, false, null]],
        '/api/professeurs' => [[['_route' => 'api_professeurs_index', '_controller' => 'App\\Controller\\Api\\ProfesseurController::index'], null, ['GET' => 0], null, false, false, null]],
        '/professeurs' => [[['_route' => 'professeurs_index', '_controller' => 'App\\Controller\\ProfesseurController::index'], null, ['GET' => 0], null, false, false, null]],
        '/professeurs/create' => [[['_route' => 'professeurs_create', '_controller' => 'App\\Controller\\ProfesseurController::create'], null, ['POST' => 0, 'GET' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/professeurs/(?'
                    .'|([^/]++)(?'
                        .'|(*:73)'
                        .'|/avis(?'
                            .'|(*:88)'
                        .')'
                    .')'
                    .'|avis/([^/]++)(?'
                        .'|(*:113)'
                    .')'
                .')'
                .'|/professeurs/(?'
                    .'|update/([^/]++)(*:154)'
                    .'|delete/([^/]++)(*:177)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        73 => [[['_route' => 'api_professeurs_show', '_controller' => 'App\\Controller\\Api\\ProfesseurController::detail'], ['id'], ['GET' => 0], null, false, true, null]],
        88 => [
            [['_route' => 'api_professeurs_index_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::indexAvis'], ['id'], ['GET' => 0], null, false, false, null],
            [['_route' => 'api_professeurs_create_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::createAvis'], ['id'], ['POST' => 0], null, false, false, null],
        ],
        113 => [
            [['_route' => 'api_professeurs_delete_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::deleteAvis'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_professeurs_update_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::updateAvis'], ['id'], ['PATCH' => 0], null, false, true, null],
        ],
        154 => [[['_route' => 'professeurs_update', '_controller' => 'App\\Controller\\ProfesseurController::update'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        177 => [
            [['_route' => 'professeurs_delete', '_controller' => 'App\\Controller\\ProfesseurController::delete'], ['id'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
