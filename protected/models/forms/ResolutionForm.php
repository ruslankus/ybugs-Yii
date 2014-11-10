<?php

class ResolutionForm extends CFormModel
{
    public $description;
    public $issue_status;

    public function rules()
    {
        return array(
            array('description','required','message'=> Trl::t()->getMsg('Please assign value to').' "{attribute}"'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'description' => Trl::t()->getLabel('Resolution description'),
            //'issue_status' => Trl::t()->getLabel('Status of issue'),
        );
    }
}
