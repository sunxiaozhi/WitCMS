<?php
/**
 * 树型类
 */

namespace backend\helpers;

class Tree
{
    /**
     * 生成树型结构所需的多维数组
     * @var array
     */
    public $arr = [];

    /**
     * 生成树型所需修饰符号
     * @var [type]
     */
    public $icon = ['│', '├', '└'];
    public $nbsp = '&nbsp;';

    /**
     * 生成的树型结构数组
     * @var array
     */
    public $treeArr = [];

    public function __construct(array $arr)
    {
        $this->arr = $arr;
    }

    /**
     * 获取生成的树型结构数组(select使用)
     * @param  integer $parent_id [父类id]
     * @param  string $pk [主键字段名]
     * @param  string $pidFeldName [父类id字段名]
     * @param  string $cateFieldName [分类字段名]
     * @param  string $adds
     * @return array
     */
    public function getTree($parent_id = 0, $pk = 'id', $pidFeldName = 'parent_id', $cateFieldName = 'name', $adds = '')
    {
        $num = 1;

        $child = $this->getChild($parent_id, $pidFeldName);

        if (empty($child)) {
            return $this->treeArr;
        }

        $total = count($child);

        foreach ($child as $id => $value) {
            $j = $this->icon[1];  // ├
            $k = $adds ? $this->icon[0] : ''; // │
            if ($num == $total) {
                $j = $this->icon[2]; // └
            }

            $spacer = $adds ? $adds . $j : '';

            $this->treeArr[$value[$pk]] = $spacer . ' ' . $value[$cateFieldName];

            $this->getTree($value[$pk], $pk, $pidFeldName, $cateFieldName, $adds . $k . $this->nbsp);

            $num++;
        }

        return $this->treeArr;
    }

    /**
     * 获取生成的树型结构数组(gridView使用)
     * @param  integer $parent_id [父类id]
     * @param  string $pk [主键字段名]
     * @param  string $pidFeldName [父类id字段名]
     * @param  string $cateFieldName [分类字段名]
     * @param  string $adds
     * @return array
     */
    public function getGridTree($parent_id = 0, $pk = 'id', $pidFeldName = 'parent_id', $cateFieldName = 'name', $adds = '')
    {
        $num = 1;

        $child = $this->getChild(intval($parent_id), $pidFeldName);

        if (empty($child)) {
            return $this->treeArr;
        }

        $total = count($child);

        foreach ($child as $id => $value) {

            $j = $this->icon[1];
            $k = $adds ? $this->icon[0] : '';
            if ($num == $total) {
                $j = $this->icon[2];
            }

            $spacer = $adds ? $adds . $j : '';

            $value[$cateFieldName] = $spacer . ' ' . $value[$cateFieldName];

            $this->treeArr[$value[$pk]] = $value;

            $this->getGridTree($value[$pk], $pk, $pidFeldName, $cateFieldName, $adds . $k . $this->nbsp);

            $num++;
        }
        return $this->treeArr;
    }

    /**
     * 获取生成的树型结构数组(auth[授权]使用)
     * @param  string $pk [主键字段名]
     * @param  string $pidFeldName [父类id字段名]
     * @param  string $child [description]
     * @param  integer $root [description]
     * @return array
     */
    public function getTreeArray($pk = 'id', $pidFeldName = 'parent_id', $child = '_child', $root = 0)
    {
        //基于主键的数组引用
        $refer = [];
        foreach ($this->arr as $key => $value) {
            $refer[$value[$pk]] = &$this->arr[$key];
        }
        foreach ($this->arr as $key => $value) {
            $parentId = $value[$pidFeldName];
            if ($root == $parentId) {
                $this->treeArr[] = &$this->arr[$key];
            } else {
                if (isset($refer[$parentId])) {
                    $parent = &$refer[$parentId];
                    $parent[$child][] = &$this->arr[$key];
                }
            }
        }
        return $this->treeArr;
    }

    /**
     * 获取子级
     * @param  [int] $parent_id 父级id
     * @param [string] $pidFeldName 父级字段名
     * @return array
     */
    public function getChild($parent_id, $pidFeldName)
    {
        $child = [];
        if (!empty($this->arr)) {
            foreach ($this->arr as $id => $value) {
                if ($value[$pidFeldName] == $parent_id) {
                    $child[$id] = $value;
                }
            }
        }
        return $child;
    }

}