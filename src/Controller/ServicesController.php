<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Collection\Collection;
use Cake\Event\Event;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 */
class ServicesController extends AppController
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

        $services = $this->Services->find('all', [
            'fields' => [
                'Services.id',
                'Services.name',
                'Services.duration',
                'Services.description',
                'Services.gasto_calorico',
            ],
            'conditions' => [
                'Services.is_active' => true,
                'Services.gym_id' => $gymId
            ],
            'contain' => [
                'Times' => function($q){
                    return $q->select(['service_id', 'weekday', 'start_hour']);
                }
            ],
            'limit' => 20,
            'order' => ['Services.name' => 'DESC']
        ]);

        $services = $services->map(function($value){
            $value->times = (new Collection($value->times))->groupBy('weekday');
            return $value;
        });

        $this->set('services', $services);
        $this->set('_serialize', ['services']);
    }
}
