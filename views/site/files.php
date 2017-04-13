<?php
/**
 * Created by PhpStorm.
 * User: Cyberha4
 * Date: 12.04.2017
 * Time: 7:21
 */

/** @var \app\models\Files[] $files */
if (!empty($files)) {
    foreach ($files as $file) {
        echo "<a href = 'http://mustafa.local/uploads/" . $file->position . "'>$file->file_name</a><br>";
    }
} else
    echo 'Файлов в данной категории не существует';

