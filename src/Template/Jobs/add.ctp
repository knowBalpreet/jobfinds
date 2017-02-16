<div class="jobs form large-9 medium-8 columns content">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Add Job Listing') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('company_name');
            echo $this->Form->input('category_id', ['options' => $categories,'empty' => 'Select Category']);
            echo $this->Form->input('type_id', ['options' => $types,'empty' => 'Select Type']);
            echo $this->Form->input('description');
            echo $this->Form->input('city');
            echo $this->Form->input('state');
            echo $this->Form->input('contact_email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add Job')) ?>
    <?= $this->Form->end() ?>
</div>
