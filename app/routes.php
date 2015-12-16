<?php

use Symfony\Component\HttpFoundation\Request;
use MyMovies\Domain\Comment;
use MyMovies\Form\Type\CommentType;

// Home page
$app->get('/', function () use ($app) {
    $categorys = $app['dao.category']->findAll();
    return $app['twig']->render('index.html.twig', array('categorys' => $categorys));
})->bind('home');