<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('fee_allocation');?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_record');?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">

                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('fee_category');?></div></th>
                        <th><div><?php echo get_phrase('receipt_no');?></div></th>
                        <th><div><?php echo get_phrase('description');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['fee_category'];?></td>
                            <td><?php echo $row['receipt_no'];?></td>
                            <td><?php echo $row['description'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_std_fee_allocation/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/std_fee_allocation/delete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i>
                                    <?php echo get_phrase('delete');?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/std_fee_allocation/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('fee_category');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="fee_category"/>-->
                                <select name="fee_category" class="form-control">
                                    <option value="#"><?php echo get_phrase('fee_category');?></option>
                                    <?php
                                    $course_program = $this->db->get('std_fee_category')->result_array();
                                    foreach($course_program as $row1):
                                        ?>
                                        <option value="<?php echo $row1['fee_category'];?>">
                                            <?php echo $row1['fee_category'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('note');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="receipt_no"/>-->
                                <select name="receipt_no" class="form-control">
                                    <option value="#"><?php echo get_phrase('select');?></option>
                                    <?php
                                    $course_program = $this->db->get('std_fee_sub_category')->result_array();
                                    foreach($course_program as $row):
                                        ?>
                                        <option value="<?php echo $row['fee_category'];?>">
                                            <?php echo $row['fee_category'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="description"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_fee_allocation');?></button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!----CREATION FORM ENDS-->
            </div>
        </div>
    </div>



    <!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
    <script type="text/javascript">

        jQuery(document).ready(function($)
        {


            var datatable = $("#table_export").dataTable();

            $(".dataTables_wrapper select").select2({
                minimumResultsForSearch: -1
            });
        });

    </script>