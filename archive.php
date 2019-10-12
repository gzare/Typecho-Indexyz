<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


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
						<span>分类: </span>
						<a href="<?php $this->category(',')->permalink(); ?>" itemprop="url" rel="index">
							<span itemprop="name"><?php $this->category(','); ?></span>
						</a>
                    	
                </div>
            </header>
            <div class="post-body" itemprop="articleBody">
                <?php $this->excerpt(70, ''); ?>
            </div>
                <div class="post-more-link">
                    <a class="btn" href="<?php $this->permalink() ?>" title="<?php $this->title() ?>" rel="contents">
                        <?php $this->content('阅读更多'); ?>
                    </a>
                </div>
        </article>
    <?php endwhile; ?>
</section>
<nav class="pagination-wapper">
	 <?php $this->pageNav('', '后一页 »',5,'...',array('wrapTag' => 'ul', 'wrapClass' => 'pagination','itemTag' => 'li','itemClass'=>'page-item','textTag' => 'span','currentClass' => 'actived')); ?>
</nav>
</div>

</main>

<?php $this->need('footer.php'); ?>