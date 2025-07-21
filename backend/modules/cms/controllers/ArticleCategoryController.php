<?php

namespace backend\modules\cms\controllers;

use Yii;
use api\modules\cms\models\ArticleCategory;
use api\modules\cms\models\search\ArticleCategorySearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;

/**
 * ArticleCategoryController implements the CRUD actions for ArticleCategory model.
 * @desc 文章分类管理
 */
class ArticleCategoryController extends Controller
{
    protected $modelClass = ArticleCategory::class;

    public static $parentActions = ['index', 'view', 'create', 'update', 'delete'];
}
