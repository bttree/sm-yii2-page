<?php
namespace bttree\smypage\widgets;

use bttree\smypage\models\Page;
use bttree\smypage\models\PageCategory;
use yii\base\Widget;

/**
 * Class ContentBlockWidget
 * @package \bttree\smypage\widgets
 *
 */
class ContentBlockWidget extends Widget
{
    public $type;

    public $view = 'content-block';

    public $slug;

    public function init()
    {
        if ($this->type === null) {
            $this->type = Page::TYPE_BLOCK;
        }

        parent::init();
    }

    public function run()
    {
        $block = Page::find()
                     ->where(['slug' => $this->slug, 'type' => $this->type, 'status' => Page::STATUS_ACTIVE])
                     ->one();

        if ($block === null) {
            return '';
        }

        return $this->render($this->view,
                             [
                                 'block' => $block,
                             ]);
    }
}