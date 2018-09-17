<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- blueprint CSS framework -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/docs.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dashboard.css"/>
    <style id="holderjs-style" type="text/css"></style>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container" style="width:350px;">
<!--    <a href="/index.php">Main Page</a>-->
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'email-form',
//    'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array(
            'class'=>'form-signin',
        ),
    )); ?>
<!--    123-->
<!--    <form class="form-signin" id="Account" name="Account" role="form" action="--><?php //echo Yii::app()->createUrl("account/account/login");?><!--" method="post">-->
        <h2 class="form-signin-heading">
            Login
<!--            <br/>-->
<!--            Please sign in-->
        </h2>
        <label class="text-info"><?php echo Yii::app()->user->getFlash('notice'); ?></label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required="" autofocus="">
        <?php echo $form->error($model,'email', array("class"=>"text-danger")); ?>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
        <?php echo $form->error($model,'password', array("class"=>"text-danger")); ?>
        <label class="checkbox">
            <input type="checkbox" value="remember-me" name="rememberMe" id="rememberMe"> Remember me&nbsp;
        </label>

        <button class="btn btn-lg btn-primary btn-block" id="admin" type="submit">Login</button>
    <?php $this->endWidget(); ?>

    <!--    </form>-->

</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


</body>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


</body>
</html>
