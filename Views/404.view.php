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
                <div class="col-md-12">
                        <div class="well"><h2 style="text-align: center;">404 Can't find resource</h2></div>
                        <h3>Route: <code><?php echo Application::resolve('request')->getPath() ?></code></h3>
                        <h4>Have you tried:</h4>
                        <ul>
                            <li>Have you setup a proper domain e.g. `http://the-problem.local` with `/public` as the root?</li>
                            <li>Is this a broken link?</li>
                            <li>See `./README.md`</li>
                        </ul>
                    </div>
                </div>                
            </div>
        </div>  

        <?php Application::resolve('assetManager')->javascript('app.min.js'); ?>        

    </body>
</html>