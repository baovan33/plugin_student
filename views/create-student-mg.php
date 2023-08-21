<div class="wrap">
    <h1>Register Student</h1>
    <p>Welcome to the student registration plugin.</p>
    <?php  echo  settings_errors('student_management'); ?>
    <form method="post">
        <div class="form-group">
            <label class="mt-3" for="studentName">Name</label>
            <input type="text" style="width:250px;" name="student_name" id="studentName" class="form-control " placeholder="Enter student name">
        </div>
        <div class="form-group">
            <label class="mt-3" for="teacherSelect">Select Subject</label>
            <select class="form-control" style="width:250px;" name="subject_id" id="subjectSelect">
                <?php
                    global $wpdb;
                    $table      = $wpdb->prefix."subject_mg";
                    $sql        = "SELECT * FROM `".$table."`";
                    $subjects   = $wpdb->get_results($sql, OBJECT);
                ?>
                <?php
                    foreach( $subjects as $subject ) {
                        echo "<option value='$subject->id'>".$subject->name. "</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label class="mt-3" for="teacherSelect">Select Teacher</label>
            <select class="form-control" style="width:250px;" name="teacher_id" id="teacherSelect">
                
            </select>
        </div>
        <div class="form-group">
            <label class="mt-3" for="studentDate">Date</label>
            <input type="date" style="width:250px;" name="student_date" id="studentDate" class="form-control">
        </div>
        <button type="submit" name="submit_student" class="btn btn-primary mt-3">Register</button>
    </form>

    
</div>

<?php  $this->createStudent(); ?>
