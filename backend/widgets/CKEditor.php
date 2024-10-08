<?php
namespace backend\widgets;

use yii\helpers\ArrayHelper;

/**
 * 为CKEditor加入ckfinder支持
 */
class CKEditor extends \dosamigos\ckeditor\CKEditor
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->clientOptions = ArrayHelper::merge([
            'filebrowserUploadUrl' => $asset->baseUrl.'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            'filebrowserImageUploadUrl'=>  $asset->baseUrl.'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            'filebrowserFlashUploadUrl'=>  $asset->baseUrl.'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
        ], $this->clientOptions);
    }
}
