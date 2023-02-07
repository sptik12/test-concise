<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $image
 * @property int $is_deleted
 */
class Product extends BaseActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'product';
	}

	/**
	 * {@inheritdoc}
	 * @return ProductQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new ProductQuery(get_called_class());
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['image'], 'required', 'on'=> ['create', 'update']],
			[['image'], 'string', 'max' => 128],
			[['is_deleted'], 'safe'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'image' => Yii::t('app', 'Url Картинки'),
			'is_deleted' => Yii::t('app', 'Удален'),
		];
	}

	/**
	 * Get Store Products
	 * @return \yii\db\ActiveQuery
	 */
	public function getStoreProduct()
	{
		return $this->hasMany(StoreProduct::class, ['id' => 'product_id']);
	}

}
