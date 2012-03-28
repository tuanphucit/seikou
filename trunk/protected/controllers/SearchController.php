<?php

class SearchController extends Controller
{
	public function actionIndex()
	{
		// Breadcrumbs
		$this->breadcrumbs = array(
			t('Search')=>$this->createUrl('/search/index'),
			t('Index'),
		);
		// Check if whenever search form is submitted　（　検索フォームがサブミットされれば、チェックする　）
		$results = array();
		$orderTime = new OrderTimeForm();
		$form = request("OrderTimeForm");
		if (isset($form) && Yii::app()->request->isAjaxRequest){
			$orderTime->attributes = $form;
			/** STEP1: check require validate on start_date and end_date 始日と終了日の検証が必要なチェック（））**/
			$orderTime->validate(array('start_date','end_date'));
			if (!$orderTime->hasErrors()) {
				
				/** STEP2: 
				 * Case 1: have start_time and end_time　（始日と終了日　が　ある）
				 * Case 2: don't have start_time or end_time <== don't have this case　（始日と終了日　が　ない）
				 */
				// get all products　　すべての製品を得る
				$products = Products::model()->findAll();
				foreach ($products as $product) {
					$orderTime->pid = $product->id;
					if ($orderTime->validateTime())
						$results[] = $product;
				}
			}
			$this->renderPartial('_result',array(
				'orderTime'    => $orderTime,
				'results'      => $results,
			));
			return;
		}
		$this->render('index',array(
			'orderTime'    => $orderTime,
			'results'      => $results,
		));
	}
	
	public function filters()
	{
		return array(
			'accessControl',
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions　　（されたユーザーはすべてのアクションへのアクセスを許可する）
				'users'=>array('@'),
				'actions'=>array('index')
			),
			array('deny',  // deny all users　　(すべてのユーザーを拒否する。)
				'users'=>array('*'),
			),
		);
	}
}