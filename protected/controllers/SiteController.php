<?php

require(Yii::app()->basePath.'\services\SendEmailService.php');

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

    public function actionIndex_Login()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index_login');
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
	    $model=new LoginForm;

		if(isset($_POST['usuario']) && isset($_POST['password']))
		{
            $model->username = $_POST['usuario'];
            $model->password = $_POST['password'];
            $usuario = Usuario::model()->findByAttributes(array('usuario'=>$model->username));

			if($model->login()){
                Yii::app()->session->open();
                Yii::app()->session['usuario'] = $model->username;
                echo Yii::app()->request->baseUrl . "/site/index_login";
            }
            else{
                echo "error_login";
            }
        }
		else {
                $this->render('login',array('model'=>$model));
        }
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionObtenerTipoMaterial()
    {
        $data = array();
        $tipo_material = tipomaterial::model()->findAll();
        if($tipo_material){
            foreach($tipo_material as $mat){
                $values = array('tipo_material' => $mat->tipo_material, 'descripcion' => $mat->descripcion);
                array_push($data,$values);
            }
        }
        echo json_encode($data);
    }

    public function actionEnvioEmail()
    {
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['mensaje'])){
            $send = new SendEmailService;
            if($send->Send($_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['mensaje'])){
                echo "Send_ok";
            }
            else{
                echo "Send_error";
            }
        }
    }

}