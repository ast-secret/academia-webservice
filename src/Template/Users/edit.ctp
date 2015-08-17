<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Gyms'), ['controller' => 'Gyms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gym'), ['controller' => 'Gyms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Releases'), ['controller' => 'Releases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Release'), ['controller' => 'Releases', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('gym_id', ['options' => $gyms]);
            echo $this->Form->input('role_id', ['options' => $roles]);
            echo $this->Form->input('name');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('is_active');
            echo $this->Form->input('mail_temp');
            echo $this->Form->input('token_mail');
            echo $this->Form->input('token_time_exp');
            echo $this->Form->input('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
