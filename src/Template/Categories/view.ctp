<nav class="large-3 medium-4 columns" id="actions-sidebar">
        <h4><?= __('Related Jobs') ?></h4>
        <?php if (!empty($category->jobs)): ?>
            <?php foreach ($category->jobs as $job): ?>
                <ul id="listings">
                <li>
                       <!-- 
                    <div class="type">
                        
                       <span style="background:<?= $job->type->color; ?>"><?=$job->type->name; ?></span>
                    </div>-->
                    <div class="description">
                        <h5><?= h($job->title) ?> (<?= h($job->city).",".h($job->state) ?>)</h5>
                        <?= h($job->created->nice()) ?><br>
                        <?= h($this->Text->truncate($job->description,250,array('ellipsis' => '...','exact' => false))) ?>
                        <a><i class="fa fa-plus"></i><?= $this->Html->link(__('Read More'), ['action' => 'browse', $job->id]) ?></a>
                    </div>
                </li>
            </ul>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
