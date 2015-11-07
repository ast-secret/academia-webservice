<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Collection\Collection;

/**
 * Times Controller
 *
 * @property \App\Model\Table\TimesTable $Times
 */
class TimesController extends AppController
{
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $gymId = $this->Auth->user('gym_id');

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
