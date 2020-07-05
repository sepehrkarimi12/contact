<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_contact".
 *
 * @property int $id
 * @property string $name
 * @property int $number_type_id
 * @property string $number
 *
 * @property TblNumberType $numberType
 */
class Contact extends \yii\db\ActiveRecord
{
    public $new_number_type;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'number_type_id', 'number'], 'required'],
//            [['number_type_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['number'], 'string', 'max' => 11],
//            [['number_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => NumberType::className(), 'targetAttribute' => ['number_type_id' => 'id']],
            [['number'], 'match', 'pattern' => '/((\+[0-9]{6})|0)[-]?[0-9]{7}/'],
            [['number'], 'unique'],
            ['new_number_type', 'required', 'when' => function($model) {
                return $model->number_type_id == 0;
            }, 'enableClientValidation' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'number_type_id' => 'Number Type',
            'number' => 'Number',
        ];
    }

    /**
     * Gets query for [[NumberType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNumberType()
    {
        return $this->hasOne(NumberType::className(), ['id' => 'number_type_id']);
    }
}
