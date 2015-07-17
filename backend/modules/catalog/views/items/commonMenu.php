<?php

$menuPart = array(
    array('label' => 'КАТАЛОГ'),
    array('label' => 'Все позиции', 'url' => array('/catalog/items/index')),
    array(
        'label' => 'Создать позицию',
        'url' => array('/catalog/items/create'),
    ),
    array(
        'label' => 'Скопировать позицию',
        'url' => array('/catalog/catCategory/makeCopy'),
    ),
    array(
        'label' => 'Управление разделами',
        'items' => array(
            array(
                'url' => '/catalog/catCategory/admin',
                'label' => 'Список разделов',
            ),
            array(
                'url' => '/catalog/catCategory/create',
                'label' => 'Создать раздел',
            ),
        ),
    ),
    array(
        'label' => 'Дополнительные поля',
        'items' => array(
            array(
                'label' => 'Список полей',
                'url' => array('/catalog/catItemsRow/admin'),
            ),
            array(
                'label' => 'Новое поле',
                'url' => array('/catalog/catItemsRow/create'),
            ),
        ),
    ),

    array(
        'label' => 'Акции',
        'items' => array(
            array(
                'label' => 'Список акций',
                'url' => array('/catalog/promo/admin'),
            ),
            array(
                'label' => 'Создать акцию',
                'url' => array('/catalog/promo/create'),
            ),
        ),
    ),
    array(
        'label' => 'Пересборка',
        'url' => array('/catalog/default/renderImages/action'),
    ),
    array('label' => 'РАЗДЕЛЫ'),
);


return $menuPart;
//return array_merge($menuPart1, CatCategory::model()->categoriesMenu());

?>
