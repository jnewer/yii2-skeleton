<?php

use yii\helpers\Html;

/** @var \yii\web\View $this */
/** @var string $content */

$siteName = Yii::$app->config->get('site_name') ?: Yii::$app->name;
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">YA</span><span class="logo-lg">' . $siteName . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user" aria-hidden="true" style="color:white"></i>
                        <!-- <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/> -->
                        <span class="hidden-xs"><?php echo Yii::$app->user->identity->username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="height:auto">
                            <!-- <i class="fa fa-user fa-5x" aria-hidden="true" style="color:white"></i> -->
                            <?php if (Yii::$app->user->identity->avatar) : ?>
                                <img src="<?php echo Yii::$app->user->identity->avatar; ?>" class="img-circle" alt="User Image" />
                            <?php else : ?>
                                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                    alt="User Image" />
                            <?php endif; ?>

                            <p>
                                <?php echo Yii::$app->user->identity->username ?> - <?php echo Yii::$app->user->identity->roleNames ?>
                                <!-- <small>Member since Nov. 2012</small> -->
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a(
                                    '修改密码',
                                    ['/site/password'],
                                    ['class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    '退出',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>