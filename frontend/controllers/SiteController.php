<?php
namespace frontend\controllers;

use Yii;
use frontend\models\ContactForm;
use yii\web\Controller;
use common\models\CallButtons;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale'=>[
                'class'=>'common\actions\SetLocaleAction',
                'locales'=>array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    public function actionCheck($code)
    {
        header('Access-Control-Allow-Origin: *');
        
        $item = CallButtons::findOne(array('md5' => $code));

        return json_encode(['show' => $item->show ]);
    }

    public function actionMakecall($number, $md5)
    {  
        header('Access-Control-Allow-Origin: *');

        $item = CallButtons::findOne(array('md5' => $md5));

        $phone = htmlspecialchars($number);
        //$form = htmlspecialchars($_REQUEST['form']);
        $form = urldecode($form);
        $phone = ltrim($phone, '+$');
        $phone = str_replace("(", "", $phone);
        $phone = str_replace(")", "", $phone);
        $phone = str_replace("-", "", $phone);
        $phone = str_replace(" ", "", $phone);

        echo $phone;
        //79213107506

        echo "<br/>" . $item->login_url . "<br/>";

        $ch = curl_init($item->login_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // get headers too with this line
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);
        // get cookie
        preg_match('/^Set-Cookie:\s*([^;]*)/mi', $result, $m);

        echo $result;
        parse_str($m[1], $cookies);
        var_dump($cookies);


        $call_url = str_replace('!CLIENT_PHONE!', $phone, $item->call_url);


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $call_url,
            CURLOPT_COOKIE => 'mansession_id=' . $cookies['mansession_id'],
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
        
    }

    public function actionGenerate()
    {

        $url = "http://vps-1071382.vpshome.pro:24151?doit=addnew&login=tim17&phone=9842747237&ipaddr=81.177.135.133";

        

        // http://vps-1071382.vpshome.pro:37962/htsbi/rawman?action=login&username=cbmn305feca0c&secret=cA1F10c39e14Fea1Bf 
        // http://vps-1071382.vpshome.pro:37962/htsbi/rawman?action=originate&channel=SIP/MngOUT4071174/9842747237&exten=!CLIENT_PHONE!&priority=1&timeout=60000&context=out-cbmn305feca0c

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // get headers too with this line
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);


        $result = json_decode($result);

        echo $result->loginrq;
        //echo $result['login'];

    
    }

    public function actionIndex()
    {
        //return $this->render('index');

        return $this->redirect('/page/welcome');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options'=>['class'=>'alert-success']
                ]);
                return $this->refresh();
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>\Yii::t('frontend', 'There was an error sending email.'),
                    'options'=>['class'=>'alert-danger']
                ]);
            }
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }
}
