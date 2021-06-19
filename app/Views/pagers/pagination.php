<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-start">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                    <span aria-hidden="true"><i class="material-icons md-chevron_left"></i></span>
                </a>
            </li>
        <?php endif ?>
 
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active"' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>
 
        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <span aria-hidden="true"><i class="material-icons md-chevron_right"></i></span>
                </a>
            </li>
            
        <?php endif ?>
    </ul>
</nav>



<!-- <nav aria-label="Page navigation example">
	<ul class="pagination justify-content-start">
		<li class="page-item active"><a class="page-link" href="#">01</a></li>
		<li class="page-item"><a class="page-link" href="#">02</a></li>
		<li class="page-item"><a class="page-link" href="#">03</a></li>
		<li class="page-item"><a class="page-link dot" href="#">...</a></li>
		<li class="page-item"><a class="page-link" href="#">16</a></li>
		<li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
	</ul>
</nav> -->