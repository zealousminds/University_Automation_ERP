<div class="row">
    <div class="col-md-12 coursereg">
        <?php echo form_open(base_url() . 'index.php?admin/semester_wise_distri_of_courses' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
        <div class="">
            <div class="sss"><?php echo get_phrase('semester_wise_courses');?></div>
            <div class="form-group">
                <div class="col-md-12">
                    <select name="ProgramName" class="form-control">
                        <option value="#"><?php echo get_phrase('select_program');?></option>
                        <?php
                        $course_program = $this->db->get('course_program')->result_array();
                        foreach($course_program as $row1):
                            ?>
                            <option value="<?php echo $row1['id'];?>">
                                <?php echo $row1['course_name'];?>
                            </option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <select name="year" class="form-control">
                        <option value="#"><?php echo get_phrase('select_year') ;?></option>
                        <?php
                        $se = $this->db->get('year')->result_array();
                        foreach($se as $r2):
                            ?>
                            <option value="<?php echo $r2['id'];?>">
                                <?php echo $r2['year'];?>
                            </option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <select name="Semester" class="form-control">
                        <option value="#"><?php echo get_phrase('select_semester') ;?></option>
                        <?php
                        $semester = $this->db->get('semester')->result_array();
                        foreach($semester as $row2):
                            ?>
                            <option value="<?php echo $row2['id'];?>">
                                <?php echo $row2['name'];?>
                            </option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered courses">
            <li class="">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('courses');?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_course');?>
                </a></li>
            <li class="active">
                <a href="#semester_wise_courses" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('semester_wise_courses');?>
                </a></li>
            <li>
                <a href="#add_semester_wise_courses" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_semester_wise_courses');?>
                </a></li>
            <li>
                <a href="#program_list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('program_list');?>
                </a></li>
            <li>
                <a href="#add_program" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_program');?>
                </a></li>
            <li>
                <a href="#faculty_list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('faculty_list');?>
                </a></li>
            <li>
                <a href="#add_faculty" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_faculty');?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box" id="faculty_list">

                <table class="table table-bordered datatable" id="table_export3">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('faculty_name');?></div></th>
                        <th><div><?php echo get_phrase('faculty_code');?></div></th>
                        <th><div><?php echo get_phrase('description');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($faculty_setup as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['code'];?></td>
                            <td><?php echo $row['description'];?></td>

                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_faculty_setup/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                </a>
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/subjects/facdelete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane box" id="add_faculty" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/subjects/faculty_setup' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('faculty_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" placeholder="Science and Engineering" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('faculty_code');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="code" placeholder="001" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="description" placeholder="EEE Short Description" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_faculty_setup');?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane box" id="program_list">

                <table class="table table-bordered datatable" id="table_export2">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('course_name');?></div></th>
                        <th><div><?php echo get_phrase('course_code');?></div></th>
                        <th><div><?php echo get_phrase('faculty');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($course_program as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['course_name'];?></td>
                            <td><?php echo $row['course_code'];?></td>
                            <td><?php echo $row['course_alias'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_course_program/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                </a>
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/subjects/programdelete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane box" id="add_program" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/subjects/course_program' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="course_name" placeholder="Computer Science and Engineering (CSE)" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_code');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="course_code" placeholder="001" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('faculty_name');?></label>
                            <div class="col-sm-5">
                                <select name="course_alias" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $faculty_setup = $this->db->get('faculty_setup')->result_array();
                                    foreach($faculty_setup as $row):
                                        ?>
                                        <option value="<?php echo $row['name'];?>">
                                            <?php echo $row['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_course_program');?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane box active" id="semester_wise_courses">

                <table class="table table-bordered datatable" id="table_export1">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('program_name');?></div></th>
                        <th><div><?php echo get_phrase('year');?></div></th>
                        <th><div><?php echo get_phrase('semester');?></div></th>
                        <th><div><?php echo get_phrase('courses');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($assign_subjects as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php
                                $this->db->where('id', $row['course']);
                                $course_program = $this->db->get('course_program')->result_array();
                                foreach($course_program as $ee):
                                    echo $ee['course_name'];
                                endforeach;
                                ?></td>
                            <td><?php
                                $this->db->where('id', $row['batch']);
                                $cc = $this->db->get('year')->result_array();
                                foreach($cc as $ewe):
                                    echo $ewe['year'];
                                endforeach;
                                ?></td>
                            <td><?php
                                $this->db->where('id', $row['semester']);
                                $cca = $this->db->get('semester')->result_array();
                                foreach($cca as $ez):
                                    echo $ez['name'];
                                endforeach;
                                ?></td>
                            <td>
                                <?php
                                $test = explode(", ", $row['subject']);
                                //echo $string = rtrim(implode(",\n", $test), ',');
                                echo $test1 = implode(",<br/>", $test);
                                ?>
                            </td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_attn/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i><?php echo get_phrase('take_attend');?>
                                </a>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_attn_report/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i><?php echo get_phrase('attend_report');?>
                                </a>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_assign_subjects/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i><?php echo get_phrase('edit');?>
                                </a>
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/subjects/semester_wise_coursesdelete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i><?php echo get_phrase('delete');?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane box" id="add_semester_wise_courses" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/subjects/add_semester_wise_courses' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('program_name');?></label>
                            <div class="col-sm-5">
                                <select name="course" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $faculty_setup = $this->db->get('course_program')->result_array();
                                    foreach($faculty_setup as $row):
                                        ?>
                                        <option value="<?php echo $row['id'];?>">
                                            <?php echo $row['course_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('year');?></label>
                            <div class="col-sm-5">
                                <!--<input type="text" class="form-control" name="batch"/>-->
                                <select name="batch" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $faculty_setup = $this->db->get('year')->result_array();
                                    foreach($faculty_setup as $row):
                                        ?>
                                        <option value="<?php echo $row['id'];?>">
                                            <?php echo $row['year'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('semester');?></label>
                            <div class="col-sm-5">
                                <select name="semester" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $faculty_setup = $this->db->get('semester')->result_array();
                                    foreach($faculty_setup as $row):
                                        ?>
                                        <option value="<?php echo $row['id'];?>">
                                            <?php echo $row['name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('courses');?></label>
                            <div class="col-sm-8">
                                <?php
                                $facul = $this->db->get('subjects')->result_array();
                                foreach($facul as $row21):
                                    ?>
                                    <input type="checkbox" name="subject[]" value="<?php echo $row21['CourseCode']."&nbsp;&nbsp;&nbsp;&nbsp;".$row21['CourseName']."&nbsp;&nbsp;&nbsp;&nbsp;".$row21['Credits']."&nbsp;&nbsp;&nbsp;&nbsp;".$row21['Prerequisites'];?>">
                                    &nbsp;&nbsp;
                                    <?php echo $row21['CourseName'];?>
                                    <br/>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_courses');?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane box" id="list">

                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('CourseCode');?></div></th>
                        <th><div><?php echo get_phrase('CourseName');?></div></th>
                        <th><div><?php echo get_phrase('Credits');?></div></th>
                        <th><div><?php echo get_phrase('Prerequisite(s)');?></div></th>
                        <th><div><?php echo get_phrase('CourseAreas');?></div></th>
                        <th><div><?php echo get_phrase('Program');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['CourseCode'];?></td>
                            <td><?php echo $row['CourseName'];?></td>
                            <td><?php echo $row['Credits'];?></td>
                            <td><?php echo $row['Prerequisites'];?></td>
                            <td><?php echo $row['CourseAreas'];?></td>
                            <td>
                                <?php
                                $this->db->where('id', $row['Program']);
                                $course_name = $this->db->get('course_program')->result_array();
                                foreach($course_name as $row3x3):
                                    echo $row3x3['course_name'];
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_subjects/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                </a>
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/subjects/delete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i>
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
                    <?php echo form_open(base_url() . 'index.php?admin/subjects/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_code');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="CourseCode" placeholder="CSE1101" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="CourseName" placeholder="C Programming" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('credits');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Credits" placeholder="3" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('prerequisite(s)');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Prerequisites" placeholder="prerequisite(s)" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('course_areas');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="CourseAreas" placeholder="Computer Science & Engineering Core Course(s)" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('Program');?></label>
                            <div class="col-sm-5">
                                <select name="Program" class="form-control">
                                    <option value="#"><?php echo get_phrase('select') ;?></option>
                                    <?php
                                    $course_program = $this->db->get('course_program')->result_array();
                                    foreach($course_program as $row1z2):
                                        ?>
                                        <option value="<?php echo $row1z2['id'];?>">
                                            <?php echo $row1z2['course_name'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_course');?></button>
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
        var datatable = $("#table_export1").dataTable();
        var datatable = $("#table_export2").dataTable();
        var datatable = $("#table_export3").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>