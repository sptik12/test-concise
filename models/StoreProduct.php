<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store_product".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $product_image
 */
class StoreProduct extends BaseActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'store_product';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['product_id'], 'required'],
			[['product_image'], 'safe'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'product_id' => Yii::t('app', 'Продукт'),
			'product_image' => Yii::t('app', 'Url Картинки'),
		];
	}

	/**
	 * Get Product
	 * @return \yii\db\ActiveQuery
	 */
	public function getProduct()
	{
		return $this->hasOne(Product::class, ['id' => 'product_id']);
	}

}
