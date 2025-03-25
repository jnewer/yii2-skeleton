<?php

use yii\helpers\Html;

/** @var \yii\web\View $this */
/** @var string $content */

$this->registerJsFile('/js/moment.min.js', ['position' => \yii\web\View::POS_HEAD]);
if (Yii::$app->controller->action->id === 'login') {
    /**
     * Do not use this code in your template. Remove it.
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {
    backend\assets\AppAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    // $this->registerJsFile($directoryAsset.'/js/demo.js', ['depends'=>'backend\assets\AdminLteAsset']);

    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script>
            var AdminLTEOptions = {
                //Enable sidebar expand on hover effect for sidebar mini
                //This option is forced to true if both the fixed layout and sidebar mini
                //are used together
                sidebarExpandOnHover: false,
                //BoxRefresh Plugin
                enableBoxRefresh: true,
                //Bootstrap.js tooltip
                enableBSToppltip: true,
                //'fast', 'normal', or 'slow'
                animationSpeed: 'fast'
            };
        </script>
    </head>

    <body class="hold-transition skin-red sidebar-mini fixed">
        <?php $this->beginBody() ?>
        <div class="wrapper">

            <?= $this->render(
                'header.php',
                ['directoryAsset' => $directoryAsset]
            ) ?>

            <?= $this->render(
                'left.php',
                ['directoryAsset' => $directoryAsset]
            )
            ?>

            <?= $this->render(
                'content.php',
                ['content' => $content, 'directoryAsset' => $directoryAsset]
            ) ?>

        </div>

        <?php $this->endBody() ?>
    </body>

    </html>
    <?php $this->endPage() ?>
<?php } ?>

<script>
    // 获取当前登录用户名
    var username = '<?php echo Yii::$app->user->identity->username; ?>';
    var watermarkEnabled = '<?php echo app()->config->get('watermark_enabled') ?? 0; ?>';
    console.log('watermarkEnabled:'+ watermarkEnabled);

    // 创建水印函数
    function createWatermark(text) {
        var watermarkDiv = document.createElement('div');
        watermarkDiv.style.position = 'fixed';
        watermarkDiv.style.fontSize = '24px';
        watermarkDiv.style.color = 'rgba(128, 128, 128, 0.5)';
        watermarkDiv.style.opacity = '0.4';
        watermarkDiv.style.transform = 'rotate(45deg)';
        watermarkDiv.style.zIndex = '1000'; // 确保水印在所有内容之上
        watermarkDiv.textContent = text;
        return watermarkDiv;
    }

    // 创建多排铺满的水印
    function createMultipleWatermarks(text) {
        var watermark;
        var x = 10; // 初始的x坐标位置
        var y = 10; // 初始的y坐标位置
        var lineHeight = 200; // 水印行高
        var columnWidth = 200; // 水印列宽

        // 根据窗口大小创建水印
        while (y < window.innerHeight) {
            while (x < window.innerWidth) {
                watermark = createWatermark(text);
                watermark.style.left = x + 'px';
                watermark.style.top = y + 'px';
                document.body.appendChild(watermark);
                x += columnWidth; // 移动到下一列位置
            }
            x = 10; // 重置x坐标到初始位置
            y += lineHeight; // 移动到下一行位置
        }
    }
    if (watermarkEnabled > 0) {
        createMultipleWatermarks(username);
    }
</script>
