<?php

$router->post('/', 'LinkController@store');
$router->get('/', 'LinkController@show');
$router->get('/stats', 'LinkStatsController@show');
