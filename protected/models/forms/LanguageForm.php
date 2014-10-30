<?php

class LanguageForm extends CFormModel
{
    public $name;
    public $prefix;
    public $status;

    public function rules()
    {
        return array(
            array('name, prefix, status', 'required','message'=> Translations::getFor('Please assign value to').' "{attribute}"'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => Translations::getFor  ('Language name'),
            'prefix' => Translations::getFor('Short prefix for URL'),
            'status' => Translations::getFor('Status'),
        );
    }
}
