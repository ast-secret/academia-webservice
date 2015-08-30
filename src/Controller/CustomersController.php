<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Exception;
use JWT;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController
{
    public function BeforeFilter(Event $event)
    {
        parent::BeforeFilter($event);
        $this->Auth->allow(['add', 'createToken']);
    }

    public function add()
    {
        $message = '';

        $data = [
            'email' => 'jonas@gmail.com',
            'gym_id' => 1,
            'registration' => '123',
            'name' => 'Daniel Pedro',
            'password' => '123mudar',
            'is_active' => true
        ];
        $customer = $this->Customers->newEntity();
        $customer = $this->Customers->patchEntity($customer, $data);

        if (!$this->Customers->save($customer)) {
            $message = $customer->errors();
        }

        $token = JWT::encode(['id' => 1, 'exp' => time() + 609223], Security::salt());

        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
    public function createToken()
    {
        $customer = $this->Auth->identify();

        if (!$customer) {
            throw new UnauthorizedException('Invalid username or password');
        }
        $this->Auth->setUser($customer);
        
        $pushRegid = $this->request->data('push_reg_id');
        $platform = $this->request->data('platform');

        if (!$this->request->data('push_reg_id')) {
            throw new Exception("Você deve informar o push_reg_id");
        }

        $customerUpdate = $this->Customers->get($this->Auth->user('id'));
        $customerUpdate = $this->Customers->patchEntity($customerUpdate, $this->request->data);

        if (!$this->Customers->save($customerUpdate)) {
            throw new Exception("Ocorreu um erro ao efetuar o login");   
        }

        $this->set([
            'message' => [
                'user' => ['name' => $customerUpdate->name],
                'token' => JWT::encode($customerUpdate, Security::salt())
            ]
        ]);
        $this->set('_serialize', ['message']);
    }
}
