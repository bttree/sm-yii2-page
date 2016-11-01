<?php

namespace koma136\smypage\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "page_category".
 *
 * @property integer $id
 * @property string  $name
 * @property string  $slug
 * @property integer $parent_id
 * @property integer $status
 * @property string  $description
 * @property string  $seo_title
 * @property string  $seo_keywords
 * @property string  $seo_description
 *
 * @property Page[]  $pages
 */
class PageCategory extends ActiveRecord
{
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE   = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['parent_id', 'status'], 'integer'],
            [['description', 'seo_keywords', 'seo_description'], 'string'],
            [['name', 'slug', 'seo_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => Yii::t('smy.page', 'ID'),
            'name'            => Yii::t('smy.page', 'Name'),
            'slug'            => Yii::t('smy.page', 'Slug'),
            'status'          => Yii::t('smy.page', 'Status'),
            'parent_id'       => Yii::t('smy.page', 'Parent ID'),
            'description'     => Yii::t('smy.page', 'Description'),
            'seo_title'       => Yii::t('smy.page', 'Seo Title'),
            'seo_keywords'    => Yii::t('smy.page', 'Seo Keywords'),
            'seo_description' => Yii::t('smy.page', 'Seo Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::className(), ['category_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getStatusArray()
    {
        return [
            self::STATUS_ACTIVE   => Yii::t('smy.page', 'Active'),
            self::STATUS_DISABLED => Yii::t('smy.page', 'Disabled'),
        ];
    }

    /**
     * @param string $slug
     * @return static|null
     */
    public static function findBySlug($slug)
    {
        return self::findOne(['slug' => $slug, 'status' => self::STATUS_ACTIVE]);
    }
}
