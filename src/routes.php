<?php

$app->get('/', 'HomeCtrl:index');

$app->get('/bars', 'BarsCtrl:index');

$app->get('/bars/register', 'BarsCtrl:register');