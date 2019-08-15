<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Import form
 */
class UploadForm extends Model
{
    public $file  ;
    public $savePatch;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            [['file'], 'file',
                'extensions'  => 'csv',
                'skipOnEmpty' => false,
                'maxFiles'    => 10
            ],
            ['savePatch', 'string'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'file' => 'Select file',
        );
    }

    /**
     * Upload CSV file.
     *
     * @return path save file
     */
    public function upload()
    {
        if ($this->file) {
            $file = $this->file[0];
            $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            return 'uploads/' . $file->baseName . '.' . $file->extension;
        } else {
            return false;
        }
    }

    /**
     * Insert CSV file to DB.
     *
     * @return array data. Count, insert, delete
     */    
    public function insertCsv()
    {

        $pathToFile = Yii::getAlias('@webroot') . '/' . $this->savePatch;

        if (($handle = fopen($pathToFile, 'r')) !== false) {

            $models = UserData::updateAll(['save_status' => UserData::STATUS_DELETE]);

            $i      = 0;
            $error  = false;
            $update = 0;
            $insert = 0;
            $delete = 0;

            while (($row = fgetcsv($handle, 1000, ",")) !== false) {

                $model = UserData::findOne(['uid' => $row[0]]);

                if ($model) {
                    if ((int) $row[4] != (int) $model->date_change) {
                        $model->save_status = UserData::STATUS_UPDATE;
                        $update ++;
                    } else {
                        $model->save_status = UserData::STATUS_IGNORE;
                    }
                } else {
                    $model              = new UserData();
                    $model->save_status = UserData::STATUS_INSERT;
                    $model->uid         = $row[0];
                    $insert ++;
                }

                $model->first_name  = $row[1];
                $model->last_name   = $row[2];
                $model->birth_day   = $row[3];
                $model->date_change = $row[4];
                $model->description = $row[5];

                if ($model->validate()) {
                    $model->save();
                } else {
                    $error = true;
                    $errorDescription[] = '';
                    foreach ($model->getErrors() as $key => $value) {
                        $errorDescription[] = $key . ': ' . $value[0];
                    }
                }
            }

            fclose($handle);

            if ($error) {
                
            } else {

                $modelAll = UserData::findAll(['save_status' => 0]);
                $delete   = count($modelAll);
                $models   = UserData::deleteAll(['save_status' => UserData::STATUS_DELETE]);

                return array('resultImport' => array('update' => $update, 'insert' => $insert, 'delete' => $delete));
                
            }
        }
    }
}
