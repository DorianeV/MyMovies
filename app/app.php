<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// Register service providers
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());

// Register services
$app['dao.category'] = $app->share(function ($app) {
    return new MyMovies\DAO\CategoryDAO($app['db']);
});
$app['dao.movie'] = $app->share(function ($app) {
    $movieDAO = new MyMovies\DAO\MovieDAO($app['db']);
    $movieDAO->setCategoryDAO($app['dao.category']);
    return $movieDAO;
});