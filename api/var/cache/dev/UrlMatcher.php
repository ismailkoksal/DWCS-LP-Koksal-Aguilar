<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/cinema/admin' => [[['_route' => 'api_cinema_admin', '_controller' => 'App\\Controller\\ApiCinemaAdminController::index'], null, null, null, false, false, null]],
        '/api/cinemas' => [
            [['_route' => 'api_cinemas', '_controller' => 'App\\Controller\\ApiCinemaAdminController::listeCinemas'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_add_cinema', '_controller' => 'App\\Controller\\ApiCinemaAdminController::addCinema'], null, ['POST' => 0], null, false, false, null],
        ],
        '/admin/cinemas' => [[['_route' => 'liste_cinemas', '_controller' => 'App\\Controller\\CinemaAdminController::listeCinemas'], null, null, null, true, false, null]],
        '/admin/films' => [[['_route' => 'liste_films', '_controller' => 'App\\Controller\\CinemaAdminController::listeFilms'], null, null, null, true, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/a(?'
                    .'|pi/cinemas/([^/]++)(?'
                        .'|(*:69)'
                    .')'
                    .'|dmin/(?'
                        .'|films/(\\d+)(*:96)'
                        .'|cinemas/([^/]++)(*:119)'
                    .')'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        69 => [
            [['_route' => 'api_detail_cinema', '_controller' => 'App\\Controller\\ApiCinemaAdminController::detailCinema'], ['cinema'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_update_cinema', '_controller' => 'App\\Controller\\ApiCinemaAdminController::updateCinema'], ['cinema'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_delete_cinema', '_controller' => 'App\\Controller\\ApiCinemaAdminController::deleteCinema'], ['cinema'], ['DELETE' => 0], null, false, true, null],
        ],
        96 => [[['_route' => 'film_description', '_controller' => 'App\\Controller\\CinemaAdminController::obtenirUnFilm'], ['idFilm'], null, null, false, true, null]],
        119 => [
            [['_route' => 'detail_cinema', '_controller' => 'App\\Controller\\CinemaAdminController::detailCinema'], ['cinema'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
