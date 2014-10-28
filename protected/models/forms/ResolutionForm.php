<?php

class ResolutionForm extends CFormModel
{
    public $description;
    public $issue_status;

    public function rules()
    {
        return array(
            array('description, issue_status', 'required','message'=> Translations::getFor('Please assign value to').' "{attribute}"'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'description' => Translations::getFor('Resolution description'),
            'issue_status' => Translations::getFor('Status of issue'),
        );
    }
}
