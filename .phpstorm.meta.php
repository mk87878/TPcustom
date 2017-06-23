<?php
	namespace PHPSTORM_META {
	/** @noinspection PhpUnusedLocalVariableInspection */
	/** @noinspection PhpIllegalArrayKeyTypeInspection */
	$STATIC_METHOD_TYPES = [

		\D('') => [
			'News' instanceof Admin\Model\NewsModel,
			'Mongo' instanceof Think\Model\MongoModel,
			'View' instanceof Think\Model\ViewModel,
			'Banner' instanceof Admin\Model\BannerModel,
			'Sort' instanceof Admin\Model\SortModel,
			'Menu' instanceof Admin\Model\MenuModel,
			'Adv' instanceof Think\Model\AdvModel,
			'Basic' instanceof Admin\Model\BasicModel,
			'Upload' instanceof Admin\Model\UploadModel,
			'Link' instanceof Admin\Model\LinkModel,
			'Relation' instanceof Think\Model\RelationModel,
			'User' instanceof Admin\Model\UserModel,
			'Merge' instanceof Think\Model\MergeModel,
		],
	];
}