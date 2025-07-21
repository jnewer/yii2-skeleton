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
 * This is the model class for table "article_category".
 *
 * @property integer $id [int unsigned] 编号
 * @property integer $parent_id [int] 父级ID
 * @property string $category_name [varchar(255)] 分类标题
 * @property string $describe [varchar(255)] 分类简介
 * @property string $image [varchar(255)] 分类图片
 * @property integer $sort [int unsigned] 排序
 * @property integer $status [tinyint unsigned] 状态
 * @property integer $created_by [int] 创建者
 * @property integer $updated_by [int] 更新者
 * @property string $created_at [datetime] 创建时间
 * @property string $updated_at [datetime] 修改时间
 * @property string $deleted_at [datetime] 删除时间
 *
 * @property ArticleCategory $parent [ArticleCategory]
 * @property User $creator [User]
 * @property User $updater [User]
 */
class ArticleCategory extends ActiveRecord
{
    public static $modelName = '文章分类';
    public $fileAttributes = ['image'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
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
            [['parent_id', 'sort', 'created_by', 'updated_by'], 'integer'],
            [['category_name'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['category_name', 'describe', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'parent_id' => '父级ID',
            'category_name' => '分类标题',
            'describe' => '分类简介',
            'image' => '分类图片',
            'sort' => '排序',
            'status' => '状态',
            'created_by' => '创建者',
            'updated_by' => '更新者',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'deleted_at' => '删除时间',
            'parent.category_name' => '父级分类标题',
            'creator.username' => '创建人',
            'updater.username' => '更新人',
        ];
    }

    public function getParent()
    {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
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
