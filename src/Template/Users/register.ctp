<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Create an Account') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('email');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('confirm_password',['type'=>'password']);
            echo $this->Form->input('role',['type'=>'select','options'=>['Employer'=>'Employer','Job Seeker'=>'Job Seeker'],'empty'=>'Select Role']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
