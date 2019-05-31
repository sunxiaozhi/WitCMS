<?php
/**
 * 左栏.
 * User: Administrator
 * Date: 2018/2/25
 * Time: 15:57
 */

use backend\widgets\MenuView;

//获取用户的权限组
$roleAssignment = Yii::$app->authManager->getAssignments(Yii::$app->user->identity->id);
reset($roleAssignment);

/* @var $directoryAsset string */
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>
                <i class="fa fa-circle text-success"></i> <?= key($roleAssignment)?>
                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>

        <!-- search form -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= MenuView::widget() ?>
    </section>
</aside>
