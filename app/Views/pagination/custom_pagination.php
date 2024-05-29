<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php if ($pager): ?>
            <?php $pagi_path = $pager->links(); ?>
            <?php foreach ($pagi_path as $link): ?>
                <li class="<?= $link['active'] ? 'active' : '' ?>">
                    <a href="<?= $link['uri'] ?>">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>
        <?php endif ?>
    </ul>
</nav>
