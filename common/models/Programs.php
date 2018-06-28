<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "programs".
 *
 * @property int $id
 * @property string $program_name
 * @property int $is_active
 */
class Programs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['program_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'program_name' => 'Назва програми',
            'is_active' => 'Статус Активності',
        ];
    }

    public static function getPrograms() {
        $models = self::findAll([ "is_active"=>true]);
        $list = array();
        foreach ($models as $model) {
            $list[$model->program_name] = $model->program_name;
        }
        return $list;
    }

}
