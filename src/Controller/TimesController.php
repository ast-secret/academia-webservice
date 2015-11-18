<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Collection\Collection;
use Cake\Event\Event;

/**
 * Times Controller
 *
 * @property \App\Model\Table\TimesTable $Times
 */
class TimesController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('index');
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $gymId = (int)$this->request->query('gym_id');

        $times = $this->Times->find('all', [
            'order' => 'Times.start_hour',
            'contain' => [
                'Services' => function($q) use ($gymId){
                    return $q
                        ->select(['id', 'name', 'duration', 'gasto_calorico'])
                        ->where(['gym_id' => $gymId, 'is_active' => true]);
                }
            ],
        ]);

        $times = $times->groupBy('weekday');

        $this->set(compact('times'));
        $this->set('_serialize', ['times']);
    }
}
