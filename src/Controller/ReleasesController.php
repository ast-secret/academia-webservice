<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Releases Controller
 *
 * @property \App\Model\Table\ReleasesTable $Releases
 */
class ReleasesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $gymId = 1;

        $releases = $this->Releases->find('all', [
            'conditions' => [
                'Releases.is_active' => true
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
        $this->set('releases', $releases);
        $this->set('_serialize', ['releases']);
    }
}