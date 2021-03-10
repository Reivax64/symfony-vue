<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    'admin' => [[], ['_controller' => 'App\\Controller\\Admin\\DashboardController::index'], [], [['text', '/admin']], [], []],
    'api_cours' => [[], ['_controller' => 'App\\Controller\\Api\\CoursController::index'], [], [['text', '/api/cours']], [], []],
    'api_cours_today' => [[], ['_controller' => 'App\\Controller\\Api\\CoursController::today'], [], [['text', '/api/cours/today']], [], []],
    'api_cours_between' => [['datedebut', 'dateend'], ['_controller' => 'App\\Controller\\Api\\CoursController::between'], [], [['variable', '/', '[^/]++', 'dateend', true], ['variable', '/', '[^/]++', 'datedebut', true], ['text', '/api/cours/between']], [], []],
    'api_cours_add_days' => [['nb_add_days'], ['_controller' => 'App\\Controller\\Api\\CoursController::addDays'], [], [['variable', '/', '[^/]++', 'nb_add_days', true], ['text', '/api/cours/days']], [], []],
    'api_courscreate_cours' => [[], ['_controller' => 'App\\Controller\\Api\\CoursController::createCours'], [], [['text', '/api/cours/create']], [], []],
    'api_professeurs_index' => [[], ['_controller' => 'App\\Controller\\Api\\ProfesseurController::index'], [], [['text', '/api/professeurs']], [], []],
    'api_professeurs_show' => [['id'], ['_controller' => 'App\\Controller\\Api\\ProfesseurController::detail'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/professeurs']], [], []],
    'api_professeurs_index_avis' => [['id'], ['_controller' => 'App\\Controller\\Api\\ProfesseurController::indexAvis'], [], [['text', '/avis'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/professeurs']], [], []],
    'api_professeurs_create_avis' => [['id'], ['_controller' => 'App\\Controller\\Api\\ProfesseurController::createAvis'], [], [['text', '/avis'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/professeurs']], [], []],
    'api_professeurs_delete_avis' => [['id'], ['_controller' => 'App\\Controller\\Api\\ProfesseurController::deleteAvis'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/professeurs/avis']], [], []],
    'api_professeurs_update_avis' => [['id'], ['_controller' => 'App\\Controller\\Api\\ProfesseurController::updateAvis'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/professeurs/avis']], [], []],
    'api_cours_index' => [[], ['_controller' => 'App\\Controller\\Api\\SalleController::index'], [], [['text', '/api/salles']], [], []],
    'api_cours_detail' => [['id'], ['_controller' => 'App\\Controller\\Api\\SalleController::detail'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/salles']], [], []],
    'professeurs_index' => [[], ['_controller' => 'App\\Controller\\ProfesseurController::index'], [], [['text', '/professeurs']], [], []],
    'professeurs_create' => [[], ['_controller' => 'App\\Controller\\ProfesseurController::create'], [], [['text', '/professeurs/create']], [], []],
    'professeurs_update' => [['id'], ['_controller' => 'App\\Controller\\ProfesseurController::update'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/professeurs/update']], [], []],
    'professeurs_delete' => [['id'], ['_controller' => 'App\\Controller\\ProfesseurController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/professeurs/delete']], [], []],
];
