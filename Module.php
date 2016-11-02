<?php

namespace bttree\smypage;

use Yii;
/**
 * page module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'bttree\smypage\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        if (!isset(Yii::$app->i18n->translations['smy.page'])) {
            Yii::$app->i18n->translations['smy.page'] = [
                'class'          => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'ru',
                'basePath'       => '@bttree/smypage/messages'
            ];
        }
    }
}