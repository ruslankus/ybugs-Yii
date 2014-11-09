 <?php
$cs = Yii::app()->clientScript;

$cs->registerScriptFile(Yii::app()->baseUrl.'/js/common.js',CClientScript::POS_END);
?>   

    <div class="col-md-10 content-holder" id="add-issue">
        <div class="form-holder">
                <h2>Создание и описение проблемы</h2>
           
            <?php $form=$this->beginWidget('CActiveForm',
                        array('id' =>'',
                            'enableAjaxValidation'=>false,
                            'htmlOptions'=>array('enctype' => 'multipart/form-data'))); ?>
    

                <div class="form-group clearfix">
                    <?php echo $form->label($form_mdl,'title',array('class'=>'col-md-2')); ?>
                    <div class="col-md-9">                        
                        <?php echo $form->textField($form_mdl,'title',array('class'=>'form-control')); ?>
                        <?php echo $form->error($form_mdl,'title'); ?>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <?php echo $form->label($form_mdl,'priority',array('class'=>'col-md-2'));?>
                    <div class="col-md-9">
                        <select id="select" class="form-control">
                            <option><?php echo Trl::t()->getLabel('Select priority') ?></option>
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                        </select>
                        <?php echo $form->error($form_mdl,'priority'); ?>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <?php echo $form->label($form_mdl,'description',array('class'=>'col-md-2'));?>
                    <div class="col-md-9">
                        <?php echo $form->textArea($form_mdl,'description',array('class'=>'form-control')); ?>
                        <?php echo $form->error($form_mdl,'description'); ?>
                    </div>
                </div> 
                <div class="form-group clearfix" >
                    <label class="col-md-2">attach file</label>
                    <div class="col-md-9 input-btn">
                        <input id="uploadFile" placeholder="Choose File" disabled="disabled" />
                        <div class="fileUpload btn btn-sm btn-primary">
                            <span>Upload</span>
                            <input id="uploadBtn" type="file" class="upload" />
                        </div>	   
                    </div>
                </div>
                <div class="form-group clearfix">
                        <div class="col-md-offset-2 col-md-9 btn-holder">
                        <button class="btn btn-sm btn-success" type="submit"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Create issue</button>
                    </div>
                </div>            
            <?php $this->endWidget(); ?>
        </div><!--/form-holder -->
    </div><!--/content-holder-->
