<?php
//注册静态资源 输出用$this->head();
use \yii\bootstrap\NavBar;
use \yii\bootstrap\Nav;
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
app\assets\AppAsset::register($this)
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php echo $this->head();?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
<?php
NavBar::begin([
    'brandLabel' => 'My Company',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'items' => [
        [
            'label' => 'Home',
            'url' => ['site/index'],
            'linkOptions' => ['class'=>'style'],  //设置链接的样式
        ],
        [
            'label' => 'Dropdown',
            'items' => [
                ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                '<li class="divider"></li>',
                '<li class="dropdown-header">Dropdown Header</li>',
                ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
            ],
        ],
        [
            'label' => 'Login',
            'url' => ['site/login'],
            'visible' => Yii::$app->user->isGuest
        ],
    ],
    'options' => ['class' =>'nav-pills'], // 设置导航的样式
]);
?>
<?php NavBar::end();?>
    <div class="container">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    //文本框的标题
    <?= $form->field($model, 'name')->label('文本框的标题') ?>

    //文本框下方的提示
    <?= $form->field($model, 'title')->hint('测试hint'); ?>

    //input(type) type的类型有 text password等
    <?= $form->field($model, 'age')->input('text')?>

    //简单文本框
    <?= $form->field($model, 'age')->textInput(['maxlength' => true])?>

    //隐藏文本框
    <?= $form->field($model, 'age')->hiddenInput() ?>

    //密码文本框，应用于登录的密码输入框
    <?= $form->field($model, 'age')->passwordInput() ?>

    //文本域 应用于输入内容较多比如文章简介等 rows=>3 表示文本域高为3
    <?= $form->field($model, 'age')->textarea(['rows'=>'3']) ?>

    //文件上传
    <?= $form->field($model, 'age')->fileInput() ?>

    //勾选框
    <?= $form->field($model, 'age')->radio() ?>

    //多选框
    <?= $form->field($model, 'age')->checkbox() ?>

    //listbox
    <?= $form->field($model, 'age')->listBox(['0'=>'box1','1'=>'box2']) ?>

    //多谢框列表，常用
    <?= $form->field($model, 'age')->checkboxList(['0'=>'box1','1'=>'box2']) ?>

    //单选框列表，常用
    <?= $form->field($model, 'age')->radioList(['0'=>'radio1','1'=>'radio2'])?>

    //下拉框列表
    <?= $form->field($model, 'age')->dropDownList(
        ['1'=>'下拉选项1','2'=>'下拉选项2'],
        ['prompt' => '请选择']
    ) ?>

    //插件组件应用，比如yii2编辑器插件，图片上传插件
    <?= $form->field($model,'age')->widget(yii\captcha\Captcha::className())?>

    <div class="form-group">
        <?= Html::submitButton('按钮', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end();?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();?>