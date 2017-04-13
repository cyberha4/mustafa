<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $position
 * @property string $file_name
 * @property int $category
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const CATEGORIES = [
        'documents' => '1',
        'commands' => '2',
        'labzad' => '4',
        'labmat' => '3',
        ];
    const COMANDS = 1;
    const DOCUMENTS = 2;

    public static function tableName()
    {
        return 'files';
    }

    public static function getCategoriesArray()
    {
        return [
            self::DOCUMENTS => 'Документы',
            self::COMANDS => 'Команды',
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'file_name', 'category'], 'required'],
            [['category'], 'integer'],
            [['position', 'file_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Position',
            'file_name' => 'File Name',
            'category' => 'Category',
        ];
    }
}
