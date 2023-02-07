<?php

namespace app\models;

use Yii;

/**
 * This is the ActiveQuery class for [[Product]].
 *
 * @see ProductQuery
 */
class ProductQuery extends \yii\db\ActiveQuery
{
	/*
	 * filter scope
	 */
	public function active()
	{
		return $this->andWhere('[[product.is_deleted]] = 0');
	}

	/*
	 * filter scope
	 */
	public function deleted()
	{
		return $this->andWhere('[[product.is_deleted]] = 1');
	}

	/*
	 * filter scope
	 */
	public function stored()
	{
		return $this->andWhere(['in', 'id', StoreProduct::find()->select('product_id')->distinct()->column()]);
	}

	/**
	 * @inheritdoc
	 * @return Product[]|array
	 */
	public function all($db = null)
	{
		return parent::all($db);
	}

	/**
	 * @inheritdoc
	 * @return Product|array|null
	 */
	public function one($db = null)
	{
		return parent::one($db);
	}
}
