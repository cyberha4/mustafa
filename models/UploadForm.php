<?php
/**
 * Created by PhpStorm.
 * User: Cyberha4
 * Date: 11.04.2017
 * Time: 19:10
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $fileName;
    public $category;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false],//'extensions' => 'png, jpg, docx'
            [['fileName', 'category'], 'required'],
            [['fileName'], 'string', 'max' => 255],
            [['category'], 'integer'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $files = new Files();
            $files->file_name = $this->fileName;
            $files->position = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            //$files->position = "test";
            $files->category = $this->category;
            $files->save();

            return true;
        } else {
            return false;
        }
    }
}
