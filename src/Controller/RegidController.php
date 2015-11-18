<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Regid Controller
 *
 * @property \App\Model\Table\RegidTable $Regid
 */
class RegidController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('regid', $this->paginate($this->Regid));
        $this->set('_serialize', ['regid']);
    }

    /**
     * View method
     *
     * @param string|null $id Regid id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $regid = $this->Regid->get($id, [
            'contain' => []
        ]);
        $this->set('regid', $regid);
        $this->set('_serialize', ['regid']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $regid = $this->Regid->newEntity();
        if ($this->request->is('post')) {
            $regid = $this->Regid->patchEntity($regid, $this->request->data);
            if ($this->Regid->save($regid)) {
                $this->Flash->success(__('The regid has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The regid could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('regid'));
        $this->set('_serialize', ['regid']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Regid id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $regid = $this->Regid->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $regid = $this->Regid->patchEntity($regid, $this->request->data);
            if ($this->Regid->save($regid)) {
                $this->Flash->success(__('The regid has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The regid could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('regid'));
        $this->set('_serialize', ['regid']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Regid id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $regid = $this->Regid->get($id);
        if ($this->Regid->delete($regid)) {
            $this->Flash->success(__('The regid has been deleted.'));
        } else {
            $this->Flash->error(__('The regid could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
