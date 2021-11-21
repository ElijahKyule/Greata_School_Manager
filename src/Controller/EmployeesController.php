<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Genders', 'Roles', 'Statuses'],
        ];
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees')); 
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tab = $this->request->getQuery('tab'); 
        $employee = $this->Employees->get($id, [
            'contain' => ['Genders', 'Roles', 'Statuses', 'EmployeeLeaves'=>['Leaves', 'Measures', 'Users']],
        ]);

        $this->set(compact('employee', 'id', 'tab'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEmptyEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            $employee->image = '';
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $genders = $this->Employees->Genders->find('list', ['limit' => 200]);
        $roles = $this->Employees->Roles->find('list', ['limit' => 200]);
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'genders', 'roles', 'statuses'));
    }

     /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function uploadImage($id)
    {
        $employee = $this->Employees->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if (!$employee->getErrors) 
            {
                $image = $this->request->getData('employee_image');
                $name  = $image->getClientFilename();
                $targetPath = WWW_ROOT.'img'.DS.$name;

                if ($name) 
                {
                    $image->moveTo($targetPath);
                    $upload = $this->Employees->query()
                        ->update()
                        ->set(['image' => $name])
                        ->where(['id' => $id])
                        ->execute();
                    if ($upload == true) 
                    {
                        $this->Flash->success(__('The employee image has been uploaded.'));

                        return $this->redirect(['controller'=>'Employees', 'action' => 'view', $id, '?'=>['tab'=>'profile']]);
                    }
                    else
                    {
                        $this->Flash->error(__('The employee image could not be uploaded. Please, try again.'));
                        return $this->redirect(['controller'=>'Employees', 'action' => 'view', $id, '?'=>['tab'=>'profile']]);
                    }
                }
                elseif(!$name)
                {
                    $this->Flash->error(__('The employee image can not be empty.'));
                    return $this->redirect(['controller'=>'Employees', 'action' => 'view', $id, '?'=>['tab'=>'profile']]);
                }  
            }    
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            $employee->image = '';
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $genders = $this->Employees->Genders->find('list', ['limit' => 200]);
        $roles = $this->Employees->Roles->find('list', ['limit' => 200]);
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'genders', 'roles', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
