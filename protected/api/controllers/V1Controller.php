<?php

class V1Controller extends Controller
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

    private function getAlias($str)
    {
        return $str[0].($str[intval(ceil(strlen($str)/2))]).$str[strlen($str)-1];
    }

    public function actionGet()
    {
        $model = Yii::app()->request->getParam("model");
        $columns = Yii::app()->request->getParam("fields");
        $join = Yii::app()->request->getParam("join");
        $whereConds = Yii::app()->request->getParam("where");
        $limit = Yii::app()->request->getParam("limit");
        $offset = Yii::app()->request->getParam("offset");
        $order = Yii::app()->request->getParam("order");

        $res = Yii::app()->db->createCommand();

        // если передан массив таблиц
        if(is_array($model))
        {
            $select = $this->getAlias($model[0]).".id";
            for($i=1;$i<count($model);$i++)
            {
                // название прикрепляемой таблицы
                $joinNode = $join[$model[$i]];
                if(isset($joinNode))
                {
                    // способ, которым прикрепляем
                    $method = $joinNode["method"];
                    // псевдоним прикрепляемой таблицы
                    $alias = $this->getAlias($model[$i]);
                    // название метода прикрепления
                    $func = $method."Join";
                    // первый параметр для метода прикрепления
                    $table = $model[$i]." as ".$alias;
                    // массив параметров прикрепления
                    $joinArray = $joinNode["on"];
                    // псевдоним целевой таблицы
                    $targetAlias = $this->getAlias($joinArray["table"]);
                    // целевая колонка
                    $target = $targetAlias.".".$joinArray["target_field"];
                    //второй параметр
                    $on = $alias.".".$joinArray["field"].' = '.$target;
                    $res = $res->$func($table, $on);
                }
            }
            if(is_array($columns))
            {
                for($i=0;$i<count($model);$i++)
                {
                    $cols = $columns[$model[$i]];
                    $colsArray = explode(",",$cols);
                    for($j=0;$j<count($colsArray);$j++)
                    {
                        if($j == 0 && $i == 0)
                        {
                            continue;
                        }
                        $select .= ", ".$this->getAlias($model[$i]).".".$colsArray[$j]." as ".$model[$i]."_".$colsArray[$j];
                    }
                }
            }
            $res = $res->from($model[0]." as ".$this->getAlias($model[0]));
        }

        if(isset($whereConds))
        {
            $where = '';
            for($i=0;$i<count($whereConds);$i++)
            {
                if($whereConds[$i]["action"] == 'in')
                {
                    $where .= $this->getAlias($whereConds[$i]["table"]).
                        ".".
                        $whereConds[$i]["column"].
                        " ".
                        $whereConds[$i]["action"].
                        "(".
                        $whereConds[$i]["value"].
                        ") ";
                }
                else if($whereConds[$i]["action"] == 'like')
                {
                    $where .= $this->getAlias($whereConds[$i]["table"]).
                        ".".
                        $whereConds[$i]["column"].
                        " ".
                        $whereConds[$i]["action"].
                        " '%".
                        $whereConds[$i]["value"].
                        "%' ";
                }
                else
                {
                    $where .= $this->getAlias($whereConds[$i]["table"]).
                        "."
                        .$whereConds[$i]["column"].
                        " ".
                        $whereConds[$i]["action"].
                        " ".
                        $whereConds[$i]["value"]." ";
                }
                if($i != count($whereConds)-1)
                {
                    $where .= " and ";
                }
            }
            $res = $res->where($where);
        }

        if(isset($limit) && !empty($limit))
        {
            $res = $res->limit($limit);
        }

        if(isset($offset) && !empty($offset))
        {
            $res = $res->offset($offset);
        }

        if(isset($order))
        {
            $orderBy = '';
            for($i=0;$i<count($order);$i++)
            {
                $orderBy .= $this->getAlias($order[$i]["table"]).
                    ".".
                    $whereConds[$i]["column"].
                    " ".
                    $whereConds[$i]["direction"]." ";

                if($i != count($order)-1)
                {
                    $orderBy .= " and ";
                }
            }
            $res = $res->order($orderBy);
        }

        $res = $res->select($select)
            ->queryAll();


        echo CJSON::encode($res);
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

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}