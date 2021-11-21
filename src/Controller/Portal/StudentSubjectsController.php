<?php
declare(strict_types=1);

namespace App\Controller\Portal;

use App\Controller\Portal\AppController;

/**
 * StudentSubjects Controller
 *
 * @property \App\Model\Table\StudentSubjectsTable $StudentSubjects
 * @method \App\Model\Entity\StudentSubject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentSubjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Subjects'],
        ];
        $studentSubjects = $this->paginate($this->StudentSubjects);

        $this->set(compact('studentSubjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Student Subject id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentSubject = $this->StudentSubjects->get($id, [
            'contain' => ['Students', 'Subjects'],
        ]);

        $this->set(compact('studentSubject'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentSubject = $this->StudentSubjects->newEmptyEntity();
        if ($this->request->is('post')) {
            $studentSubject = $this->StudentSubjects->patchEntity($studentSubject, $this->request->getData());
            if ($this->StudentSubjects->save($studentSubject)) {
                $this->Flash->success(__('The student subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student subject could not be saved. Please, try again.'));
        }
        $students = $this->StudentSubjects->Students->find('list', ['limit' => 200]);
        $subjects = $this->StudentSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('studentSubject', 'students', 'subjects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Student Subject id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentSubject = $this->StudentSubjects->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentSubject = $this->StudentSubjects->patchEntity($studentSubject, $this->request->getData());
            if ($this->StudentSubjects->save($studentSubject)) {
                $this->Flash->success(__('The student subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student subject could not be saved. Please, try again.'));
        }
        $students = $this->StudentSubjects->Students->find('list', ['limit' => 200]);
        $subjects = $this->StudentSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('studentSubject', 'students', 'subjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Student Subject id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentSubject = $this->StudentSubjects->get($id);
        if ($this->StudentSubjects->delete($studentSubject)) {
            $this->Flash->success(__('The student subject has been deleted.'));
        } else {
            $this->Flash->error(__('The student subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
