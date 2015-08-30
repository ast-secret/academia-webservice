<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suggestions Controller
 *
 * @property \App\Model\Table\SuggestionsTable $Suggestions
 */
class SuggestionsController extends AppController
{
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userId = $this->Auth->user('id');

        $suggestion = $this->Suggestions->newEntity();
        if ($this->request->is('post')) {

            $this->request->data['customer_id'] = $userId;

            $suggestion = $this->Suggestions->patchEntity($suggestion, $this->request->data);
            if ($this->Suggestions->save($suggestion)) {
                $message = "A sugestão foi salva.";
            } else {
                $message = "A mensagem não pode ser salva.";
            }
        }

        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
}
