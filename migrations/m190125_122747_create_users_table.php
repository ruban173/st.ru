<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m190125_122747_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login'=>$this->string(64),
            'password'=>$this->string(64),
            'accessToken'=>$this->string(64),
            'date_up'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'user_profile_id'=>$this->integer(),
        ]);



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {



        $this->dropTable('users');
    }
}
