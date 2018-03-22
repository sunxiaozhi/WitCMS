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
    public $_item;

    public function __construct($item = null) {
        $this->_item = $item;
        if($item !== null) {
            $this->name = $item->name;
            $this->description = $item->description;
        }

        parent::__construct();
    }

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

    public function save() {
echo "dasd";exit;
    }
}