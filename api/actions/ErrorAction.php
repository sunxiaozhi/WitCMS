<?php
/**
 * api错误处理
 * User: sunxiaozhi
 * Date: 2019/6/9 11:18
 */

namespace api\actions;

use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\base\Exception;
use yii\base\UserException;
use yii\web\HttpException;

class ErrorAction extends Action
{
    public $defaultName;

    public $defaultMessage;

    protected $exception;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->exception = $this->findException();

        if ($this->defaultMessage === null) {
            $this->defaultMessage = Yii::t('yii', 'An internal server error occurred.');
        }

        if ($this->defaultName === null) {
            $this->defaultName = Yii::t('yii', 'Error');
        }
    }

    public function run()
    {
        Yii::$app->getResponse()->setStatusCodeByException($this->exception);
        return $this->getExceptionName() . ': ' . $this->getExceptionMessage();
    }

    protected function findException()
    {
        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            $exception = new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        return $exception;
    }

    protected function getExceptionName()
    {
        if ($this->exception instanceof Exception) {
            $name = $this->exception->getName();
        } else {
            $name = $this->defaultName;
        }

        if ($code = $this->getExceptionCode()) {
            $name .= " (#$code)";
        }

        return $name;
    }

    /**
     * Gets the code from the [[exception]].
     * @return mixed
     * @since 2.0.11
     */
    protected function getExceptionCode()
    {
        if ($this->exception instanceof HttpException) {
            return $this->exception->statusCode;
        }

        return $this->exception->getCode();
    }

    protected function getExceptionMessage()
    {
        if ($this->exception instanceof UserException) {
            return $this->exception->getMessage();
        }

        return $this->defaultMessage;
    }
}