<?php

namespace app\models\entities;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $accessToken
 * @property string $date_up
 * @property int $user_profile_id
 *
 * @property UsersProfiles $userProfile
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_up'], 'safe'],
            [['user_profile_id'], 'integer'],
            [['login', 'password', 'accessToken'], 'string', 'max' => 64],
            [['user_profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersProfiles::className(), 'targetAttribute' => ['user_profile_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'accessToken' => 'Access Token',
            'date_up' => 'Date Up',
            'user_profile_id' => 'User Profile ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UsersProfiles::className(), ['id' => 'user_profile_id']);
    }
}
