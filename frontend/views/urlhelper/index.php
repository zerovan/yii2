<?php
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Url helper';
?>


<div class="container">
    <div class="row">
        <h4>Home</h4>
        <ul>
            <li><a href="<?= Url::home() ?>"><?= Url::home() ?></a></li>
            <li><a href="<?= Url::home(true) ?>"><?= Url::home(true) ?></a></li>
            <li><a href="<?= Url::home('https') ?>"><?= Url::home('https') ?></a></li>
        </ul>
    </div>
    <div class="row">
        <h4>Base</h4>
        <ul>
            <li><a href="<?= Url::base() ?>"><?= Url::base() ?></a></li>
            <li><a href="<?= Url::base(true) ?>"><?= Url::base(true) ?></a></li>
            <li><a href="<?= Url::base('https') ?>"><?= Url::base('https') ?></a></li>
        </ul>
    </div>
    <div class="row">
        <h4>toRoute</h4>
        <ul>
            <li><a href="<?= Url::toRoute(['/site/about']) ?>"><?= Url::toRoute(['/site/about']) ?></a></li>
            <li>
                <a href="<?= Url::toRoute(['/site/about', 'data1' => 123, 'data2' => 'myname']) ?>"><?= Url::toRoute(['/site/about', 'data1' => 123, 'data2' => 'myname']) ?></a>
            </li>
            <li><a href="<?= Url::toRoute('/site/about') ?>"><?= Url::toRoute('/site/about') ?></a></li>
            <li>
                <a href="<?= Url::toRoute('/site/about', 'https') ?>"><?= Url::toRoute('/site/about', 'https') ?></a>
            </li>
            <li>
                <a href="<?= Url::toRoute('@web/img/home-bg.jpg') ?>"><?= Url::toRoute('@web/img/home-bg.jpg') ?></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <h4>To</h4>
        <ul>
            <li><a href="<?= Url::to(['/site/about']) ?>"><?= Url::to(['/site/about']) ?></a></li>
            <li>
                <a href="<?= Url::to(['/site/about', 'data1' => 123, 'data2' => 'myname']) ?>"><?= Url::to(['/site/about', 'data1' => 123, 'data2' => 'myname']) ?></a>
            </li>
            <li><a href="<?= Url::to('/site/about') ?>"><?= Url::to('/site/about') ?></a></li>
            <li><a href="<?= Url::to('/site/about', 'https') ?>"><?= Url::to('/site/about', 'https') ?></a></li>
            <li><a href="<?= Url::to('@web/img/home-bg.jpg') ?>"><?= Url::to('@web/img/home-bg.jpg') ?></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <h4>Current</h4>
        <ul>
            <li><a href="<?= Url::current() ?>"><?= Url::current() ?></a></li>
            <li><a href="<?= Url::current(['name' => 'myname']) ?>"><?= Url::current(['name' => 'myname']) ?></a></li>
        </ul>
    </div>
    <div class="row">
        <h4>Remember</h4>
        <ul>
            <li><a href="<?= Url::remember() ?>"><?= Url::remember() ?></a></li>
            <li>
                <a href="<?= Url::remember(['site/about', 'testparam' => 'testvalue', 'tt' => 'Time'], 'rem1') ?>"></a>
            </li>
            <li>
                <a href="<?= Url::remember(['site/contact', 'testparam1' => '7543gdvg'], 'rem2') ?>"><?= Url::remember(['site/contact', 'testparam1' => '7543gdvg'], 'rem2') ?></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <h4>Relative</h4>
        <ul>
            <li>Relative: <?= Url::isRelative('/site/about') ?></li>
            <li>Not relative: <?= Url::isRelative('https://google.com') ?></li>
        </ul>
    </div>
</div>
