<?php

namespace trntv\glide\actions;

use Symfony\Component\HttpFoundation\Request;
use Yii;
use yii\base\Action;
use yii\base\NotSupportedException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class GlideAction extends Action
{
    /**
     * @var string
     */
    public $component = 'glide';

    /**
     * @param $path
     * @throws BadRequestHttpException
     * @throws NotFoundHttpException
     * @throws NotSupportedException
     */
    public function run($path)
    {
        if (!$this->getServer()->sourceFileExists($path)) {
            throw new NotFoundHttpException;
        }

        if ($this->getComponent()->signKey) {
            $request = Request::create(Yii::$app->request->getUrl());
            if (!$this->validateRequest($request)) {
                throw new BadRequestHttpException;
            };
        }

        try {
            $this->getServer()->outputImage($path, Yii::$app->request->get());
        } catch (\Exception $e) {
            throw new NotSupportedException;
        }
    }

    /**
     * @return \League\Glide\Server
     */
    protected function getServer()
    {
        return $this->getComponent()->getServer();
    }

    /**
     * @return \trntv\glide\components\Glide;
     */
    protected function getComponent()
    {
        return Yii::$app->get($this->component);
    }

    /**
     * @param $request
     * @return bool
     */
    public function validateRequest($request)
    {
        return $this->getComponent()->validateRequest($request);
    }
}
