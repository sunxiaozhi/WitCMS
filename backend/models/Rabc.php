<?php
/**
 * Created by PhpStorm.
 *
 * User: sunhuanzhi
 * Date: 2018/3/22
 * Time: 9:50
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;


class Rabc extends Model
{
    public $name;

    public $type;

    public $description;

    public function rules()
    {
        return[
          [['name,description'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            "name" => '名字',
            "description" => '描述',
        ];
    }
}