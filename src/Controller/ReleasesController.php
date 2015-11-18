<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Collection\Collection;
use Cake\Event\Event;

/**
 * Releases Controller
 *
 * @property \App\Model\Table\ReleasesTable $Releases
 */
class ReleasesController extends AppController
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

        $releases = $this->Releases->find('all', [
            'fields' => [
                'Releases.title',
                'Releases.text',
                'Releases.destaque',
                'Releases.created',
            ],
            'conditions' => [
                'Releases.is_active' => true,
            ],
            'contain' => [
                'Users' => function($q) use ($gymId){
                    return $q
                        ->where(['Users.gym_id' => $gymId]);
                }
            ],
            'limit' => 20,
            'order' => ['Releases.created' => 'DESC']
        ]);

        $releasesByDestaque = $releases->groupBy('destaque');

        $this->set(compact('releasesByDestaque'));
        $this->set('_serialize', ['releasesByDestaque']);
    }
}
