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
        
        $user = $this->Auth->user();
        $times = $this->Times->find('all', [
            'contain' => [
                'Services' => function($q) use ($gymId){
                    return $q
                        ->select(['id', 'name'])
                        ->where(['gym_id' => $gymId, 'is_active' => true]);
                }
            ],
        ]);

        $times = $times->groupBy('weekday');

        $this->set(compact('times'));
        $this->set('_serialize', ['times']);
    }
}
