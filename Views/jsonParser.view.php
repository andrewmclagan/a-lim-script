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

    <body class="the-problem-page">

        <?php Application::resolve('response')->view('_navigation') ?>

        <!-- AngularJS Application -->
        <section ng-app="theProblem" class="container">

            <div ng-controller="TheProblemCtrl">

                <!-- Dump the input string -->
                <?php include_once __DIR__ . '/../input_string.php'; ?>

                <!-- Output some JS globals -->
                <script>
                    var appBaseURL = '<?php echo Application::resolve('assetManager')->url(); ?>';
                </script>

                <div class="row">

                    <div class="col-md-6">
                        <h3>Original JSON</h3>
                        <pre><code class="javascript" id="graph-data">{{ data.graphData }}</code></pre>
                    </div>

                    <div class="col-md-6">
                        <h3>Processed JSON</h3>
                        <pre><code class="javascript" id="processed-data">{{ data.processedData }}</code></pre>
                    </div>


                </div>

                <div class="row">

                    <div class="col-md-12">
                        <h3>Var Dump Data</h3>
                        <pre><code class="html" id="dumped-data">Awaiting User Interaction...</code></pre>
                    </div>

                </div>                

                <div class="row">
                    <div class="col-md-2 col-md-offset-5">
                        <button class="btn btn-primary btn-large" ng-click="processData()">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                             Process data
                        </button>
                    </div>
                </div>

            </div>

        </section>
        <!-- / AngularJS Application -->

        <div class="spinner-bk spinner-part"></div>
        <div class="sk-spinner spinner-part sk-spinner-double-bounce">
            <div class="sk-spinner sk-spinner-rotating-plane"></div>
        </div>          


        <?php Application::resolve('assetManager')->javascript('app.min.js'); ?>

    </body>
</html>