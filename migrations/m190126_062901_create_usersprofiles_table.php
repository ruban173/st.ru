<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users_profiles`.
 */
class m190126_062901_create_usersprofiles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users_profiles', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(50),
            'middle_name' => $this->string(50),
            'last_name' => $this->string(50),
             'birdthday' => $this->date(),
            'date_up' =>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'group' => $this->string(20),
            'active'=> $this->boolean()->defaultValue(true)

        ]);
        $this->createIndex(
            'idx-users-user_profile_id',
            'users',
            'user_profile_id'
        );

        // add foreign key for table `users_profiles`
        $this->addForeignKey(
            'fk-users-user_profile_id',
            'users',
            'user_profile_id',
            'users_profiles',
            'id'
        // 'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk-users-user_profile_id',
            'users'
        );

        // drops index for column `user_profile_id`
        $this->dropIndex(
            'idx-users-user_profile_id',
            'users'
        );

        $this->dropTable('users_profiles');
    }
}
