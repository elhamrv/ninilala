<?php

namespace app\controllers;

use Yii;
use app\lib\TblGalleryLib;
use app\models\TblgallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Tblimage;
use app\models\GalleryImages;

/**
 * TblGalleryController implements the CRUD actions for TblGallery model.
 */
class TblgalleryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest){
            $this->redirect(Yii::getAlias("@web")."/site/login");
        }
    }

    /**
     * Lists all TblGallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblgallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblGallery model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblGalleryLib model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblGalleryLib();       
        
        if(count($_POST) > 1){
            //print_r($_POST);
            //exit;
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $data = [];
            $data["GalleryImages"] = [];
            $data["GalleryImages"]["gallery_id"] = $model->id;
            foreach($_POST["selectedImages"] as $index => $imageid){
                $data["GalleryImages"]["image_id"] = $imageid;
                $data["GalleryImages"]["position"] = $index + 1;
                $data["GalleryImages"]["isdefault"] = $index == 0;
                
                $gallery_image = new GalleryImages();
                $gallery_image->load($data);
                $gallery_image->save(false);
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblGalleryLib model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(count($_POST) > 1){
            //print_r($_POST);
            //exit;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $data = [];
            $data["GalleryImages"] = [];
            $data["GalleryImages"]["gallery_id"] = $model->id;
            foreach($_POST["selectedImages"] as $index => $imageid){
                $data["GalleryImages"]["image_id"] = $imageid;
                $data["GalleryImages"]["position"] = $index + 1;
                $data["GalleryImages"]["isdefault"] = $index == 0;
                
                $gallery_image = new GalleryImages();
                $gallery_image->load($data);
                $gallery_image->save(false);
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblGalleryLib model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblGalleryLib model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblGalleryLib the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblGalleryLib::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
