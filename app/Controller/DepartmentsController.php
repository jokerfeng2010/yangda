<?php
class DepartmentsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        parent::requireManager();
    }
    public $uses = array('Department', 'Major', 'Cla');
    public $helpers = array('Html', 'Form');
    public function index() {
        $this->set('departments', $this->Department->find('all', array(
            'fields' => 'id, dept_name'
        )));
    }
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid Department'));
        }

        $department = $this->Department->findById($id);
        if (!$department) {
            throw new NotFoundException(__('Invalid Department'));
        }
        $this->set('Department', $department);
    }
    
    public function viewTime($id = null) {
        //if there is id, then check if the id is exists
        if (!$id) new NotFoundException(__('Missing Department Id'));
        $department = $this->Department->findById($id);
        if (!$department) throw new NotFoundException(__('Wrong Department Id'));
        
        $this->set('TestsOnGoing', $this->Department->Test->getTestsOnGoing($id));
        $this->set('hour_tests', $this->Department->Test->getActiveTests(0, 1, $id));
        $this->set('day_tests', $this->Department->Test->getActiveTests(1, 24, $id));
        $this->set('week_tests', $this->Department->Test->getActiveTests(1, 168, $id));
        $this->set('above_week_tests', $this->Department->Test->getActiveTests(168, 43800, $id));
        $this->set('inactive_tests', $this->Department->Test->getOutOfDateTests($id));
        
        $this->loadModel('TestType');
        $this->set('test_types', $this->TestType->getTestTypesList());
//        debug($this->TestType->getTestTypesList());
        $this->set('department_id', $id);
        $this->set('dept_name', $department['Department']['dept_name']);
    }
    public function viewAllTime() {
        //if there is id, then check if the id is exists
        $this->set('TestsOnGoing', $this->Department->Test->getTestsOnGoing());
        $this->set('hour_tests', $this->Department->Test->getActiveTests(0, 1));
        $this->set('day_tests', $this->Department->Test->getActiveTests(1, 24));
        $this->set('week_tests', $this->Department->Test->getActiveTests(1, 168));
        $this->set('above_week_tests', $this->Department->Test->getActiveTests(168, 43800));
        $this->set('inactive_tests', $this->Department->Test->getOutOfDateTests());
    }
    public function deleteTime($id = null){
        if ($this->request->is('get')) throw new NotFoundException(__('get in deleteTime, you sucked'));
        if (!$id) throw new NotFoundException(__('Missing Department Id'));
        $this->Department->Test->delete($id);
    }
    /*
     * Type == 0: see all departments
     * type == 1: see all majors with department_id = id
     * type == 2: see all classes with major_id = id
     */
    public function setting(){
        $department_id = $_SESSION['Manager']['Manager']['department_id'];
        $this->Department->hasMany = array();
        /*
         * if department_id = 0, then he is school_manager, then shows all departments,
         * else shows only his department according to department_id
         */
        if ($department_id != 0) $conditions = array('department_id' => $department_id);
        else $conditions = array();
        $this->set('data', $this->Department->find('all', array(
            'fields' => array('Department.id', 'Department.dept_name', 'COUNT(`Major`.`id`) as `count`'),
            'joins' => array('LEFT JOIN `majors` AS Major ON `Major`.`department_id` = `Department`.`id`'),
            'group' => array('Department.id'),
            'conditions' => $conditions
        )));
        $this->set('departments', $this->Department->find('list', array(
            'fields' => array('id', 'dept_name')
        )));
        
    }
    public function delete(){
        if ($this->request->is('get')) 
            throw new MethodNotAllowedException();
        $id = $this->request->data['Department']['id'];
        if ($this->Major->findByDepartmentId($id)){
            $this->artMessage('该院系还有下属专业，请先删除各下属专业后再操作，或者将该院系合并至其他院系');
        }elseif ($this->Department->delete($id, true)) {
            $this->artFlash('ok');
        }
        $this->redirect($this->referer());
    }
    public function add(){
        if ($this->request->is('post')) {
            $this->Department->create();
            if ($this->Department->save($this->request->data)) 
                $this->artFlash('ok');
            else 
                $this->artFlash('fail');
            
        }
        $this->redirect($this->referer());
    }
    public function combine(){
//            $this->artMessage('出于系统安全以及稳定考虑，暂不支持合并操作');
//            $this->redirect($this->referer());
//        return;
        if ($this->request->is('post')) {
            $data = $this->request->data['Department'];
            $fromId = trim($data['from']);
            $toId = trim($data['to']);
            if ($fromId == $toId)
                $this->artMessage('合并的两个学院不可以相同');
            else{
                if ($this->Department->combine($fromId, $toId))
                    $this->artFlash('ok');
                else $this->artFlash('fail');
            }
        }
        $this->redirect($this->referer());
    }
}
