<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Cake\Network\Exception\BadRequestException;
use JWT;

use Cake\Auth\DefaultPasswordHasher;

use Exception;

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
        $customerUpdate = $this->Customers->patchEntity($customerUpdate,
          $this->request->data,
          ['fieldList' => ['platform', 'push_reg_id']]
        );

        if (!$this->Customers->save($customerUpdate)) {
            throw new Exception(json_encode($customerUpdate->errors()));
        }

        $this->set([
            'message' => [
                'user' => ['name' => $customerUpdate->name],
                'token' => JWT::encode($customerUpdate, Security::salt())
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
