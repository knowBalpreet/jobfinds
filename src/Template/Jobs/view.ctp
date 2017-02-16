<?php if ($this->request->session()->read('Auth.User')['id'] == $job->user_id) {?>
    
<ul class="button-bar" style="float: right;">
    <li><?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id]) ?></li> | 
    <li><?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->title)]) ?></li> 
</ul>
<?php } ?>

<?php   if ($job) {    ?>
        <div class="jobs view large-9 medium-8 columns content">
            <h3><?php echo $job->title; ?></h3>
            <ul>
                <li><strong>Company Name:</strong><?php echo $job->company_name; ?></li>
                <li><strong>Location:</strong><?php echo $job->city." , ".$job->state; ?></li>
                <li><strong>Job Type:</strong><?php echo $job->type->name; ?></li>
                <li><strong>Description:</strong><?php echo $job->description; ?></li>
                <br><br>
                <li><strong>Posted On:</strong><?php echo $job->created->nice(); ?></li>

                <li><strong>Contact Email: </strong><a href="mailto:<?php echo $job->contact_email; ?>"><?php echo $job->contact_email; ?></a></li>
                <li><strong>Category:</strong><?= $job->has('category') ? $this->Html->link($job->category->name, ['controller' => 'Jobs', 'action' => 'browse', $job->category->id]) : '' ?></li>
                <p><a href="<?php echo $this->request->webroot; ?>jobs/browse">Back to Jobs</a></p>
            </ul>
        </div>
        <div class="clearfix"></div>
        <br><br><br>
        
</div>
        <?php   }else{
    echo "No Jobs Available";
    }    ?>

