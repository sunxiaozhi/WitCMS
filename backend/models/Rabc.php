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
use yii\rbac\Item;
use yii\helpers\Html;


class Rabc extends Model
{
    public $name;
    public $type;
    public $description;
    public $ruleName;
    public $_item;

    public function __construct($item = null)
    {
        $this->_item = $item;
        if ($item !== null) {
            $this->name = $item->name;
            $this->description = $item->description;
            $this->type = $item->type;
            $this->ruleName = $item->ruleName;
        }

        //parent::__construct();
    }

    public function rules()
    {
        /*return[
          [['name,description,type'], 'safe'],
        ];*/

        return [
            [['name'], 'required'],
            ['description', 'filter', 'filter' => function ($value) {
                return Html::encode($value);
            }],
            [['type'], 'integer'],
            [['description', 'ruleName'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            "name" => '名字',
            "description" => '描述',
            "type" => '类型',
        ];
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        $authManager = Yii::$app->authManager;

        if ($this->_item !== null) {
            $isNew = false;
            $oldName = $this->_item->name;
        } else {
            $isNew = true;
            $this->_item = ($this->type == Item::TYPE_ROLE) ? $authManager->createRole($this->name) : $authManager->createPermission($this->name);
        }

        $this->_item->name = $this->name;
        $this->_item->type = $this->type;
        $this->_item->description = $this->description;
        if ($this->ruleName) $this->_item->ruleName = $this->ruleName;
        $isNew ? $authManager->add($this->_item) : $authManager->update($oldName, $this->_item);

        return true;
    }

    public function getItem()
    {
        return $this->_item;
    }
}