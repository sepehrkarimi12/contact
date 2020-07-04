<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_number_type".
 *
 * @property int $id
 * @property string $title
 *
 * @property TblContact[] $tblContacts
 */
class NumberType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_number_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[TblContacts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblContacts()
    {
        return $this->hasMany(TblContact::className(), ['number_type_id' => 'id']);
    }

    public static function getListForDropDown()
    {
        return ArrayHelper::map(self::find()->all(),'id', 'title');
//        echo "<pre>";
//        print_r($list);
//        die;
    }
}
