<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kia_product".
 *
 * @property string $product_id
 * @property string $product_name
 * @property string $product_code
 * @property string $product_barcode
 * @property int $product_status
 * @property string $product_description
 * @property string $product_taxonomy_id
 * @property string $product_published_date
 * @property string $product_modified_date
 * @property int $product_language
 * @property string $product_slug
 * @property string $business_id
 * @property string $product_en_name
 *
 * @property KiaBusiness $business
 * @property KiaProductComment[] $kiaProductComments
 * @property KiaProductMeta[] $kiaProductMetas
 * @property KiaProductModel[] $kiaProductModels
 * @property OrderItem[] $orderItems
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kia_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'product_taxonomy_id', 'business_id', 'product_en_name'], 'required'],
            [['product_description', 'product_taxonomy_id'], 'string'],
            [['product_published_date', 'product_modified_date'], 'safe'],
            [['business_id'], 'integer'],
            [['product_name', 'product_en_name'], 'string', 'max' => 100],
            [['product_code'], 'string', 'max' => 80],
            [['product_barcode'], 'string', 'max' => 20],
            [['product_status', 'product_language'], 'string', 'max' => 4],
            [['product_slug'], 'string', 'max' => 32],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => Business::className(), 'targetAttribute' => ['business_id' => 'business_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'product_name' => Yii::t('app', 'Product Name'),
            'product_code' => Yii::t('app', 'Product Code'),
            'product_barcode' => Yii::t('app', 'Product Barcode'),
            'product_status' => Yii::t('app', 'Product Status'),
            'product_description' => Yii::t('app', 'Product Description'),
            'product_taxonomy_id' => Yii::t('app', 'Product Taxonomy ID'),
            'product_published_date' => Yii::t('app', 'Product Published Date'),
            'product_modified_date' => Yii::t('app', 'Product Modified Date'),
            'product_language' => Yii::t('app', 'Product Language'),
            'product_slug' => Yii::t('app', 'Product Slug'),
            'business_id' => Yii::t('app', 'Business ID'),
            'product_en_name' => Yii::t('app', 'Product En Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusiness()
    {
        return $this->hasOne(KiaBusiness::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaProductComments()
    {
        return $this->hasMany(KiaProductComment::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaProductMetas()
    {
        return $this->hasMany(KiaProductMeta::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaProductModels()
    {
        return $this->hasMany(KiaProductModel::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['product_id' => 'product_id']);
    }
    public function select_comment_by_product_id($id)
    {
        //die($id);
        return Comment::find()->where('product_id ='.$id)->all();

    }
}
