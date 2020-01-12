<?php

namespace app\controllers;

use Yii;
use app\models\tblproductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\lib\TblproductLib;
use app\models\Tblimage;
use app\models\ProductImages;


/**
 * TblproductController implements the CRUD actions for Tblproduct model.
 */
class TblproductController extends Controller
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
     * Lists all Tblproduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new tblproductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblproduct model.
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
     * Creates a new TblproductLib model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblproductLib();
        
        if(count($_POST) > 1){
            //print_r($_POST);
            //exit;
        }
                
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $data = [];
            $data["ProductImages"] = [];
            $data["ProductImages"]["product_id"] = $model->id;
            foreach($_POST["selectedImages"] as $index => $imageid){
                $data["ProductImages"]["image_id"] = $imageid;
                $data["ProductImages"]["positon"] = $index + 1;
                $data["ProductImages"]["isdefault"] = $index == 0;
                
                $product_image = new ProductImages();
                $product_image->load($data);
                $product_image->save(false);
            }
            
            
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('create', [
            'model' => $model,
            
        ]);
    }

    /**
     * Updates an existing TblproductLib model.
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
            $data["ProductImages"] = [];
            $data["ProductImages"]["product_id"] = $model->id;
            foreach($_POST["selectedImages"] as $index => $imageid){
                $data["ProductImages"]["image_id"] = $imageid;
                $data["ProductImages"]["positon"] = $index + 1;
                $data["ProductImages"]["isdefault"] = $index == 0;
                
                $product_image = new ProductImages();
                $product_image->load($data);
                $product_image->save(false);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblproductLib model.
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
     * Finds the TblproductLib model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblproductLib the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblproductLib::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
