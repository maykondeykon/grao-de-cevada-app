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
    /* @var $api \gdc\CervejaApi */
    $api = $app['cerveja.gdc'];

    return $app['twig']->render('index.twig', array(
        'cervejas' => json_decode($api->getCerverjas()),
        'ranking' => json_decode($api->getRanking()),
        'imgResource' => $api->getImageResource(),
    ));
});



$app->run();