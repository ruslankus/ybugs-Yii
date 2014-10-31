<?php

class IssueForm extends CFormModel
{
    public $description;
    public $files;

    public function rules()
    {
        return array(

            //description of issue required
            array('description', 'required','message'=> Trl::t()->getMsg('Description not set')),

            // rules for file(picture) validation
            array(
                'files',//field name
                'file', //file validation
                'types'=>'jpg, gif, png', //available file-types
                'allowEmpty' =>true, //can be empty
                'maxSize' => 5000000, //5 mb
                'maxFiles' => 2, //max count of files
                'wrongType' =>  Translations::getFor('file has wrong type'), //message for wrong-type error
                'tooLarge' =>  Translations::getFor('file is too large'), //message for 'too large' error
                'tooMany' =>  Translations::getFor('max quantity of files is').' 1', //message for 'too many files' error
            ),
        );
    }

    public function attributeLabels()
    {
        return array(
            'description' => Trl::t()->getLabel('Problem explanation'),
            'files' => Trl::t()->getLabel('Picture of error'),
        );
    }
}
