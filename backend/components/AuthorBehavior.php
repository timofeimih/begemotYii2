<?php

namespace backend\components;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class AuthorBehavior extends Behavior{
	/**
	* @var mixed The name of the attribute to store the author user ID.  Defaults to 'authorId'
	*/
	public $authorIdAttribute = 'authorId';


	/**
	* Responds to {@link CModel::onBeforeSave} event.
	* Sets the values of the author user ID attribute
	*
	* @param CModelEvent $event event parameter
	*/

	public function events()
	{
		return [
			ActiveRecord::EVENT_BEFORE_INSERT => 'updateOwner'
		];
	}
	public function updateOwner() {
			if (isset(Yii::$app->user->id) && Yii::$app->user->id!==null){
				$this->owner->{$this->authorIdAttribute} = Yii::$app->user->id;
			}
	}
}