<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* * *ext** */
use leandrogehlen\treegrid\TreeGrid;

$this->title = 'Редактировать дерево сущностей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tree-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    TreeGrid::widget([
        'dataProvider' => $dataProvider,
        'keyColumnName' => 'id',
        'showOnEmpty' => FALSE,
        'parentColumnName' => 'tree_id',
        'columns' => [

            'name',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete} {add}',
                'buttons' => [
                    'add' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url);
                    },
                'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' =>'Удалить'
                        ]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
        			$url ='index.php?r=tree%2F'.$action.'&id='.$model->id;
        			return $url;
    			}
            ]
        ]
    ]);
    ?>

</div>