<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kia_orders".
 *
 * @property string $order_id
 * @property string $pazh_id
 * @property string $order_date
 * @property string $order_modified_date
 * @property int $order_status
 * @property string $order_post_code
 * @property string $order_address
 * @property string $order_post_method
 * @property string $order_post_time
 * @property string $order_export_code
 * @property int $order_del
 * @property int $order_lock
 *
 * @property KiaOrderMeta[] $kiaOrderMetas
 * @property KiaOrderTicket[] $kiaOrderTickets
 * @property KiaUsers $pazh
 * @property OrderItem[] $orderItems
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kia_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pazh_id', 'order_post_code', 'order_address', 'order_post_method', 'order_post_time', 'order_export_code'], 'required'],
            [['pazh_id'], 'integer'],
            [['order_date', 'order_modified_date', 'order_post_time'], 'safe'],
            [['order_address'], 'string'],
            [['order_status', 'order_lock'], 'string', 'max' => 4],
            [['order_post_code', 'order_export_code'], 'string', 'max' => 50],
            [['order_post_method'], 'string', 'max' => 100],
            [['order_del'], 'string', 'max' => 1],
            [['pazh_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['pazh_id' => 'pazh_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => Yii::t('app', 'Order ID'),
            'pazh_id' => Yii::t('app', 'Pazh ID'),
            'order_date' => Yii::t('app', 'Order Date'),
            'order_modified_date' => Yii::t('app', 'Order Modified Date'),
            'order_status' => Yii::t('app', 'Order Status'),
            'order_post_code' => Yii::t('app', 'Order Post Code'),
            'order_address' => Yii::t('app', 'Order Address'),
            'order_post_method' => Yii::t('app', 'Order Post Method'),
            'order_post_time' => Yii::t('app', 'Order Post Time'),
            'order_export_code' => Yii::t('app', 'Order Export Code'),
            'order_del' => Yii::t('app', 'Order Del'),
            'order_lock' => Yii::t('app', 'Order Lock'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaOrderMetas()
    {
        return $this->hasMany(KiaOrderMeta::className(), ['order_id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaOrderTickets()
    {
        return $this->hasMany(KiaOrderTicket::className(), ['order_id' => 'order_id']);
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
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'order_id']);
    }

    public function select_comment_by_order_id($id)
    {
        //die($id);
         return Comment::find()->where('order_id ='.$id)->all();

    }

}
