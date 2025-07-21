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
 * This is the model class for table "article".
 *
 * @property integer $id [int] 编号
 * @property integer $category_id [int] 分类id
 * @property string $title [varchar(255)] 文章标题
 * @property string $author [varchar(255)] 文章作者
 * @property string $image [varchar(1000)] 文章图片
 * @property string $describe [varchar(1000)] 文章简介
 * @property string $content [text] 文章内容
 * @property integer $views [int] 浏览次数
 * @property integer $sort [int unsigned] 排序
 * @property integer $status [tinyint unsigned] 状态
 * @property integer $is_link [tinyint(1)] 是否外链
 * @property string $link_url [varchar(255)] 链接地址
 * @property integer $is_hot [tinyint unsigned] 是否热门
 * @property integer $created_by [int] 创建者
 * @property integer $updated_by [int] 更新者
 * @property string $created_at [datetime] 创建时间
 * @property string $updated_at [datetime] 修改时间
 * @property string $deleted_at [datetime] 删除时间
 *
 * @property ArticleCategory $category [article_category] 文章分类
 * @property User $creator [User]
 * @property User $updater [User]
 */
class Article extends ActiveRecord
{
    public static $modelName = '文章表';
    public $fileAttributes = ['image'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
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
            [['category_id', 'title', 'describe', 'content'], 'required'],
            [['category_id', 'views', 'sort', 'created_by', 'updated_by'], 'integer'],
            [['content'], 'string'],
            [['is_link', 'is_hot'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['title', 'author', 'link_url'], 'string', 'max' => 255],
            [['image', 'describe'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'category_id' => '分类id',
            'title' => '文章标题',
            'author' => '文章作者',
            'image' => '文章图片',
            'describe' => '文章简介',
            'content' => '文章内容',
            'views' => '浏览次数',
            'sort' => '排序',
            'status' => '状态',
            'is_link' => '是否外链',
            'link_url' => '链接地址',
            'is_hot' => '是否热门',
            'created_by' => '创建者',
            'updated_by' => '更新者',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'deleted_at' => '删除时间',
            'category.category_name' => '文章分类',
            'creator.username' => '创建人',
            'updater.username' => '更新人',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(ArticleCategory::class, ['id' => 'category_id']);
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
