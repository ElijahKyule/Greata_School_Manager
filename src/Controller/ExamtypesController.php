<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Examtypes Controller
 *
 * @property \App\Model\Table\ExamtypesTable $Examtypes
 * @method \App\Model\Entity\Examtype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamtypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $examtypes = $this->paginate($this->Examtypes);

        $this->set(compact('examtypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Examtype id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examtype = $this->Examtypes->get($id, [
            'contain' => ['Exams'=>['Examtypes', 'Levels', 'Terms', 'Statuses']],
        ]);

        $this->set(compact('examtype'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examtype = $this->Examtypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $examtype = $this->Examtypes->patchEntity($examtype, $this->request->getData());
            if ($this->Examtypes->save($examtype)) {
                $this->Flash->success(__('The examtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examtype could not be saved. Please, try again.'));
        }
        $this->set(compact('examtype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Examtype id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examtype = $this->Examtypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examtype = $this->Examtypes->patchEntity($examtype, $this->request->getData());
            if ($this->Examtypes->save($examtype)) {
                $this->Flash->success(__('The examtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examtype could not be saved. Please, try again.'));
        }
        $this->set(compact('examtype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Examtype id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examtype = $this->Examtypes->get($id);
        if ($this->Examtypes->delete($examtype)) {
            $this->Flash->success(__('The examtype has been deleted.'));
        } else {
            $this->Flash->error(__('The examtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
