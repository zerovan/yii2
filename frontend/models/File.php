<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "file_specification".
 *
 * @property int $id
 * @property string $en_name
 * @property string $fa_name
 * @property string $date_time
 * @property string $teacher
 * @property string $tag
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file_specification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['en_name', 'fa_name'], 'required'],
            [['date_time'], 'safe'],
            [['en_name', 'fa_name', 'teacher'], 'string', 'max' => 255],
            [['tag'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'en_name' => Yii::t('app', 'En Name'),
            'fa_name' => Yii::t('app', 'Fa Name'),
            'date_time' => Yii::t('app', 'Date Time'),
            'teacher' => Yii::t('app', 'Teacher'),
            'tag' => Yii::t('app', 'Tag'),
        ];
    }
}
