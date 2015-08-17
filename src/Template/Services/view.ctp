<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gyms'), ['controller' => 'Gyms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gym'), ['controller' => 'Gyms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Times'), ['controller' => 'Times', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Time'), ['controller' => 'Times', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="services view large-10 medium-9 columns">
    <h2><?= h($service->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Gym') ?></h6>
            <p><?= $service->has('gym') ? $this->Html->link($service->gym->name, ['controller' => 'Gyms', 'action' => 'view', $service->gym->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($service->name) ?></p>
            <h6 class="subheader"><?= __('Description') ?></h6>
            <p><?= h($service->description) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($service->id) ?></p>
            <h6 class="subheader"><?= __('Duration') ?></h6>
            <p><?= $this->Number->format($service->duration) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($service->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($service->modified) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Is Active') ?></h6>
            <p><?= $service->is_active ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Times') ?></h4>
    <?php if (!empty($service->times)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Weekday') ?></th>
            <th><?= __('Service Id') ?></th>
            <th><?= __('Start Hour') ?></th>
            <th><?= __('Created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($service->times as $times): ?>
        <tr>
            <td><?= h($times->id) ?></td>
            <td><?= h($times->weekday) ?></td>
            <td><?= h($times->service_id) ?></td>
            <td><?= h($times->start_hour) ?></td>
            <td><?= h($times->created) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Times', 'action' => 'view', $times->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Times', 'action' => 'edit', $times->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Times', 'action' => 'delete', $times->id], ['confirm' => __('Are you sure you want to delete # {0}?', $times->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
