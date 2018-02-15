<?php

namespace bttree\smypage\controllers;

use bttree\smypage\models\PageCategory;
use Yii;
use bttree\smypage\models\Page;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use bttree\smywidgets\actions\GetModelSlugAction;

/**
 * FrontPageController implements the CRUD actions for Page model.
 */
class FrontPageController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow'   => true,
                        'roles'   => ['@', '?'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Page models.
     * @param string|null $categorySlug
     * @return mixed
     */
    public function actionIndex($categorySlug = null)
    {
        $query = Page::find()->where(['status' => Page::STATUS_ACTIVE, 'type' => Page::TYPE_PAGE]);

        if (null !== ($category = PageCategory::findBySlug($categorySlug))) {
            $query->andWhere(['category_id' => $category->id]);
        }

        $dataProvider = new ActiveDataProvider([
                                                   'query' => $query,
                                                   'sort' => ['defaultOrder' => ['create_time' => SORT_DESC]],
                                               ]);

        return $this->render('index',
                             [
                                 'dataProvider' => $dataProvider,
                             ]);
    }

    /**
     * Displays a single Page model.
     * @param string $slug
     * @return mixed
     */
    public function actionView($slug)
    {
        /**
         * @var Page $model
         */
        $model = Page::find()
                     ->where(['status' => Page::STATUS_ACTIVE, 'type' => Page::TYPE_PAGE, 'slug' => $slug])
                     ->one();

        if (null === $model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $view = $model->view ?: 'view';
        if ($model->layout) {
            $this->layout = $model->layout;
        }

        return $this->render($view,
                             [
                                 'model' => $model,
                             ]);
    }
}