<?php

namespace api\modules\cms\models;

use Yii;
use common\models\User;
use common\components\ActiveRecord;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use common\components\behaviors\DatetimeBehavior;
use common\components\behaviors\SoftDeleteBehavior;
use common\components\behaviors\OperationLogBehavior;
use common\components\behaviors\SoftDeleteQueryBehavior;

/**
 * This is the model class for table "article_banner".
 *
 * @property integer $id [int] 编号
 * @property integer $banner_type [int] 类型
 * @property string $image [varchar(1000)] 图片地址
 * @property integer $is_href [tinyint(1)] 是否链接
 * @property string $url [varchar(255)] 链接地址
 * @property string $title [varchar(255)] 标题
 * @property integer $status [tinyint(1)] 状态
 * @property integer $sort [int] 排序
 * @property string $remark [varchar(255)] 描述
 * @property integer $created_by [int] 创建者
 * @property integer $updated_by [int] 更新者
 * @property string $created_at [datetime] 创建时间
 * @property string $updated_at [datetime] 修改时间
 * @property string $deleted_at [datetime] 删除时间
 *
 * @property User $creator [User]
 * @property User $updater [User]
 */
class ArticleBanner extends ActiveRecord
{
    public static $modelName = '文章轮播图';
    public $fileAttributes = ['image'];

    public const BANNER_TYPE_NOTICE = 1; //通知
    public const BANNER_TYPE_ANNOUNCEMENT = 2; //公告

    public static $bannerTypeOptions = [
        self::BANNER_TYPE_NOTICE => '通知',
        self::BANNER_TYPE_ANNOUNCEMENT => '公告',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_banner';
    }
    public function behaviors()
    {
        return [
            OperationLogBehavior::class,
            DatetimeBehavior::class,
            BlameableBehavior::class,
            SoftDeleteBehavior::class,
            SoftDeleteQueryBehavior::class,
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'title'], 'required'],
            [['banner_type', 'sort', 'created_by', 'updated_by'], 'integer'],
            [['is_href'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['image'], 'string', 'max' => 1000],
            [['url', 'title', 'remark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'banner_type' => '类型',
            'image' => '图片地址',
            'is_href' => '是否链接',
            'url' => '链接地址',
            'title' => '标题',
            'status' => '状态',
            'sort' => '排序',
            'remark' => '描述',
            'created_by' => '创建者',
            'updated_by' => '更新者',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'deleted_at' => '删除时间',
            'creator.username' => '创建人',
            'updater.username' => '更新人',
        ];
    }

    public function getCreator()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    public function getUpdater()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}
