<?php

class IssueForm extends CFormModel
{
    public $files;
    public $title;
    public $priority;
    public $description;

    public function rules()
    {
        return array(

            //description of issue required
            array('description,title', 'required','message'=> Trl::t()->getMsg('Description not set')),
            array('priority', 'required'),
            
            // rules for file(picture) validation
            array(
                'files',//field name
                'file', //file validation
                'types'=>'jpg, gif, png', //available file-types
                'allowEmpty' =>true, //can be empty
                'maxSize' => 5000000, //5 mb
                'maxFiles' => 1,
                'wrongType' =>  Trl::t()->getMsg('file has wrong type'), //message for wrong-type error
                'tooLarge' =>  Trl::t()->getMsg('file is too large'), //message for 'too large' error
                'tooMany' =>  Trl::t()->getMsg('max quantity of files is').' 1', //message for 'too many files' error
            ),
        );
    }

    public function attributeLabels()
    {
        return array(
            'description' => Trl::t()->getLabel('Problem explanation'),
            'files' => Trl::t()->getLabel('Picture of error'),
            'title' => Trl::t()->getLabel('Issue title'),
            'priority' => Trl::t()->getLabel('priority'),
            'files' => Trl::t()->getLabel('attach file')
        );
    }
}
