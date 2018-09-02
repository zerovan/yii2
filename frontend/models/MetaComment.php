<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kia_meta_comment".
 *
 * @property string $meta_comment_id
 * @property string $comment_id
 * @property string $meta_comment_key
 * @property string $meta_comment_value
 *
 * @property KiaComment $comment
 */
class MetaComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kia_meta_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_id', 'meta_comment_key'], 'required'],
            [['comment_id'], 'integer'],
            [['meta_comment_value'], 'string'],
            [['meta_comment_key'], 'string', 'max' => 25],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => KiaComment::className(), 'targetAttribute' => ['comment_id' => 'comment_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'meta_comment_id' => Yii::t('app', 'Meta Comment ID'),
            'comment_id' => Yii::t('app', 'Comment ID'),
            'meta_comment_key' => Yii::t('app', 'Meta Comment Key'),
            'meta_comment_value' => Yii::t('app', 'Meta Comment Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['comment_id' => 'comment_id']);
    }
}
