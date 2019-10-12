<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
$EnableCDN = new Typecho_Widget_Helper_Form_Element_Text('EnableCDN', NULL, NULL, _t('CDN静态文件'), _t('如果需要用CDN加速静态文件，请填上你的CDN地址，不填代表关闭，请不要以/结尾'));
$form->addInput($EnableCDN);	
$StaticOptimize = new Typecho_Widget_Helper_Form_Element_Checkbox('StaticOptimize',
				  array(
				  	'_isJSDelivr' => '是否开启jsDelivr优化(若启用CDN,仍会从jsDelivr加载部分静态文件)',
				  	'_isPreload'  => '是否开启静态Preload优化'
				  ),
				  null,
				  _t('静态优化')
				);
$form->addInput($StaticOptimize);
}

/**
* 显示下一篇
*
* @access public
* @param string $default 如果没有下一篇,显示的默认文字
* @return void
*/
function theNext($widget, $default = NULL)
{
	$db = Typecho_Db::get();
	$sql = $db->select()->from('table.contents')
			->where('table.contents.created > ?', $widget->created)
			->where('table.contents.status = ?', 'publish')
			->where('table.contents.type = ?', $widget->type)
			->where('table.contents.password IS NULL')
			->order('table.contents.created', Typecho_Db::SORT_ASC)
			->limit(1);
	$content = $db->fetchRow($sql);

	if ($content) {
		$content = $widget->filter($content);
		$link = '<li class="page-item page-next"><a href="' . $content['permalink'] . '" title="' . $content['title'] . '"><div class="page-item-subtitle">下一篇</div><div class="page-item-title h5">'.$content['title'].'</div></a></li>';
		echo $link;
		} else {
		echo $default;
	}
}

/**
* 显示上一篇
*
* @access public
* @param string $default 如果没有下一篇,显示的默认文字
* @return void
*/
function thePrev($widget, $default = NULL)
{
	$db = Typecho_Db::get();
	$sql = $db->select()->from('table.contents')
			->where('table.contents.created < ?', $widget->created)
			->where('table.contents.status = ?', 'publish')
			->where('table.contents.type = ?', $widget->type)
			->where('table.contents.password IS NULL')
			->order('table.contents.created', Typecho_Db::SORT_DESC)
			->limit(1);
	$content = $db->fetchRow($sql);
	if ($content) {
		$content = $widget->filter($content);
		$link = '<li class="page-item page-prev"><a href="' . $content['permalink'] . '" title="' . $content['title'] . '"><div class="page-item-subtitle">上一篇</div><div class="page-item-title h5">'.$content['title'].'</div></a></li>';
		echo $link;
	} else {
		echo $default;
	}
}
?>
