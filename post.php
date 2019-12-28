<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<section class="posts" class="post-single">
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
</span>
</a>
</span>
					<span class="post-meta">
						<span>分类: </span>
						<a href="" itemprop="url" rel="index">
							<span itemprop="name"><?php $this->category(','); ?></span>
						</a>
                    </span>
                </div>
            </header>
            <div class="post-body" itemprop="articleBody">
                <?php $this->content(); ?>
            </div>
    </article>
    <ul class="pagination">
    	<?php thePrev($this); ?>
    	<?php theNext($this); ?>
    </ul>
</section>
<?php $this->need('comments.php'); ?>
</div>
</main>

<?php $this->need('footer.php'); ?>