<?php

namespace koma136\smypage\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "page".
 *
 * @property integer      $id
 * @property string       $name
 * @property string       $slug
 * @property integer      $category_id
 * @property integer      $status
 * @property string       $short_description
 * @property string       $full_description
 * @property string       $create_time
 * @property string       $update_time
 * @property string       $seo_title
 * @property string       $seo_keywords
 * @property string       $seo_description
 *
 * @property PageCategory $category
 */
class Page extends ActiveRecord
{
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE   = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['short_description', 'full_description', 'seo_keywords', 'seo_description'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['name', 'slug', 'seo_title'], 'string', 'max' => 255],
            [
                ['category_id'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => PageCategory::className(),
                'targetAttribute' => ['category_id' => 'id']
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                => Yii::t('smy.page', 'ID'),
            'name'              => Yii::t('smy.page', 'Name'),
            'slug'              => Yii::t('smy.page', 'Slug'),
            'status'            => Yii::t('smy.page', 'Status'),
            'category_id'       => Yii::t('smy.page', 'Category ID'),
            'short_description' => Yii::t('smy.page', 'Short Description'),
            'full_description'  => Yii::t('smy.page', 'Full Description'),
            'create_time'       => Yii::t('smy.page', 'Create Time'),
            'update_time'       => Yii::t('smy.page', 'Update Time'),
            'seo_title'         => Yii::t('smy.page', 'Seo Title'),
            'seo_keywords'      => Yii::t('smy.page', 'Seo Keywords'),
            'seo_description'   => Yii::t('smy.page', 'Seo Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(PageCategory::className(), ['id' => 'category_id']);
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
