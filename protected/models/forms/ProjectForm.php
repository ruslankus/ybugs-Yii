<?php

class ProjectForm extends CFormModel
{
    public $name;
    public $description;
    public $developers = array();
    public $users = array();

    public function rules()
    {
        return array(
            array('name, description,', 'required','message'=> Trl::t()->getMsg('Please assign value to').' "{attribute}"'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => Trl::t()->getLabel('Project name'),
            'description' => Trl::t()->getLabel('Project description'),
        );
    }
}
