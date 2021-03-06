<?php
/**
 * @link http://www.bigbrush-agency.com/
 * @copyright Copyright (c) 2015 Big Brush Agency ApS
 * @license http://www.bigbrush-agency.com/license/
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Button;
use yii\bootstrap\ButtonGroup;
?>
 <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class' => yii\grid\CheckboxColumn::className(),
            'options' => ['width' => '1%'],
        ],
        [
            'header' => 'Title',
            'format' => 'raw',
            'value' => function($data) {
                return str_repeat('- ', $data->depth-1) . Html::a($data->title, ['edit', 'id' => $data->id]);
            },
        ],
        [
            'header' => 'Ordering',
            'headerOptions' => ['style' => 'text-align:center; vertical-align:middle;'],
            'format' => 'raw',
            'options' => ['width' => '10%'],
            'contentOptions' => ['style' => 'text-align:center; vertical-align:middle;'],
            'value' => function($data) {
                $options = ['class' => 'btn btn-default changeDirectionBtn', 'data-pid' => $data->id];
                return ButtonGroup::widget([
                    'options' => ['class' => 'btn-group btn-group-xs'],
                    'buttons' => [
                        Button::widget([
                            'label' => '<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>',
                            'encodeLabel' => false,
                            'options' => ['data-direction' => 'up'] + $options,
                        ]),
                        Button::widget([
                            'label' => '<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>',
                            'encodeLabel' => false,
                            'options' => ['data-direction' => 'down'] + $options,
                        ]),
                    ]
                ]);
            },
        ],
    ],
]); ?>