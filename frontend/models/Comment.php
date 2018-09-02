<?php

namespace frontend\models;

use Yii;

use frontend\models\Users;

/**
 * This is the model class for table "{{%kia_comment}}".
 *
 * @property string $comment_id
 * @property string $order_id
 * @property string $product_id
 * @property string $ticket_id
 * @property string $pazh_id
 * @property string $comment_content
 * @property string $comment_date
 * @property int $comment_user_visible
 *
 * @property KiaUsers $pazh
 * @property KiaMetaComment[] $kiaMetaComments
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $comment_type;
    public $username;
    public static function tableName()
    {
        return '{{%kia_comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'ticket_id', 'pazh_id','comment_user_visible'], 'integer'],
            [['comment_content'], 'string'],
            [['comment_date'], 'safe'],
           // [['comment_user_visible'], 'string', 'max' => 1],
            [['pazh_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['pazh_id' => 'pazh_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => Yii::t('app', 'Comment ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'ticket_id' => Yii::t('app', 'Ticket ID'),
            'pazh_id' => Yii::t('app', 'Pazh ID'),
            'comment_content' => Yii::t('app', 'Comment Content'),
            'comment_date' => Yii::t('app', 'Comment Date'),
            'comment_user_visible' => Yii::t('app', 'Comment User Visible'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPazh()
    {
        return $this->hasOne(Users::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaMetaComments()
    {
        return $this->hasMany(MetaComment::className(), ['comment_id' => 'comment_id']);
    }
}
