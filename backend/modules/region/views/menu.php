<?php

return  [
    'label' => '地区管理',
    'icon' => 'fa fa-book',
    'url' => '#',
    'options' => ['class' => 'treeview'],
    'items' => [
        ['label' => '省份管理', 'icon' => 'fa fa-flag', 'url' => ['/region/province/index'], 'active' => is_controller('province')],
        ['label' => '城市管理', 'icon' => 'fa fa-map-marker', 'url' => ['/region/city/index'], 'active' => is_controller('city')],
        ['label' => '区域管理', 'icon' => 'fa fa-map', 'url' => ['/region/area/index'], 'active' => is_controller('area')],
        ['label' => '街道管理', 'icon' => 'fa fa-road', 'url' => ['/region/street/index'], 'active' => is_controller('street')]
    ],
    'active' => (controller()->module->id === 'region')
];
