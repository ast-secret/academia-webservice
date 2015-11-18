<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Network\Exception\MethodNotAllowedException;

/**
 * Regids Controller
 *
 * @property \App\Model\Table\RegidsTable $Regids
 */
class RegidsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }

    public function add()
    {
        $message = ['message' => 'dsadas', 'code' => 400];
        if ($this->request->is('post')) {

            $regid = $this->Regids->find('all', [
                'fields' => [
                    'Regids.id'
                ],
                'conditions' => [
                    'Regids.uuid' => $this->request->data('uuid'),
                    'Regids.platform' => $this->request->data('platform'),
                    'Regids.gym_id' => $this->request->data('gym_id'),
                ]
            ])
            ->first();

            if (!$regid) {
                $regid = $this->Regids->newEntity();
                $regid = $this->Regids->patchEntity($regid, $this->request->data);

                if (!$this->Regids->save($regid)) {
                    $message = ['message' => 'Erro ao salvar', 'code' => 400];
                }
            } else {
                /**
                 * O código 1020 existe para pegarmos no retorno e termos certeza
                 * que o regid foi caso, caso contrario somente contando com o retorno 
                 * 200, as vezes pode dar erro mas retornar 200, e o app acharia que foi salvo
                 * e nao salvaria nunca mais, ou seja, o app nunca iria receber 
                 * a notificação, oq é uma coisa muito séria
                 */
                $message = ['message' => 'pixuleco', 'code' => 200];
            }
        } else {
            $message = ['message' => 'Não permitido', 'code' => 400];
        }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
}
