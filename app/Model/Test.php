<?php

/*
 * To change this template, choose Tools | Templates
 */

/**
 * Description of Test
 * @author you
 */
class Test extends AppModel {
    //put your code here
    //tests that will be tested
    public $validate = array(
        'available' => array(
            'rule' => 'numeric',
            'required' => true,
            'message' => '必须为数字，不能为空'
        ),
        'duration' => array(
            'rule' => 'numeric',
            'required' => true,
            'message' => '必须为数字，不能为空'
        )
    );
    public $belongsTo = array(
        'TestType' => array('fields' => 'name'),
        'Department'
        );

    //compare now() with begin_time+hoursBelow and begin_time+hoursAove
    public function getActiveTests($hoursBelow, $hoursAbove, $department_id = null, $test_type_id = null) {
        $now = date('Y-m-d H:i:s');
        $conditions = array('active' => 1,
            "DATE_ADD('$now', INTERVAL $hoursBelow HOUR) < begin_time",
            "DATE_ADD('$now', INTERVAL $hoursAbove HOUR) > begin_time",
            'active' => 1
        );
        if ($department_id)
            $conditions['department_id'] = $department_id;
        if ($test_type_id)
            $conditions['test_type_id'] = $test_type_id;
        return $this->find('all', array('conditions' => $conditions));
    }

    //get tests which is not begin or which is begin but also available
    public function getActiveTestsWithDuration($department_id = null, $test_type_id = null) {
        $now = date('Y-m-d H:i:s');

        $conditions = array('active' => 1,
            "DATE_ADD(begin_time, INTERVAL available HOUR) > '$now'",
            'active' => 1);

        if ($department_id)
            $conditions['department_id'] = $department_id;
        if ($test_type_id)
            $conditions['test_type_id'] = $test_type_id;

        return $this->find('all', array('conditions' => $conditions));
        //debug($this->getDataSource()->getLog());
    }
    //get tests which is on doing
    public function getTestsOnGoing($department_id = null, $test_type_id = null) {
        $now = date('Y-m-d H:i:s');
        $conditions = array('active' => 1,
            "DATE_ADD(begin_time, INTERVAL available HOUR) > '$now'",
            "'$now' > begin_time",
            'active' => 1);
        if ($department_id)
            $conditions['department_id'] = $department_id;
        if ($test_type_id)
            $conditions['test_type_id'] = $test_type_id;
        return $this->find('all', array('conditions' => $conditions));

        //debug($this->getDataSource()->getLog());
    }

    //get tests that is out of date [now() > begin_time+avaliable]
    public function getOutOfDateTests($department_id = null, $test_type_id = null) {
        $now = date('Y-m-d H:i:s');
        $conditions = array('active' => 1,
            "DATE_ADD(begin_time, INTERVAL available HOUR) < '$now'",
            'active' => 1
        );
        if ($department_id)
            $conditions['department_id'] = $department_id;
        if ($test_type_id)
            $conditions['test_type_id'] = $test_type_id;
        return $this->find('all', array('conditions' => $conditions));
    }

    public function getHistoryTests($department_id = null) {
        $conditions = array('active' => 0);
        if ($department_id)
            $conditions['department_id'] = $department_id;
        return $this->find('all', array('conditions' => $conditions, 
            'order' => array('begin_time desc')));
    }

}

?>
