<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

/*
 *
 */
class BaseController extends Controller
{
	public $timeStart;

	/*
	 * inherit
	 */
	public function beforeAction($action)
	{
		$this->timeStart = microtime(true);
		$this->debug(Yii::t('app', 'Start {id}/{action}', ['id' => $this->id, 'action' => $action->id]));
		return parent::beforeAction($action);
	}

	/*
	 * inherit
	 */
	public function afterAction($action, $result)
	{
		$this->debug(Yii::t('app', 'Stop {id}/{action}', ['id' => $this->id, 'action' => $action->id]));
		$timeSpent = microtime(true) - $this->timeStart;
		$this->debug(Yii::t('app', 'Execution time: {value}', ['value' => sprintf("%01d%s%02d",  ($timeSpent / 60) , ':', $timeSpent % 60)]));
		return parent::afterAction($action, $result);
	}

	/*
	 * Debug
	 */
	public function debug($message)
	{
		echo $message . PHP_EOL;
		Yii::info($message, $this->id);
	}

}
