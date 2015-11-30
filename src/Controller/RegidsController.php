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
class RegIdsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow(['add']);
        echo 'agulha';
        print_r($this->Auth->user());
        exit();
    }

    public function add()
    {
        echo 'aqui';
        print_r($this->Auth->user());
        exit();
        $message = ['message' => 'Erro', 'code' => 400];

        if ($this->request->is('post')) {
            /**
             * Recebe o ID que está na JWT.. caso ele nao esteja logado nao tem
             * problema vai como null mesmo e é considero um "device deslogado"
             * Lembrando que um device(uuid) só pode estar logado com um user de cada vez
             * logo como usamos na conditions o uuid ele vai sobreescrever o customer_id,
             * tb nao tem problema pois a logica é essa, seria como uma nova pessoa logando
             * com outro id no mesmo device.
             */
            $this->request->data['customer_id'] = $this->Auth->user('id');

            $regid = $this->RegIds->find('all', [
                'fields' => [
                    'RegIds.id',
                    'RegIds.device_regid',
                    'RegIds.customer_id'
                ],
                'conditions' => [
                    'RegIds.device_uuid' => $this->request->data('device_uuid'),
                    'RegIds.platform' => $this->request->data('platform'),
                    'RegIds.gym_id' => $this->request->data('gym_id'),
                ]
            ])
            ->first();

            if (!$regid) {
                $regid = $this->RegIds->newEntity();
                $regid = $this->RegIds->patchEntity($regid, $this->request->data);

                if ($this->RegIds->save($regid)) {
                    /**
                     * O código 'pixuleco' existe para pegarmos no retorno e termos certeza
                     * que o regid foi caso, caso contrario somente contando com o retorno 
                     * 200, as vezes pode dar erro mas retornar 200, e o app acharia que foi salvo
                     * e nao salvaria nunca mais, ou seja, o app nunca iria receber 
                     * a notificação, oq é uma coisa muito séria
                     */
                    $message = ['message' => 'pixuleco', 'code' => 200];    
                }
            } else {
                if ($regid->device_regid != $this->request->data('revice_regid')
                        ||
                    $regid->customer_id != $this->request->data('customer_id')) {
                    
                    $regid = $this->RegIds->patchEntity($regid, [
                        'device_regid' => $this->request->data('device_regid'),
                        'customer_id' => $this->request->data('customer_id')
                    ]);
                    if ($this->RegIds->save($regid)) {
                        /**
                         * O código 'pixuleco' existe para pegarmos no retorno e termos certeza
                         * que o regid foi caso, caso contrario somente contando com o retorno 
                         * 200, as vezes pode dar erro mas retornar 200, e o app acharia que foi salvo
                         * e nao salvaria nunca mais, ou seja, o app nunca iria receber 
                         * a notificação, oq é uma coisa muito séria
                         */
                        $message = ['message' => 'pixuleco', 'code' => 200];    
                    }
                }
                $message = ['message' => 'pixuleco', 'code' => 200];
            }
        } else {
            $message = ['message' => 'Não permitido', 'code' => 400];
        }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
}
