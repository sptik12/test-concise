<?php
namespace app\helpers;

use yii\base\InvalidArgumentException;
use yii\helpers\ArrayHelper;

/*
 *
 */
class Image
{
	/*
	 * Минимальные размеры миниатюр
	 */
	const IMAGE_MIN_WIDTH = 10;
	const IMAGE_MIN_HEIGHT = 10;


	/*
	 * Генерация миниатюры
	 *
	 * @param string $url - ссылка на картинку
	 * @param array $options, пример ['width'=>500, 'height'=>400]
	 * @return имя файла сгенерированной миниатюры
	 * @throws InvalidArgumentException
	 */
	public static function generateMiniature($url, $options)
	{
		$width = ArrayHelper::getValue($options, 'width');
		$height = ArrayHelper::getValue($options, 'height');
		if (!$width || !$height) {
			throw new InvalidArgumentException('Не заданы размеры миниатюры');
		}
		if ($width < self::IMAGE_MIN_WIDTH || $height < self::IMAGE_MIN_WIDTH) {
			throw new InvalidArgumentException('Недопустимый размер миниатюры');
		}
		$urlTmb = $url; // в реале тут должен быть код генерации миниатюры
		return $urlTmb;
	}

	/*
	 * Генерация миниатюры с водяным знаком
	 *
	 * @param string $url - ссылка на картинку
	 * @param array $options, пример ['width'=>500, 'height'=>400]
	 * @return имя файла сгенерированной миниатюры
	 * @throws InvalidArgumentException
	 */
	public static function generateWatermarkedMiniature($url, $options)
	{
		$width = ArrayHelper::getValue($options, 'width', 0);
		$height = ArrayHelper::getValue($options, 'height', 0);
		if (!$width || !$height) {
			throw new InvalidArgumentException('Не заданы размеры миниатюры');
		}
		if ($width < self::IMAGE_MIN_WIDTH || $height < self::IMAGE_MIN_HEIGHT) {
			throw new InvalidArgumentException('Недопустимый размер миниатюры');
		}
		$urlTmb = $url; // в реале тут должен быть код генерации миниатюры
		return $urlTmb;
	}

}
