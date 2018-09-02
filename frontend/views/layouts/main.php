<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> </title>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php

    NavBar::begin([
        'brandLabel' => Yii::t('app',Yii::$app->name),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('app','users'), 'url' => ['/users/index']],
        ['label' => Yii::t('app','product'), 'url' => ['/orders/product']],
        ['label' => Yii::t('app','ticket'), 'url' => ['/ticket/index']],
        ['label' => Yii::t('app','order'), 'url' => ['/orders/index']],
        ['label' => Yii::t('app','comment'), 'url' => ['/comment/index']],
        ['label' => Yii::t('app','Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('app','About'), 'url' => ['/site/about']],
        ['label' => Yii::t('app','Contact'), 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('app','Signup'), 'url' => ['/site/signup']];
        $menuItems[] = ['label' => Yii::t('app','Login'), 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                Yii::t('app','Logout').'(' . Yii::$app->user->identity->user_username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?php
        //-----------create true array for passing into Url::to with complete paramas---------------
        $array = array(Yii::$app->controller->id. '/' .$this->context->action->id);
        foreach ($_GET as $key => $value)
        {
            $array[$key] = $value;
        }
        $array['language']='fa';

        ?>
        <a class="btn " href="<?= Url::to($array) ?>">Fa</a>/
        <?php $array['language']='en'; ?>
        <a class="btn " href="<?= Url::to($array) ?>">En</a>


<!--                <a class="btn " href="     Url::base().'/fa/'. Yii::$app->controller->id. '/' .$this->context->action->id        ">Fa</a>/ -->
<!--        <a class="btn "  href=" Url::base().'/en/'. Yii::$app->controller->id . '/' .$this->context->action->id            ">En</a>-->

                <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
