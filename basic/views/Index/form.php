<?php
use yii\helpers\Html;
use app\models\Userinfo;
use app\models\Acticle;
use yii\widgets\ActiveForm;
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'=> \yii\helpers\Url::toRoute(['index/user'])
]) ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'pass')->passwordInput() ?>
<?= $form->field($model, 'name')->textInput()->hint('Please enter your name')->label('Name') ?>
<?= $form->field($model, 'pass')->input('pass') ?>
<?/*= $form->field($model, 'Acticle')->dropdownList(
    Acticle::find()->select(['title', 'id'])->column(),
    ['prompt'=>'Select Category']
); */?>
<?//$form->field($model, 'items[]')->checkboxList(['a' => 'Item A', 'b' => 'Item B', 'c' => 'Item C']);?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>