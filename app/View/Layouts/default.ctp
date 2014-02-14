<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
        .affix {
            position: fixed;
            top: 60px;
            width: 220px;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php
    echo $this->fetch('meta');
    echo $this->fetch('css');
    ?>
</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <?php echo $this->Html->link('Paris, pas la ville', array(
                'controller' => 'paris',
                'action' => 'index'
            ), array('class' => 'brand')); ?>
            <ul class="nav">
                <?php
                if (!AuthComponent::user())
                {
                ?>
                    <li><?php echo $this->Html->link('Connexion', array('controller' => 'parieurs',
                            'action' => 'connexion'
                        )); ?></li>
                    <li><?php echo $this->Html->link('Inscription', array('controller' =>'parieurs',
                            'action' => 'inscription'
                        )); ?></li>
                <?php
                }
                else{
                ?>
                    <li><?php echo $this->Html->link('Déconnexion', array('controller' =>'parieurs',
                            'action' => 'logout'
                        )); ?></li>
                    <li><?php echo $this->Html->link('Mon comte', array('controller' =>'parieurs',
                            'action' => 'mon_compte'
                        )); ?></li>
                    <li><?php echo $this->Html->link('Créer un pari', array('controller' =>'paris',
                            'action' => 'ajouter'
                        )); ?></li>
                    <li><?php echo $this->Html->link('Mes mises', array('controller' =>'paris',
                            'action' => 'mes_mises'
                        )); ?></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<div class="container jumbotron">

    <?php
    echo $this->Session->flash();
    echo $this->Session->flash('auth');
    echo $this->fetch('content'); ?>

</div><!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<?php echo $this->fetch('script'); ?>

</body>
</html>
