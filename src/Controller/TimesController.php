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

        $times = $this->Times->find('all', [
            'contain' => [
                'Services' => function($q){
                    return $q->where(['gym_id' => 1, 'is_active' => true]);
                }
            ],
            //'order' => ['Times.weekday', 'Times.start_hour']
        ]);

        $times = $times->groupBy('weekday');

        $this->set('times', $times);
        $this->set('_serialize', ['times']);
    }
}
