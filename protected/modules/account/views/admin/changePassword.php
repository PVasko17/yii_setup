<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Account'=>array('account'),
	'Change Password',
);
?>

<h1>Change Password</h1>

<table class="table-condensed">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<tr>
        <td>
            <?php echo $form->labelEx($model,'password'); ?>
        </td>
        <td>
            <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
            <?php echo $form->error($model,'password'); ?>
        </td>
	</tr>

    <tr>
        <td>
            <?php echo $form->labelEx($model,'confirmPassword'); ?>
        </td>
        <td>
            <?php echo $form->passwordField($model,'confirmPassword',array('size'=>60,'maxlength'=>128)); ?>
            <?php echo $form->error($model,'confirmPassword'); ?>
        </td>
    </tr>

    <tr>
        <td>
            <?php echo $form->labelEx($model,'oldPassword'); ?>
        </td>
        <td>
            <?php echo $form->passwordField($model,'oldPassword',array('size'=>60,'maxlength'=>128)); ?>
            <?php echo $form->error($model,'oldPassword'); ?>
        </td>
    </tr>

	<tr>
        <td colspan="2" style="text-align: right">
            <?php echo CHtml::submitButton('Change'); ?>
        </td>
	</tr>

<?php $this->endWidget(); ?>

</table><!-- form -->
<script type="text/javascript">
    $(document).ready(function()
    {
        $("li[id*='top_']").removeClass("active");
        $("li[id*='side_']").removeClass("active");
        $("#top_settings").addClass("active");
    });
</script>