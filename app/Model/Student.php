<?php

class Student extends AppModel {
//    public $belongsTo = array(
//        'Class' => array(
//            'className' => 'Cla',
//            'foreignKey' => 'class_id'
//        )
//    );
    function fullJoins() {
        return array(
            array('table' => 'classes',
                'alias' => 'Class',
                'conditions' => array('Student.class_id=Class.id')),
            array('table' => 'majors',
                'alias' => 'Major',
                'conditions' => array('Class.major_id=Major.id')),
            array('table' => 'departments',
                'alias' => 'Department',
                'conditions' => array('Major.department_id=Department.id')),
            array('table' => 'educations',
                'alias' => 'Education',
                'conditions' => array('Student.edu_id=Education.edu_id'))
        );
    }

    public function check($s_user, $s_pwd) {
        if (!$this->find('first', array('conditions' => array('s_user' => $s_user)))) {
            return 1;
        } else {
            $options = array('conditions' => array(
                    's_user' => $s_user,
                    's_pwd' => md5($s_pwd)
            ));
            if (!$this->find('first', $options))
                return 2;
            else
                return 0;
        }
    }

}
