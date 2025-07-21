<?php

namespace backend\modules\cms\controllers;

use Yii;
use api\modules\cms\models\Article;
use api\modules\cms\models\search\ArticleSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;

/**
 * ArticleController implements the CRUD actions for Article model.
 * @desc 文章管理
 */
class ArticleController extends Controller
{
    protected $modelClass = Article::class;

    public static $parentActions = ['index', 'view', 'create', 'update', 'delete'];
}
