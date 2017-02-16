<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 */
class JobsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Users', 'Types'],
            'order' => ['Jobs.created'=>'DESC']
        ];
        $jobs = $this->paginate($this->Jobs);
				$categories = $this->Jobs->Categories->find('all');

        $this->set(compact('categories'));
        $this->set(compact('jobs'));
        $this->set('_serialize', ['jobs']);
        $this->set('title', 'JobFinds | All Jobs');
    }

    /**
     * Browse method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function browse($id = null)
    {   
    	if ($id == null) {
    		$conditions = array();
        if ($this->request->is('post')) {
				//Check Keyword Filter        
          if (!empty($this->request->data('keywords'))) {
          	//die($this->request->data('keywords'));
          	$conditions[] = array('OR' => array(
          		'Jobs.title LIKE' => "%".$this->request->data('keywords')."%",
          		'Jobs.description LIKE' => "%".$this->request->data('keywords')."%"
          		));
    	
	        }
	        //Check State Filter
	        if (!empty($this->request->data('states')) && $this->request->data('states') != 'Select State') {
          	//die($this->request->data('keywords'));
          	$conditions[] = array(
          		'Jobs.state' => $this->request->data('states')
          		);
          	
	        }

	        //Check Category Filter
	        if (!empty($this->request->data('category')) && $this->request->data('category') != 'Select Category') {
          	//die($this->request->data('category'));
          	$conditions[] = array(
          		'Jobs.category_id' => $this->request->data('category')
          		);
          	
	        }
	    	}else{
    		    $category = $this->Jobs->find()->contain(['Categories', 'Users', 'Types'])->order(['Jobs.created' => 'DESC']);
	    		  }

    		    $category = $this->Jobs->find()->where($conditions)->contain(['Categories', 'Users', 'Types'])->order(['Jobs.created' => 'DESC']);
    	}else{
    		    $category = $this->Jobs->find()->where(['Jobs.category_id' => $id])->contain(['Categories', 'Users', 'Types'])->order(['Jobs.created' => 'DESC']);
    		    //debug($category);
    		    //exit;

      }
        $categories = $this->Jobs->Categories->find('all');
        $this->set(compact('categories'));
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
        $this->set('title', 'JobFinds | Browse');

        

    }

    public function view($id = null)
    {
    	if (!$id) {
    		throw new NotFoundException(__('Invalid Job Listing!'));
    	}

        $job = $this->Jobs->get($id, [
            'contain' => ['Categories', 'Users', 'Types']
        ]);
        
    	if (!$job) {
    		throw new NotFoundException(__('Invalid Job Listing!'));
    	}

        $this->set('job', $job);
        $this->set('_serialize', ['job']);
        $this->set('title', 'JobFinds | View');

    }
    

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
        		$this->request->data['user_id'] = $this->Auth->user('id');
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            //debug($job);
            //exit;
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('Your job has been listed.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Jobs->Categories->find('list', ['limit' => 200]);
        $types = $this->Jobs->Types->find('list', ['limit' => 200]);
        $this->set(compact('job', 'categories', 'types'));
        $this->set('_serialize', ['job']);
        $this->set('title', 'JobFinds | Add Job');

    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been updated.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job could not be updated. Please, try again.'));
            }
        }
        $categories = $this->Jobs->Categories->find('list', ['limit' => 200]);
        $users = $this->Jobs->Users->find('list', ['limit' => 200]);
        $types = $this->Jobs->Types->find('list', ['limit' => 200]);
        $this->set(compact('job', 'categories', 'users', 'types'));
        $this->set('_serialize', ['job']);
        $this->set('title', 'JobFinds | Edit Job');

    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
