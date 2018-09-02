<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kia_users".
 *
 * @property string $pazh_id
 * @property string $user_username
 * @property string $access_token
 * @property string $user_auth_key
 * @property string $password_reset_token
 * @property string $admin_password
 * @property string $user_otp
 * @property string $user_phone
 * @property string $user_mail
 * @property string $national_code
 * @property int $user_status
 * @property string $user_default_business
 * @property string $current_business_id
 * @property string $user_fullname
 *
 * @property Comment[] $comments
 * @property KiaComment[] $kiaComments
 * @property KiaExchanges[] $kiaExchanges
 * @property KiaOrderTicket[] $kiaOrderTickets
 * @property KiaOrders[] $kiaOrders
 * @property KiaPages[] $kiaPages
 * @property KiaPostComments[] $kiaPostComments
 * @property KiaPosts[] $kiaPosts
 * @property KiaProductComment[] $kiaProductComments
 * @property KiaRelations[] $kiaRelations
 * @property KiaRelations[] $kiaRelations0
 * @property KiaRepresentative[] $kiaRepresentatives
 * @property KiaStore[] $kiaStores
 * @property KiaTicket[] $kiaTickets
 * @property KiaTicketMeta[] $kiaTicketMetas
 * @property KiaTransactions[] $kiaTransactions
 * @property KiaUserBusiness[] $kiaUserBusinesses
 * @property KiaUserMeta[] $kiaUserMetas
 * @property KiaBusiness $userDefaultBusiness
 * @property KiaVisitor[] $kiaVisitors
 * @property Post[] $posts
 * @property Post[] $posts0
 * @property UserCommuting[] $userCommutings
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $role;
    public $permission;


    public static function tableName()
    {
        return 'kia_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_username', 'user_auth_key', 'user_default_business'], 'required'],
            [['user_phone', 'national_code', 'user_default_business','user_status'], 'integer'],
            [['current_business_id'], 'string'],
            [['user_username', 'user_mail'], 'string', 'max' => 100],
            [['access_token', 'user_auth_key', 'password_reset_token', 'admin_password', 'user_otp'], 'string', 'max' => 255],

            [['user_fullname'], 'string', 'max' => 40],
            [['user_phone'], 'unique'],
//            [['national_code'], 'unique'],
            [['user_default_business'], 'exist', 'skipOnError' => true, 'targetClass' => Business::className(), 'targetAttribute' => ['user_default_business' => 'business_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pazh_id' => Yii::t('app', 'Pazh ID'),
            'user_username' => Yii::t('app', 'User Username'),
            'access_token' => Yii::t('app', 'Access Token'),
            'user_auth_key' => Yii::t('app', 'User Auth Key'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'admin_password' => Yii::t('app', 'Admin Password'),
            'user_otp' => Yii::t('app', 'User Otp'),
            'user_phone' => Yii::t('app', 'User Phone'),
            'user_mail' => Yii::t('app', 'User Mail'),
            'national_code' => Yii::t('app', 'National Code'),
            'user_status' => Yii::t('app', 'User Status'),
            'user_default_business' => Yii::t('app', 'User Default Business'),
            'current_business_id' => Yii::t('app', 'Current Business ID'),
            'user_fullname' => Yii::t('app', 'User Fullname'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaComments()
    {
        return $this->hasMany(KiaComment::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaExchanges()
    {
        return $this->hasMany(KiaExchanges::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaOrderTickets()
    {
        return $this->hasMany(KiaOrderTicket::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaPages()
    {
        return $this->hasMany(KiaPages::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaPostComments()
    {
        return $this->hasMany(KiaPostComments::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaPosts()
    {
        return $this->hasMany(KiaPosts::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaProductComments()
    {
        return $this->hasMany(KiaProductComment::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaRelations()
    {
        return $this->hasMany(KiaRelations::className(), ['pazh_id1' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaRelations0()
    {
        return $this->hasMany(KiaRelations::className(), ['pazh_id2' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaRepresentatives()
    {
        return $this->hasMany(KiaRepresentative::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaStores()
    {
        return $this->hasMany(KiaStore::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaTickets()
    {
        return $this->hasMany(KiaTicket::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaTicketMetas()
    {
        return $this->hasMany(KiaTicketMeta::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaTransactions()
    {
        return $this->hasMany(KiaTransactions::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaUserBusinesses()
    {
        return $this->hasMany(KiaUserBusiness::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaUserMetas()
    {
        return $this->hasMany(KiaUserMeta::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDefaultBusiness()
    {
        return $this->hasOne(KiaBusiness::className(), ['business_id' => 'user_default_business']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKiaVisitors()
    {
        return $this->hasMany(KiaVisitor::className(), ['pazh_id' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['created_by' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts0()
    {
        return $this->hasMany(Post::className(), ['updated_by' => 'pazh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCommutings()
    {
        return $this->hasMany(UserCommuting::className(), ['pazh_id' => 'pazh_id']);
    }
    public  function  beforeValidate()
    {
        $this->user_default_business=10;
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }
    public function setPassword($password)
    {
        $this->admin_password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->user_auth_key = Yii::$app->security->generateRandomString();
    }
    public function Role()
    {
         $auth = Yii::$app->authManager;
         $role = $auth->getRoles();
        foreach ($role as $value)
            $rolear[$value->name]=str_replace('_',' ',$value->name);
        return $rolear;


    }

    public function permission()
    {
        $auth = Yii::$app->authManager;
        $role = $auth->getPermissions();
        foreach ($role as $value)
            $rolear[$value->name]=str_replace('_',' ',$value->name);
        return $rolear;

    }
    public function fetch_role_by_id($id)
    {
        $item_role=[];
        $auth = Yii::$app->authManager;
        $user_role = $auth->getRolesByUser($id);
        foreach ($user_role as $key => $value)
        {
            array_push($item_role,$key);

        }
        return $item_role;
    }
    public function fetch_permission_by_id($id)
    {
        $item_role=[];
        $auth = Yii::$app->authManager;
        $user_role = $auth->getPermissionsByUser($id);
        foreach ($user_role as $key => $value)
        {
            array_push($item_role,$key);

        }
        return $item_role;
    }

    public function assign_role_to_user($user_role,$pazh_id)
    {
        //------delete all user role-------

            $auth = Yii::$app->authManager;
            $auth->revokeAll($pazh_id);

        //------assign role {$user_role} to user {$pazh_id}

        if(is_array($user_role))
            foreach ($user_role as $role_name) {
                $role = $auth->getRole($role_name);
                $auth->assign($role, $pazh_id);
            }

        return true;


    }
}
