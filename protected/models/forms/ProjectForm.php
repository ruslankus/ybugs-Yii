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
            array('name, description, developers, users', 'required','message'=> Translations::getFor('Please assign value to').' "{attribute}"'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => Translations::getFor('Project name'),
            'description' => Translations::getFor('Project description'),
            'developers' => Translations::getFor('Developers'),
            'users' => Translations::getFor('Users/testers'),
        );
    }
}
