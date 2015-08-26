<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;
use Datetime;
/**
 * Cards Controller
 *
 * @property \App\Model\Table\CardsTable $Cards
 */
class CardsController extends AppController
{
    public function index()
    {
        $customer = $this->Cards->Customers->get(1);

        $card = $this->Cards->find('all', [
            'fields' => [
                'goal',
                'obs',
                'id',
                'end_date',
                'user_id'
            ],
            'conditions' => [
                'customer_id' => $customer->id,
                'end_date >' => (new Datetime)->format('Y-m-d H:i:s')
            ],
            'contain' => [
                'Users' => function($q){
                    return $q
                        ->select(['id', 'name']);
                },
                'Exercises' => function($q){
                    return $q
                        ->select(['card_id', 'name', 'exercise_column']);
                }
            ]
        ])->first();

        if ($card) {
            $exercises = $card->exercises;
            unset($card->exercises);
            $exercises = (new Collection($exercises))->groupBy('exercise_column');

            $card->exercises = $exercises;
        }

        $this->set(compact('card'));
        $this->set('_serialize', ['card']);
    }
}
