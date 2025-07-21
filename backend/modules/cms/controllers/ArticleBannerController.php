<?php

namespace backend\modules\cms\controllers;

use Yii;
use api\modules\cms\models\ArticleBanner;
use api\modules\cms\models\search\ArticleBannerSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;

/**
 * ArticleBannerController implements the CRUD actions for ArticleBanner model.
 * @desc 文章轮播图管理
 */
class ArticleBannerController extends Controller
{
    protected $modelClass = ArticleBanner::class;

    public static $parentActions = ['index', 'view', 'create', 'update', 'delete'];
}
