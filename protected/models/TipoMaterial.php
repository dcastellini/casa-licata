<?php

/**
 * This is the model class for table "tipo_material".
 *
 * The followings are the available columns in table 'tipo_material':
 * @property string $tipo_material
 * @property string $descripcion
 * @property string $usu_creacion
 * @property string $fhcreacion
 * @property string $usu_modif
 * @property string $fhmodif
 *
 * The followings are the available model relations:
 * @property MaterialStock[] $materialStocks
 */
class TipoMaterial extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_material';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_material, descripcion, usu_creacion, fhcreacion, usu_modif, fhmodif', 'required'),
			array('tipo_material', 'length', 'max'=>1),
			array('descripcion', 'length', 'max'=>200),
			array('usu_creacion, usu_modif', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tipo_material, descripcion, usu_creacion, fhcreacion, usu_modif, fhmodif', 'safe', 'on'=>'search'),
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
			'materialStocks' => array(self::HAS_MANY, 'MaterialStock', 'tipo_material'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tipo_material' => 'Tipo Material',
			'descripcion' => 'Descripcion',
			'usu_creacion' => 'Usu Creacion',
			'fhcreacion' => 'Fhcreacion',
			'usu_modif' => 'Usu Modif',
			'fhmodif' => 'Fhmodif',
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('tipo_material',$this->tipo_material,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('usu_creacion',$this->usu_creacion,true);
		$criteria->compare('fhcreacion',$this->fhcreacion,true);
		$criteria->compare('usu_modif',$this->usu_modif,true);
		$criteria->compare('fhmodif',$this->fhmodif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoMaterial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
