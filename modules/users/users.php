<?php

namespace app\modules\users;

/**
 * users module definition class
 */
class users extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\users\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->defaultRoute='profile';

        parent::init();

        // custom initialization code goes here
    }
}
