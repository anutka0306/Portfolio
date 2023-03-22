<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "works".
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $name
 * @property string|null $link
 * @property string|null $thumb
 * @property string|null $image
 * @property string|null $description
 * @property string|null $content
 *
 * @property Categories $category
 */

class Works extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'works';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['category_id'], 'required'],
            [['category_id'], 'integer'],
            [['description', 'content'], 'string'],
            [['name', 'link'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
            [['image', 'thumb'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'link' => 'Link',
            'thumb' => 'Thumb',
            'image' => 'Image',
            'description' => 'Description',
            'content' => 'Content',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getWorks()
    {
        return Works::find()->with('category')->all();
    }

    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord|null
     */
    public function getWorkById($id)
    {
        return Works::find()->where(['id' => $id])->with('category')->one();
    }
    /**
     * @return bool
     */
    public function upload()
    {
        if($this->validate(['image'])){
            if($this->image) {
                $this->image->saveAs('uploads/' . $this->image->baseName . '.' . $this->image->extension);
            }
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return bool
     */
    public function uploadThumb()
    {
        if($this->validate('thumb')) {
            if($this->thumb) {
                $this->thumb->saveAs('uploads/thumb/' . $this->thumb->baseName .'.' . $this->thumb->extension);
            }
            return true;
        }
        return false;
    }
}
