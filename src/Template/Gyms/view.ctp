<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Gym'), ['action' => 'edit', $gym->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gym'), ['action' => 'delete', $gym->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gym->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gyms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gym'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Machines'), ['controller' => 'Machines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Machine'), ['controller' => 'Machines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suggestions'), ['controller' => 'Suggestions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suggestion'), ['controller' => 'Suggestions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="gyms view large-10 medium-9 columns">
    <h2><?= h($gym->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($gym->name) ?></p>
            <h6 class="subheader"><?= __('Description') ?></h6>
            <p><?= h($gym->description) ?></p>
            <h6 class="subheader"><?= __('Address') ?></h6>
            <p><?= h($gym->address) ?></p>
            <h6 class="subheader"><?= __('Cover Img') ?></h6>
            <p><?= h($gym->cover_img) ?></p>
            <h6 class="subheader"><?= __('Logo Img') ?></h6>
            <p><?= h($gym->logo_img) ?></p>
            <h6 class="subheader"><?= __('Slug') ?></h6>
            <p><?= h($gym->slug) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($gym->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($gym->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($gym->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Customers') ?></h4>
    <?php if (!empty($gym->customers)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Registration') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Is Active') ?></th>
            <th><?= __('App Access Token') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th><?= __('Gym Id') ?></th>
            <th><?= __('Email') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($gym->customers as $customers): ?>
        <tr>
            <td><?= h($customers->id) ?></td>
            <td><?= h($customers->name) ?></td>
            <td><?= h($customers->registration) ?></td>
            <td><?= h($customers->password) ?></td>
            <td><?= h($customers->is_active) ?></td>
            <td><?= h($customers->app_access_token) ?></td>
            <td><?= h($customers->created) ?></td>
            <td><?= h($customers->modified) ?></td>
            <td><?= h($customers->gym_id) ?></td>
            <td><?= h($customers->email) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Machines') ?></h4>
    <?php if (!empty($gym->machines)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Gym Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($gym->machines as $machines): ?>
        <tr>
            <td><?= h($machines->id) ?></td>
            <td><?= h($machines->gym_id) ?></td>
            <td><?= h($machines->name) ?></td>
            <td><?= h($machines->created) ?></td>
            <td><?= h($machines->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Machines', 'action' => 'view', $machines->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Machines', 'action' => 'edit', $machines->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Machines', 'action' => 'delete', $machines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machines->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Phones') ?></h4>
    <?php if (!empty($gym->phones)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Gym Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Phone') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($gym->phones as $phones): ?>
        <tr>
            <td><?= h($phones->id) ?></td>
            <td><?= h($phones->gym_id) ?></td>
            <td><?= h($phones->name) ?></td>
            <td><?= h($phones->phone) ?></td>
            <td><?= h($phones->created) ?></td>
            <td><?= h($phones->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Phones', 'action' => 'view', $phones->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Phones', 'action' => 'edit', $phones->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Phones', 'action' => 'delete', $phones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phones->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Rooms') ?></h4>
    <?php if (!empty($gym->rooms)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Gym Id') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($gym->rooms as $rooms): ?>
        <tr>
            <td><?= h($rooms->id) ?></td>
            <td><?= h($rooms->name) ?></td>
            <td><?= h($rooms->gym_id) ?></td>
            <td><?= h($rooms->description) ?></td>
            <td><?= h($rooms->created) ?></td>
            <td><?= h($rooms->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Rooms', 'action' => 'view', $rooms->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Rooms', 'action' => 'edit', $rooms->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rooms', 'action' => 'delete', $rooms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rooms->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Services') ?></h4>
    <?php if (!empty($gym->services)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Gym Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Is Active') ?></th>
            <th><?= __('Duration') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($gym->services as $services): ?>
        <tr>
            <td><?= h($services->id) ?></td>
            <td><?= h($services->gym_id) ?></td>
            <td><?= h($services->name) ?></td>
            <td><?= h($services->description) ?></td>
            <td><?= h($services->is_active) ?></td>
            <td><?= h($services->duration) ?></td>
            <td><?= h($services->created) ?></td>
            <td><?= h($services->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Services', 'action' => 'view', $services->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Services', 'action' => 'edit', $services->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Services', 'action' => 'delete', $services->id], ['confirm' => __('Are you sure you want to delete # {0}?', $services->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Suggestions') ?></h4>
    <?php if (!empty($gym->suggestions)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Text') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th><?= __('Is Read') ?></th>
            <th><?= __('Is Star') ?></th>
            <th><?= __('Gym Id') ?></th>
            <th><?= __('Customer Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($gym->suggestions as $suggestions): ?>
        <tr>
            <td><?= h($suggestions->id) ?></td>
            <td><?= h($suggestions->text) ?></td>
            <td><?= h($suggestions->created) ?></td>
            <td><?= h($suggestions->modified) ?></td>
            <td><?= h($suggestions->is_read) ?></td>
            <td><?= h($suggestions->is_star) ?></td>
            <td><?= h($suggestions->gym_id) ?></td>
            <td><?= h($suggestions->customer_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Suggestions', 'action' => 'view', $suggestions->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Suggestions', 'action' => 'edit', $suggestions->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Suggestions', 'action' => 'delete', $suggestions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suggestions->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($gym->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Gym Id') ?></th>
            <th><?= __('Role Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Username') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th><?= __('Is Active') ?></th>
            <th><?= __('Mail Temp') ?></th>
            <th><?= __('Token Mail') ?></th>
            <th><?= __('Token Time Exp') ?></th>
            <th><?= __('Deleted') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($gym->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->gym_id) ?></td>
            <td><?= h($users->role_id) ?></td>
            <td><?= h($users->name) ?></td>
            <td><?= h($users->username) ?></td>
            <td><?= h($users->password) ?></td>
            <td><?= h($users->created) ?></td>
            <td><?= h($users->modified) ?></td>
            <td><?= h($users->is_active) ?></td>
            <td><?= h($users->mail_temp) ?></td>
            <td><?= h($users->token_mail) ?></td>
            <td><?= h($users->token_time_exp) ?></td>
            <td><?= h($users->deleted) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
