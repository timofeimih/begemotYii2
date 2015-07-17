<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

\frontend\assets\FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <script type="text/javascript" src="http://consultsystems.ru/script/27338/" charset="utf-8"></script>
    <?php $this->head() ?>
    
    <?= Html::csrfMetaTags() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'Calls-Express',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => Yii::t('frontend', 'Home'), 'url' => ['/']],
                // ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
                // ['label' => Yii::t('frontend', 'Articles'), 'url' => ['/article/index']],
                // ['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']],
                ['label' => Yii::t('frontend', 'Создать кнопку звонка'), 'url' => ['/generate']],
                ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest],
                ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login'], 'visible'=>Yii::$app->user->isGuest],
                [
                    'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                    'visible'=>!Yii::$app->user->isGuest,
                    'items'=>[
                        [
                            'label' => Yii::t('frontend', 'Settings'),
                            'url' => ['/user/default/index']
                        ],
                        [
                            'label' => Yii::t('frontend', 'Backend'),
                            'url' => Yii::getAlias('@backendUrl'),
                            'visible'=>Yii::$app->user->can('manager')
                        ],
                        [
                            'label' => Yii::t('frontend', 'Logout'),
                            'url' => ['/user/sign-in/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ]
                    ]
                ],
                // [
                //     'label'=>Yii::t('frontend', 'Language'),
                //     'items'=>array_map(function ($code) {
                //         return [
                //             'label' => Yii::$app->params['availableLocales'][$code],
                //             'url' => ['/site/set-locale', 'locale'=>$code],
                //             'active' => Yii::$app->language === $code
                //         ];
                //     }, array_keys(Yii::$app->params['availableLocales']))
                // ]
            ]
        ]);
        NavBar::end();
        ?>

        <?= $content ?>

    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Сalls-Express <?= date('Y') ?></p>
        </div>
    </footer>

    <div id="call_widget_container"></div><script src="http://calls-express.com/call_assets/script.js" charset="UTF-8"></script><script type="text/javascript">var call_code="3803e53a8bcd16757625c1eb04e69132";</script>
    
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter30103424 = new Ya.Metrika({id:30103424,
                        webvisor:true,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true});
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="//mc.yandex.ru/watch/30103424" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
