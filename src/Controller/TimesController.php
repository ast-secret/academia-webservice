<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Collection\Collection;
use Cake\Event\Event;       

use Cake\Network\Exception\UnauthorizedException;

/**
 * Times Controller
 *
 * @property \App\Model\Table\TimesTable $Times
 */
class TimesController extends AppController
{

    // public function beforeFilter(Event $event)
    // {
    //     parent::beforeFilter($event);
    //     $this->Auth->allow(['index']);
    // }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $user = $this->Auth->user();
        $times = $this->Times->find('all', [
            'contain' => [
                'Services' => function($q){
                    return $q
                        ->select(['id', 'name'])
                        ->where(['gym_id' => 1, 'is_active' => true]);
                }
            ],
        ]);

        $times = $times->groupBy('weekday');

        $this->set(compact('times'));
        $this->set('_serialize', ['times']);
    }
}
