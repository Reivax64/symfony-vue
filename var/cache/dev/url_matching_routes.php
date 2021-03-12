<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, null, null, false, false, null]],
        '/api/classe' => [[['_route' => 'api_classe_index', '_controller' => 'App\\Controller\\Api\\ClasseController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/cours' => [
            [['_route' => 'api_cours', '_controller' => 'App\\Controller\\Api\\CoursController::index'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_courscreate_cours', '_controller' => 'App\\Controller\\Api\\CoursController::createCours'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/cours/today' => [[['_route' => 'api_cours_today', '_controller' => 'App\\Controller\\Api\\CoursController::today'], null, ['GET' => 0], null, false, false, null]],
        '/api/matiere' => [[['_route' => 'api_matiere_index', '_controller' => 'App\\Controller\\Api\\MatiereController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/professeurs' => [[['_route' => 'api_professeurs_index', '_controller' => 'App\\Controller\\Api\\ProfesseurController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/salles' => [[['_route' => 'api_cours_index', '_controller' => 'App\\Controller\\Api\\SalleController::index'], null, ['GET' => 0], null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/professeurs' => [[['_route' => 'professeurs_index', '_controller' => 'App\\Controller\\ProfesseurController::index'], null, ['GET' => 0], null, false, false, null]],
        '/professeurs/create' => [[['_route' => 'professeurs_create', '_controller' => 'App\\Controller\\ProfesseurController::create'], null, ['POST' => 0, 'GET' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/(?'
                    .'|cours/(?'
                        .'|classe/([^/]++)(?'
                            .'|(*:77)'
                            .'|/(?'
                                .'|today(*:93)'
                                .'|between/([^/]++)/([^/]++)(*:125)'
                                .'|days/([^/]++)(*:146)'
                            .')'
                        .')'
                        .'|between/([^/]++)/([^/]++)(*:181)'
                        .'|days/([^/]++)(*:202)'
                    .')'
                    .'|professeurs/(?'
                        .'|([^/]++)(?'
                            .'|(*:237)'
                            .'|/avis(?'
                                .'|(*:253)'
                            .')'
                        .')'
                        .'|avis/([^/]++)(?'
                            .'|(*:279)'
                        .')'
                    .')'
                    .'|salles/([^/]++)(*:304)'
                .')'
                .'|/professeurs/(?'
                    .'|update/([^/]++)(*:344)'
                    .'|delete/([^/]++)(*:367)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        77 => [[['_route' => 'api_coursby_classe', '_controller' => 'App\\Controller\\Api\\CoursController::indexByClasse'], ['id'], ['GET' => 0], null, false, true, null]],
        93 => [[['_route' => 'api_cours_today_by_classe', '_controller' => 'App\\Controller\\Api\\CoursController::todayByClasse'], ['id'], ['GET' => 0], null, false, false, null]],
        125 => [[['_route' => 'api_cours_between_by_classe', '_controller' => 'App\\Controller\\Api\\CoursController::betweenByClasse'], ['id', 'datedebut', 'dateend'], ['GET' => 0], null, false, true, null]],
        146 => [[['_route' => 'api_cours_add_days_by_classe', '_controller' => 'App\\Controller\\Api\\CoursController::addDaysByClasse'], ['id', 'nb_add_days'], ['GET' => 0], null, false, true, null]],
        181 => [[['_route' => 'api_cours_between', '_controller' => 'App\\Controller\\Api\\CoursController::between'], ['datedebut', 'dateend'], ['GET' => 0], null, false, true, null]],
        202 => [[['_route' => 'api_cours_add_days', '_controller' => 'App\\Controller\\Api\\CoursController::addDays'], ['nb_add_days'], ['GET' => 0], null, false, true, null]],
        237 => [[['_route' => 'api_professeurs_show', '_controller' => 'App\\Controller\\Api\\ProfesseurController::detail'], ['id'], ['GET' => 0], null, false, true, null]],
        253 => [
            [['_route' => 'api_professeurs_index_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::indexAvis'], ['id'], ['GET' => 0], null, false, false, null],
            [['_route' => 'api_professeurs_create_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::createAvis'], ['id'], ['POST' => 0], null, false, false, null],
        ],
        279 => [
            [['_route' => 'api_professeurs_delete_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::deleteAvis'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_professeurs_update_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::updateAvis'], ['id'], ['PATCH' => 0], null, false, true, null],
        ],
        304 => [[['_route' => 'api_cours_detail', '_controller' => 'App\\Controller\\Api\\SalleController::detail'], ['id'], ['GET' => 0], null, false, true, null]],
        344 => [[['_route' => 'professeurs_update', '_controller' => 'App\\Controller\\ProfesseurController::update'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        367 => [
            [['_route' => 'professeurs_delete', '_controller' => 'App\\Controller\\ProfesseurController::delete'], ['id'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
