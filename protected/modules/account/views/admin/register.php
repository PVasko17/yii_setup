<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */

//$this->breadcrumbs=array(
//	'Register',
//);
//?>
<!---->
<!--<h1>Register</h1>-->
<!---->
<!--<div class="form">-->
<!---->
<?php //$form=$this->beginWidget('CActiveForm', array(
//	'id'=>'account-form',
//	'enableClientValidation'=>true,
//	'enableAjaxValidation'=>false,
//)); ?>
<!---->
<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->
<!---->
<!--	--><?php //echo $form->errorSummary($model); ?>
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'email'); ?>
<!--		--><?php //echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
<!--		--><?php //echo $form->error($model,'email'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'confirmEmail'); ?>
<!--		--><?php //echo $form->textField($model,'confirmEmail',array('size'=>60,'maxlength'=>128)); ?>
<!--		--><?php //echo $form->error($model,'confirmEmail'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'password'); ?>
<!--		--><?php //echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
<!--		--><?php //echo $form->error($model,'password'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'confirmPassword'); ?>
<!--		--><?php //echo $form->passwordField($model,'confirmPassword',array('size'=>60,'maxlength'=>128)); ?>
<!--		--><?php //echo $form->error($model,'confirmPassword'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton('Register'); ?>
<!--	</div>-->
<!---->
<?php //$this->endWidget(); ?>
<!---->
<!--</div><!-- form -->
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
<div class="container">
    <?php $form=$this->beginWidget('CActiveForm', array(
//    'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array(
            'class'=>'form-register',
        ),
    )); ?>
    <h2 class="form-signin-heading">Please register</h2>
    <?php //echo $form->errorSummary($model, array("class"=>"text-danger")); ?>

    <table class="table-condensed table">
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required="" autofocus="">
                <?php echo $form->error($model,'email', array("class"=>"text-danger")); ?>
            </td>
        </tr>
        <tr>
            <td>Confirm Email</td>
            <td>
                <input type="email" name="confirmEmail" id="confirmEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <?php echo $form->error($model,'confirmEmail', array("class"=>"text-danger")); ?>
            </td>
        </tr>
        <tr>
            <td>Firstname</td>
            <td>
                <input type="text" name="fname" id="fname" class="form-control" placeholder="Firstname">
                <?php echo $form->error($model,'fname', array("class"=>"text-danger")); ?>
            </td>
        </tr>
        <tr>
            <td>Lastname</td>
            <td>
                <input type="text" name="lname" id="lname" class="form-control" placeholder="Lastname">
                <?php echo $form->error($model,'lname', array("class"=>"text-danger")); ?>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                <?php echo $form->error($model,'password', array("class"=>"text-danger")); ?>
            </td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password" required="">
                <?php echo $form->error($model,'confirmPassword', array("class"=>"text-danger")); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label class="text-danger"><?php echo $error; ?></label>
                <button class="btn btn-lg btn-primary btn-block" style="float: right" type="submit">Register</button>
            </td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
    <!--    </form>-->
</div> <!-- /container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>