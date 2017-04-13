<?php
/**
 * Created by PhpStorm.
 * User: Cyberha4
 * Date: 12.04.2017
 * Time: 7:21
 */
use yii\helpers\Url;

/** @var \app\models\Files[] $files */
echo Url::base(true) . '<br>';
if (!empty($files)) {
    foreach ($files as $file) {
        echo "<a href = '".Url::base(true)."/uploads/" . $file->position . "'>$file->file_name</a><br>";
    }
} else
    echo 'Файлов в данной категории не существует';

