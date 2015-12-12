<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property integer $DocumentId
 * @property integer $TopicId
 * @property integer $DocumentTypeId
 * @property integer $ParentDocumentId
 * @property string $Note
 * @property integer $Year
 * @property string $Publication
 * @property string $Date
 * @property string $Intro
 * @property string $Summary
 * @property string $Text
 * @property string $Title
 * @property string $Number
 * @property integer $EditionNumber
 * @property integer $DocumentOrder
 * @property integer $OldId
 * @property resource $HTML
 * @property integer $IndexId
 *
 * @property Document $parentDocument
 * @property Document[] $documents
 * @property Documenttype $documentType
 * @property Topic $topic
 * @property Documentbase[] $documentbases
 * @property Base[] $bases
 * @property Documentfile[] $documentfiles
 * @property Documentitem[] $documentitems
 * @property Documenttag[] $documenttags
 * @property Tag[] $tags
 * @property Relateddocument[] $relateddocuments
 * @property Relateddocument[] $relateddocuments0
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TopicId', 'DocumentTypeId'], 'required'],
            [['TopicId', 'DocumentTypeId', 'ParentDocumentId', 'Year', 'EditionNumber', 'DocumentOrder', 'OldId', 'IndexId'], 'integer'],
            [['Note', 'Publication', 'Intro', 'Summary', 'Text', 'Title', 'HTML'], 'string'],
            [['Date'], 'safe'],
            [['Number'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DocumentId' => 'Document ID',
            'TopicId' => 'Topic ID',
            'DocumentTypeId' => 'Document Type ID',
            'ParentDocumentId' => 'Parent Document ID',
            'Note' => 'Note',
            'Year' => 'Year',
            'Publication' => 'Publication',
            'Date' => 'Date',
            'Intro' => 'Intro',
            'Summary' => 'Summary',
            'Text' => 'Text',
            'Title' => 'Title',
            'Number' => 'Number',
            'EditionNumber' => 'Edition Number',
            'DocumentOrder' => 'Document Order',
            'OldId' => 'Old ID',
            'HTML' => 'Html',
            'IndexId' => 'Index ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentDocument()
    {
        return $this->hasOne(Document::className(), ['DocumentId' => 'ParentDocumentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['ParentDocumentId' => 'DocumentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentType()
    {
        return $this->hasOne(Documenttype::className(), ['DocumentTypeId' => 'DocumentTypeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopic()
    {
        return $this->hasOne(Topic::className(), ['TopicId' => 'TopicId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentbases()
    {
        return $this->hasMany(Documentbase::className(), ['DocumentId' => 'DocumentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBases()
    {
        return $this->hasMany(Base::className(), ['BaseId' => 'BaseId'])->viaTable('documentbase', ['DocumentId' => 'DocumentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentfiles()
    {
        return $this->hasMany(Documentfile::className(), ['DocumentId' => 'DocumentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentitems()
    {
        return $this->hasMany(Documentitem::className(), ['DocumentId' => 'DocumentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumenttags()
    {
        return $this->hasMany(Documenttag::className(), ['DocumentId' => 'DocumentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['TagId' => 'TagId'])->viaTable('documenttag', ['DocumentId' => 'DocumentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelateddocuments()
    {
        return $this->hasMany(Relateddocument::className(), ['SourceDocumentId' => 'DocumentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelateddocuments0()
    {
        return $this->hasMany(Relateddocument::className(), ['TargetDocumentId' => 'DocumentId']);
    }
}
