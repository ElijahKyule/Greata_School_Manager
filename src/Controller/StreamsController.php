<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Streams Controller
 *
 * @property \App\Model\Table\StreamsTable $Streams
 * @method \App\Model\Entity\Stream[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StreamsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $streams = $this->paginate($this->Streams);

        $this->set(compact('streams'));
    }

    /**
     * View method
     *
     * @param string|null $id Stream id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stream = $this->Streams->get($id, [
            'contain' => ['Classrooms'=>['Levels', 'Streams', 'Users']],
        ]);

        $this->set(compact('stream'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stream = $this->Streams->newEmptyEntity();
        if ($this->request->is('post')) {
            $stream = $this->Streams->patchEntity($stream, $this->request->getData());
            if ($this->Streams->save($stream)) {
                $this->Flash->success(__('The stream has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stream could not be saved. Please, try again.'));
        }
        $this->set(compact('stream'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stream id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stream = $this->Streams->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stream = $this->Streams->patchEntity($stream, $this->request->getData());
            if ($this->Streams->save($stream)) {
                $this->Flash->success(__('The stream has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stream could not be saved. Please, try again.'));
        }
        $this->set(compact('stream'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stream id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stream = $this->Streams->get($id);
        if ($this->Streams->delete($stream)) {
            $this->Flash->success(__('The stream has been deleted.'));
        } else {
            $this->Flash->error(__('The stream could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
