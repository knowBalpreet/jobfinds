<?php echo $this->element('search'); ?>
<br>
<?php

	if ($this->request->here == '/projects/PHP/MVC-CakePhp/Project1-JobFinds/jobs/browse') {	?>
		<div id="category_block">
			<ul>
				
		<?php    foreach ($categories as $category) {   ?>
            <li><?= $this->Html->link(__($category->name), ['controller'=>'Jobs','action' => 'browse', $category->id]) ?></li>
    <?php    }      ?>
			</ul>
		</div>
<?php	}	?>
<br><br><br>
<div class="jobs index large-9 medium-8 columns content">
<h3>Latest Job Listings</h3>
  <?php foreach ($jobs as $job): ?>
			<ul id="listings">
				<li>
					<div class="type">
						
						<span style="background:<?= $job->type->color; ?>"><?=$job->type->name; ?></span>
					</div>
					<div class="description">
						<h5><?= h($job->title) ?> (<?= h($job->city).",".h($job->state) ?>)</h5>
						<?= h($job->created->nice()) ?><br>
						<?= h($this->Text->truncate($job->description,250,array('ellipsis' => '...','exact' => false))) ?>
						<a><i class="fa fa-plus"></i><?= $this->Html->link(__('Read More'), ['action' => 'view', $job->id]) ?></a>
					</div>
				</li>
			</ul>
  <?php endforeach; ?>

    <div class="paginator">
    	<center>
        <?php if ($this->Paginator->hasPage(2)) { ?>
        <ul class="button-bar">
            <?= $this->Paginator->prev() ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next() ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
        <?php	}	?>
    	</center>
    </div>
</div>
