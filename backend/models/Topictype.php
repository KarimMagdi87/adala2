<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "topictype".
 *
 * @property integer $TopicTypeId
 * @property string $Name
 * @property string $Color
 *
 * @property Basetopic[] $basetopics
 * @property Documenttype[] $documenttypes
 * @property Topic[] $topics
 */
class Topictype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'topictype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TopicTypeId', 'Name'], 'required'],
            [['TopicTypeId'], 'integer'],
            [['Name'], 'string', 'max' => 50],
            [['Color'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TopicTypeId' => 'Topic Type ID',
            'Name' => 'Name',
            'Color' => 'Color',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasetopics()
    {
        return $this->hasMany(Basetopic::className(), ['TopicTypeId' => 'TopicTypeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumenttypes()
    {
        return $this->hasMany(Documenttype::className(), ['TopicTypeId' => 'TopicTypeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopics()
    {
        return $this->hasMany(Topic::className(), ['TopicTypeId' => 'TopicTypeId']);
    }
}
