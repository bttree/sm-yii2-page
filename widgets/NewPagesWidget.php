<?php
namespace bttree\smypage\widgets;

use bttree\smypage\models\Page;
use bttree\smypage\models\PageCategory;
use yii\base\Widget;

/**
 * Class NewPagesWidget
 * @package \bttree\smypage\widgets
 *
 */
class NewPagesWidget extends Widget
{
    public $limit = 10;

    public $categorySlug;

    public $view = 'new-pages';

    public function init()
    {

    }

    public function run()
    {
        $order = Page::find()->limit($this->limit)->orderBy('page.create_time');

        if(isset($this->categorySlug)) {
            $category = PageCategory::findOne(['slug' => $this->categorySlug]);

            $order->joinWith('category')->where(['page_category.id' => $category->id]);
        } else {
            $category = null;
        }

        $pages = $order->all();

        return $this->render($this->view,
                             [
                                 'pages'    => $pages,
                                 'category' => $category,
                             ]);
    }
}