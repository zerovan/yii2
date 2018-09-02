<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "kia_ticket".
 *
 * @property string $ticket_id
 * @property string $pazh_id
 * @property string $business_id
 * @property string $ticket_subject
 * @property string $ticket_content
 * @property int $ticket_department
 * @property int $ticket_status
 * @property string $ticket_submit_date
 * @property string $ticket_last_update
 * @property int $user_visibility
 *
 * @property KiaBusiness $business
 * @property KiaUsers $pazh
 * @property KiaTicketMeta[] $kiaTicketMetas
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kia_ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pazh_id', 'business_id', 'ticket_subject', 'ticket_content', 'ticket_department'], 'required'],
            [['pazh_id', 'business_id'], 'integer'],
            [['ticket_content'], 'string'],
            [['ticket_submit_date', 'ticket_last_update'], 'safe'],
            [['ticket_subject'], 'string', 'max' => 100],
            [['ticket_department', 'ticket_status'], 'string', 'max' => 3],
            [['user_visibility'], 'string', 'max' => 4],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => Business::className(), 'targetAttribute' => ['business_id' => 'business_id']],
            [['pazh_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['pazh_id' => 'pazh_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ticket_id' => Yii::t('app', 'Ticket ID'),
            'pazh_id' => Yii::t('app', 'Pazh ID'),
            'business_id' => Yii::t('app', 'Business ID'),
            'ticket_subject' => Yii::t('app', 'Ticket Subject'),
            'ticket_content' => Yii::t('app', 'Ticket Content'),
            'ticket_department' => Yii::t('app', 'Ticket Department'),
            'ticket_status' => Yii::t('app', 'Ticket Status'),
            'ticket_submit_date' => Yii::t('app', 'Ticket Submit Date'),
            'ticket_last_update' => Yii::t('app', 'Ticket Last Update'),
            'user_visibility' => Yii::t('app', 'User Visibility'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusiness()
    {
        return $this->hasOne(Business::className(), ['business_id' => 'business_id']);
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
    public function getKiaTicketMetas()
    {
        return $this->hasMany(TicketMeta::className(), ['ticket_id' => 'ticket_id']); //????????????باید بسازیم؟؟؟؟؟؟؟؟؟؟؟
    }

    public function get_comment_by_ticket_id($ticket_id)
    {
        return Comment::find()->where('ticket_id ='.$ticket_id)->all();
    }
}
