<?php
/**
 * 原主题为Indexyz大佬的Hexo博客，被一位叫Zare的菜鸟移植到Typecho中
 * 
 * @package Indexyz
 * @author Zare(Typecho Version)
 * @version 0.1 Beta
 * @link https://xxxx.gs
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
?>
<section class="posts">
	<?php while($this->next()): ?>
        <article class="post post-type-normal " itemscope itemtype="http://schema.org/Article">
            <header>
                <h2 class="post-title" itemprop="name headline">
                    <a itemprop="url" title="<?php $this->title() ?>" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                </h2>
                <div class="post-meta-list">
                    <span class="post-meta">
    					<span>时间: </span>
   						<time datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date('Y-m-d'); ?></time>
					</span>
<span class="post-meta">
<span>作者: </span>
<a href="<?php $this->author->permalink(); ?>" itemprop="url" rel="index">
							<span itemprop="name"><?php $this->author(); ?>
</a>

</span>
   						
					</span>
					<span class="post-meta">
						<span>分类: </span>
						<a href="" itemprop="url" rel="index">
							<span itemprop="name"><?php $this->category(','); ?></span>
						</a>
                    	
                </div>
            </header>
            <div class="post-body" itemprop="articleBody">
               <p> <?php $this->excerpt(70, ''); ?></p>
            </div>
                <div class="post-more-link">
                    <a class="btn" href="<?php $this->permalink() ?>" title="<?php $this->title() ?>" rel="contents">
                       阅读更多
                    </a>
                </div>
        </article>
    <?php endwhile; ?>
</section>
<nav class="pagination-wapper">
	 <?php $this->pageNav('', '后一页 »',5,'...',array('wrapTag' => 'ul', 'wrapClass' => 'pagination','itemTag' => 'li','itemClass' => 'page-item','textTag' => 'span','currentClass' => 'page-item active','nextClass' => 'page-item')); ?>
</nav>
</div>

</main>

<?php $this->need('footer.php'); ?>