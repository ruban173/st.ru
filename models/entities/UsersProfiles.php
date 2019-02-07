<?php

namespace app\models\entities;

use Yii;

/**
 * This is the model class for table "users_profiles".
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $birdthday
 * @property string $date_up
 * @property string $group
 * @property int $active
 */
class UsersProfiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_profiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birdthday', 'date_up'], 'safe'],
            [['active'], 'integer'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 50],
            [['group'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'last_name' => 'Фамилия',
            'birdthday' => 'Дата рождения',
            'date_up' => 'Обновлено',
            'group' => 'Группа',
            'active' => 'Активность',
        ];
    }
}
