<?php

namespace app\controllers;

use Yii;
use app\models\Tblimage;
use app\models\TblimageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TblimageController implements the CRUD actions for Tblimage model.
 */
class TblimageController extends Controller
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
     * Lists all Tblimage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblimageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblimage model.
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
     * Creates a new Tblimage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Tblimage();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $imageid=$model->photocod;
            //echo  print_r($imageid); exit;
            $photopath = UploadedFile::getInstance($model, 'photopath');
            $imgName='img_'. $imageid .'.'. $photopath->getExtension();
            $photopath->saveAs(Yii::getAlias('@uploadedimageImgPath').'/'.$imgName);
            $model->photopath=$imgName;
            
            $photopath = UploadedFile::getInstance($model, 'thumbnailpath');
            $imgName='/web/thumbnail/thum_'. $imageid .'.'. $photopath->getExtension();
            $photopath->saveAs(Yii::getAlias('@webroot').$imgName);
            
            
            $model->thumbnailpath=$imgName;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }else

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tblimage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tblimage model.
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

    public function actionListimages()
    {
        $images = Tblimage::findAll(['status' => 1]);
        $list = [];
        
        foreach ($images AS $model){
            $url = $model->thumbnailpath;
            $url = Yii::getAlias("@web") . $url;
            
            $data = [];
            $data['id'] = $model->id;
            $data['code'] = $model->photocod;
            $data['url'] = $url;
            
            $list[] = $data;
        }
        
        \Yii::$app->response->format = 'json';
        $this->layout =  false;
        echo json_encode($list, true);
        exit;
       // return $this->redirect(['index']);
    }
    
    
    /**
     * Finds the Tblimage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblimage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblimage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
