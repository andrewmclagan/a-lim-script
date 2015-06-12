<?php

use TheProblem\Application;

?>
<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>The Problem + The Solution</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php Application::resolve('assetManager')->css('app.min.css'); ?>
    </head>

    <body>

        <?php Application::resolve('response')->view('_navigation') ?>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="read-me">
                        <?php Application::resolve('response')->markdownView(__DIR__.'/../README.md') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="the-problem">
                        <?php Application::resolve('response')->markdownView(__DIR__.'/../THEPROBLEM.md') ?>
                    </div>
                </div>                
            </div>
        </div>  

        <?php Application::resolve('assetManager')->javascript('app.min.js'); ?>        

    </body>
</html>