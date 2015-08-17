<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Card'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="cards index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('end_date') ?></th>
            <th><?= $this->Paginator->sort('goal') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th><?= $this->Paginator->sort('customer_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($cards as $card): ?>
        <tr>
            <td><?= $this->Number->format($card->id) ?></td>
            <td>
                <?= $card->has('user') ? $this->Html->link($card->user->name, ['controller' => 'Users', 'action' => 'view', $card->user->id]) : '' ?>
            </td>
            <td><?= h($card->end_date) ?></td>
            <td><?= h($card->goal) ?></td>
            <td><?= h($card->created) ?></td>
            <td><?= h($card->modified) ?></td>
            <td>
                <?= $card->has('customer') ? $this->Html->link($card->customer->name, ['controller' => 'Customers', 'action' => 'view', $card->customer->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $card->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $card->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
