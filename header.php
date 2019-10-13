<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<!DOCTYPE html>
<html lang="zh-hans">
<head>
	<meta charset="<?php $this->options->charset(); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="<?php $this->options->description() ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>


    <?php if (!empty($this->options->StaticOptimize)): ?>
    		<?php if (in_array('_isPreload', $this->options->StaticOptimize) && !in_array('_isJSDelivr', $this->options->StaticOptimize)): ?>
    				<?php if (!empty($this->options->EnableCDN)): ?>
						<link rel="preload" href="<?php $this->options->EnableCDN . '/static/css/normalize.css' ?>" as="style">
    					<link rel="preload" href="<?php $this->options->EnableCDN . '/static/css/spectre.css' ?>" as="style">
    					<link rel="preload" href="<?php $this->options->EnableCDN . '/static/css/main.css' ?>" as="style">
    					<link rel="preload" href="<?php $this->options->EnableCDN . '/static/css/friends.css' ?>" as="style">
    					<link rel="preload" href="<?php $this->options->EnableCDN . '/static/css/syntax.css' ?>" as="style">
    				<?php else: ?>
    		    		<link rel="preload" href="<?php $this->options->themeUrl('static/css/normalize.css'); ?>" as="style">
    					<link rel="preload" href="<?php $this->options->themeUrl('static/css/spectre.css'); ?>" as="style">
    					<link rel="preload" href="<?php $this->options->themeUrl('static/css/main.css'); ?>" as="style">
    					<link rel="preload" href="<?php $this->options->themeUrl('static/css/friends.css'); ?>" as="style">
    					<link rel="preload" href="<?php $this->options->themeUrl('static/css/syntax.css'); ?>" as="style">
    				<?php endif; ?>
    		<?php endif; ?>
    		<?php if (in_array('_isJSDelivr', $this->options->StaticOptimize)): ?>
    			<?php if (in_array('_isPreload', $this->options->StaticOptimize)): ?>
    		    	<link rel="preload" href="//cdn.jsdelivr.net/npm/normalize.css" as="style">
    				<link rel="preload" href="//cdn.jsdelivr.net/npm/spectre.css" as="style">
    			<?php endif; ?>
    		    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/normalize.css">
    			<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/spectre.css">
    		<?php endif; ?>
    <?php else: ?>
    		<link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/normalize.css'); ?>">
    		<link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/spectre.css'); ?>">
    <?php endif; ?>

    <?php if (!empty($this->options->EnableCDN)): ?>
    	<?php if (empty($this->options->StaticOptimize) || !in_array('_isJSDelivr', $this->options->StaticOptimize)): ?>
			<link rel="stylesheet" href="<?php $this->options->EnableCDN . '/static/css/normalize.css' ?>">
    		<link rel="stylesheet" href="<?php $this->options->EnableCDN . '/static/css/spectre.css' ?>">
    	<?php endif; ?>
    	<link rel="stylesheet" href="<?php $this->options->EnableCDN . '/static/css/main.css' ?>">
    	<link rel="stylesheet" href="<?php $this->options->EnableCDN . '/static/css/friends.css' ?>">
    	<link rel="stylesheet" href="<?php $this->options->EnableCDN . '/static/css/syntax.css' ?>">
	<?php else: ?>
    	<link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/syntax.css'); ?>">
    	<link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/main.css'); ?>">
   		<link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/friends.css'); ?>">
    <?php endif; ?>


    <?php $this->header(); ?>
</head>
<body>
<header id="page-header">
	<div class="container grid-lg">
		<a href="<?php $this->options->siteUrl(); ?>" class="title"><?php $this->options->title() ?></a>
		<h2 class="description"><?php $this->options->description() ?></h2>
		<div>
			<nav id="nav-menu" role="navigation">
				<a<?php if($this->is('index')): ?> class="actived"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
				<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <a<?php if($this->is('page', $pages->slug)): ?> class="actived"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
			</nav>
		</div>
	</div>
</header>
<main>
	<div class="container grid-lg">
		