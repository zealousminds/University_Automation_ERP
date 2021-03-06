<?php 
$edit_data		=	$this->db->get_where('exam_set_assessment' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_exam_set_assessment');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/exam_set_assessment/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('class_participation');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="fee_category" value="<?php echo $row['fee_category'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('homework_assignment_&_quizes');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="receipt_no" value="<?php echo $row['receipt_no'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('final_examination');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('max_mark');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="max_mark" value="<?php echo $row['max_mark'];?>"/>
                    </div>
                </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_exam_set_assessment');?></button>
						</div>
					</div>
        		</form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>


