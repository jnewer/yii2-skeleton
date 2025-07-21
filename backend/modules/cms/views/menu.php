<?php

return [
    'label' => '内容管理',
    'icon' => 'fa fa-file-text-o',
    'url' => '#',
    'options' => ['class' => 'treeview'],
    'items' => [
        ['label' => '文章管理', 'icon' => 'fa fa-file-text-o', 'url' => ['/cms/article/index']],
        ['label' => '文章分类', 'icon' => 'fa fa-folder-open-o', 'url' => ['/cms/article-category/index']],
        ['label' => '文章轮播图', 'icon' => 'fa fa-picture-o', 'url' => ['/cms/article-banner/index']],
    ],
    'active' => controller()->module->id == 'cms'
];
