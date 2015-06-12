<?php

use TheProblem\Application;

?>
<div class="nav-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    
                <ul class="nav nav-pills pull-right">
                    <li role="presentation">
                        <a class="empty">Navigation</a>
                    </li>
                    <li role="presentation">
                        <a href="<?php echo Application::resolve('assetManager')->url('') ?>">The Problem</a>
                    </li>
                    <li role="presentation">
                        <a href="<?php echo Application::resolve('assetManager')->url('/readMe') ?>">Read Me</a>
                    </li>
                </ul>                    
    
            </div>
        </div>
    </div>
</div>