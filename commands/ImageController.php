<?php
namespace app\commands;

use app\models\Product;
use app\helpers\Image;

/**
 * Генератор миниатюр
 *
 */
class ImageController extends BaseController
{
	/**
	 * Генерирует миниатюры для изображений для всех продуктов, которые не удалены.
	 * @param string $sizes - набор размеров миниатюр. Размеры разделюятся через запятую. Если ширина
	 * и высота разная, то они разделяются символом "x" (латиница). Пример формата: "100,200x300,500x600".
	 * @param boolean $watermarked - Накладывать ли водные знаки на миниатюру.
	 * @param boolean Искать только те товары, которые есть в обеих таблицах - "product" и "store_product".
	 */
	public function actionGenerate($sizes, $watermarked = false, $catalogOnly = true)
	{
		$parseSizeError = false;
		$aDimensions = [];

		$aSizes = explode(',', $sizes);
		foreach ($aSizes as $aSize) {
			$dims = explode('x', $aSize);
			if (count($dims) > 2) {
				$parseSizeError = true;
				break;
			}

			$width = $dims[0];
			$height  = (count($dims) == 2) ? $dims[1] : $width;
			if (preg_match('/^\+?\d+$/', $width) && preg_match('/^\+?\d+$/', $height)) {
				$aDimensions[] = [
									'options' => ['width' => $width, 'height' => $height],
									'processed_success' => 0,
									'processed_error' => 0,
								];
			}
			else {
				$parseSizeError = true;
				break;
			}
		}

		if ($parseSizeError) {
			$this->debug("Недопустимый формат размера миниатюр: $sizes");
			return;
		}


		$products = Product::find()->active();
		if ($catalogOnly) {
			$products->stored();
		}
		$products = $products->all();

		foreach ($aDimensions as &$dimensions) {
			foreach ($products as $product) {
				try {
					$result = ($watermarked) ? Image::generateWatermarkedMiniature($product->image, $dimensions['options']) :
						Image::generateMiniature($product->image, $dimensions['options']);
					$dimensions['processed_success']++;
				}
				catch (\Exception $e) {
					$dimensions['processed_error']++;
				}
			}
		}

		foreach ($aDimensions as &$dimensions) {
			$size = $dimensions['options']['width'].'x'.$dimensions['options']['height'];
			$this->debug(sprintf("Размер миниатюры: %s Водяной знак: %s", $size, ($watermarked) ? 'Есть' : 'Нет'));
			$this->debug(sprintf("Успешно сгенерировано: %d  Ошибок: %d", $dimensions['processed_success'], $dimensions['processed_error']));
		}
	}
}
