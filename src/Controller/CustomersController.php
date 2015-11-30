<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;

use Firebase\JWT\JWT;

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
        $customer = $this->Customers->find('all', [
            'fields' => [
                'id',
                'email',
                'name',
                'password'
            ],
            'conditions' => [
                'email' => $this->request->data('email'),
                'gym_id' => $this->request->query('gym_id'), //GYM_ID vem por querystring
                'deleted' => false,
                'is_active' => true
            ]
        ])
        ->first();

        if (!$customer || !(new DefaultPasswordHasher)->check($this->request->data('password'), $customer->password)) {
            throw new UnauthorizedException('Invalid username or password');
        }

        $customer->sub = $customer->id;
        unset($customer->password);

        $this->set([
            'message' => [
                'user' => ['name' => $customer->name],
                'token' => JWT::encode($customer->toArray(), Security::salt())
            ]
        ]);
        $this->set('_serialize', ['message']);
    }

    public function changePassword()
    {
        $idCustomer = $this->Auth->user('id');

        $customer = $this->Customers->get($idCustomer);

        if ($this->request->data('password') != $this->request->data('confirm_new_password')) {
          throw new BadRequestException("Você não confirmou a sua nova senha corretamente");

        }
        if (!(new DefaultPasswordHasher)->check($this->request->data('current_password'), $customer->password)) {
          throw new BadRequestException("Você não confirmou a sua senha atual corretamente");

        }
        $customer = $this->Customers->patchEntity($customer,
          $this->request->data,
          ['fieldList' => ['password']]
        );

        if (!$this->Customers->save($customer)) {
          throw new BadRequestException("Ocorreu um erro ao alterar a sua senha");

        }
        $this->set(['message' => 'Senha alterada', 'code' => 200]);
        $this->set('_serialize', ['message',' code']);
    }
}
