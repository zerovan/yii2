<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kia_business".
 *
 * @property string $business_id
 * @property string $business_name
 * @property string $root
 * @property string $lft
 * @property string $rgt
 * @property int $lvl
 * @property string $name
 * @property string $icon
 * @property int $icon_type
 * @property int $active
 * @property int $selected
 * @property int $disabled
 * @property int $readonly
 * @property int $visible
 * @property int $collapsed
 * @property int $movable_u
 * @property int $movable_d
 * @property int $movable_l
 * @property int $movable_r
 * @property int $removable
 * @property int $removable_all
 * @property int $business_status
 * @property string $taxonomy_id
 * @property string $business_url
 * @property string $business_phone
 * @property string $business_mail
 * @property int $business_employees
 * @property string $business_address
 * @property int $business_ssl
 * @property string $business_panel_url
 * @property string $business_logo
 * @property string $business_color
 *
 * @property KiaExchangeMeta[] $kiaExchangeMetas
 * @property KiaExchanges[] $kiaExchanges
 * @property KiaGatewayMeta[] $kiaGatewayMetas
 * @property KiaPages[] $kiaPages
 * @property KiaPosts[] $kiaPosts
 * @property KiaProduct[] $kiaProducts
 * @property KiaRelations[] $kiaRelations
 * @property KiaTicket[] $kiaTickets
 * @property KiaTransactions[] $kiaTransactions
 * @property KiaUserBusiness[] $kiaUserBusinesses
 * @property KiaUsers[] $kiaUsers
 */
class Business extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kia_business';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_name', 'lft', 'rgt', 'lvl', 'name', 'taxonomy_id'], 'required'],
            [['root', 'lft', 'rgt', 'lvl', 'business_employees'], 'integer'],
            [['taxonomy_id', 'business_address'], 'string'],
            [['business_name', 'business_url', 'business_mail', 'business_panel_url', 'business_logo'], 'string', 'max' => 100],
            [['name'], 'string', 'max' => 60],
            [['icon'], 'string', 'max' => 255],
            [['icon_type', 'active', 'selected', 'disabled', 'readonly', 'visible', 'collapsed', 'movable_u', 'movable_d', 'movable_l', 'movable_r', 'removable', 'removable_all'], 'string', 'max' => 4],
            [['business_status', 'business_ssl'], 'string', 'max' => 1],
            [['business_phone', 'business_color'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'business_id' => Yii::t('app', 'Business ID'),
            'business_name' => Yii::t('app', 'Business Name'),
            'root' => Yii::t('app', 'Root'),
            'lft' => Yii::t('app', 'Lft'),
            'rgt' => Yii::t('app', 'Rgt'),
            'lvl' => Yii::t('app', 'Lvl'),
            'name' => Yii::t('app', 'Name'),
            'icon' => Yii::t('app', 'Icon'),
            'icon_type' => Yii::t('app', 'Icon Type'),
            'active' => Yii::t('app', 'Active'),
            'selected' => Yii::t('app', 'Selected'),
            'disabled' => Yii::t('app', 'Disabled'),
            'readonly' => Yii::t('app', 'Readonly'),
            'visible' => Yii::t('app', 'Visible'),
            'collapsed' => Yii::t('app', 'Collapsed'),
            'movable_u' => Yii::t('app', 'Movable U'),
            'movable_d' => Yii::t('app', 'Movable D'),
            'movable_l' => Yii::t('app', 'Movable L'),
            'movable_r' => Yii::t('app', 'Movable R'),
            'removable' => Yii::t('app', 'Removable'),
            'removable_all' => Yii::t('app', 'Removable All'),
            'business_status' => Yii::t('app', 'Business Status'),
            'taxonomy_id' => Yii::t('app', 'Taxonomy ID'),
            'business_url' => Yii::t('app', 'Business Url'),
            'business_phone' => Yii::t('app', 'Business Phone'),
            'business_mail' => Yii::t('app', 'Business Mail'),
            'business_employees' => Yii::t('app', 'Business Employees'),
            'business_address' => Yii::t('app', 'Business Address'),
            'business_ssl' => Yii::t('app', 'Business Ssl'),
            'business_panel_url' => Yii::t('app', 'Business Panel Url'),
            'business_logo' => Yii::t('app', 'Business Logo'),
            'business_color' => Yii::t('app', 'Business Color'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaExchangeMetas()
    {
        return $this->hasMany(KiaExchangeMeta::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaExchanges()
    {
        return $this->hasMany(KiaExchanges::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaGatewayMetas()
    {
        return $this->hasMany(KiaGatewayMeta::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaPages()
    {
        return $this->hasMany(KiaPages::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaPosts()
    {
        return $this->hasMany(KiaPosts::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaProducts()
    {
        return $this->hasMany(KiaProduct::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaRelations()
    {
        return $this->hasMany(KiaRelations::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaTickets()
    {
        return $this->hasMany(KiaTicket::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaTransactions()
    {
        return $this->hasMany(KiaTransactions::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaUserBusinesses()
    {
        return $this->hasMany(KiaUserBusiness::className(), ['business_id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['user_default_business' => 'business_id']);
    }
}
