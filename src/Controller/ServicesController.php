<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Collection\Collection;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 */
class ServicesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $gymId = 1;

        $releases = $this->Services->find('all', [
            'fields' => [
                'Services.id',
                'Services.name',
                'Services.duration',
                'Services.description'
            ],
            'conditions' => [
                'Services.is_active' => true
            ],
            'contain' => [
                'Times' => function($q){
                    return $q->select(['service_id', 'weekday', 'start_hour']);
                }
            ],
            'limit' => 20,
            'order' => ['Services.name' => 'DESC']
        ]);

        $releases = $releases->map(function($value){
            $value->times = (new Collection($value->times))->groupBy('weekday');
            return $value;
        });

        $this->set('releases', $releases);
        $this->set('_serialize', ['releases']);
    }
}
