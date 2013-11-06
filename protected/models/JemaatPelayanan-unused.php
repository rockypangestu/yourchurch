<?php

/**
 * This is the model class for table "basic_jemaat_pelayanan".
 *
 * The followings are the available columns in table 'basic_jemaat_pelayanan':
 * @property integer $id
 * @property integer $jemaat_id
 * @property integer $pelayanan_id
 * @property string $keterangan
 *
 * The followings are the available model relations:
 * @property Jemaat $jemaat
 * @property Pelayanan $pelayanan
 */
class JemaatPelayanan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'basic_jemaat_pelayanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jemaat_id, pelayanan_id, keterangan', 'required'),
			array('jemaat_id, pelayanan_id', 'numerical', 'integerOnly'=>true),
			array('id, jemaat_id, pelayanan_id, keterangan', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'jemaat' => array(self::BELONGS_TO, 'Jemaat', 'jemaat_id'),
			'pelayanan' => array(self::BELONGS_TO, 'Pelayanan', 'pelayanan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'jemaat_id' => 'Jemaat',
			'pelayanan_id' => 'Pelayanan',
			'keterangan' => 'Keterangan',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('jemaat_id',$this->jemaat_id);
		$criteria->compare('pelayanan_id',$this->pelayanan_id);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JemaatPelayanan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
