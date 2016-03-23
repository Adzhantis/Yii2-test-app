<?php

namespace app\controllers;

use app\models\Authors;
use app\models\BookSearch;
use Yii;
use app\models\Books;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BooksController implements the CRUD actions for Books model.
 */
class BooksController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Books models.
     * @return mixed
     */
    public function actionIndex()
    {

        Url::remember();
        $searchModel = new BookSearch();
        $searchModel->load(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $searchModel->search(Yii::$app->request->queryParams),
            'searchModel' => $searchModel,
            'authors' => Authors::getAuthors(),
        ]);
    }

    /**
     * Displays a single Books model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate()
    {   

        $model = Yii::$app->request->get('id') > 0 ?
            $this->findModel(Yii::$app->request->get('id')) :
            new Books();

        if ($model->load(Yii::$app->request->post())) {
            $model->upload();
            if ($model->save())
                return $this->redirect(Url::previous());
        }
        
        return $this->render('update', [
            'model' => $model,
            'authors' => Authors::getAuthors(),
        ]);
    }

    /**
     * Deletes an existing Books model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink($model->getPreviewUrl());
        $model->delete();
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Books model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Books the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Books::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
