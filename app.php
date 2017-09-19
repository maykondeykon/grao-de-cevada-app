<?php

use Silex\Application;

require_once __DIR__.'/vendor/autoload.php';

$app = new Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));


$app['cerveja.gdc'] = function () use ($app) {
    return new \gdc\CervejaApi();
};

$app->get('/', function () use ($app) {
    $api = $app['cerveja.gdc'];
//    $cervejas =  json_decode($api->getCerverjas());
//
//    foreach ($cervejas as $cerveja) {
//        var_dump($cerveja);
//    }

    return $app['twig']->render('index.twig', array(
        'cervejas' => json_decode($api->getCerverjas()),
    ));
});



$app->run();