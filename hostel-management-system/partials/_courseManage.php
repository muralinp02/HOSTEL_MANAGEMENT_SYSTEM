<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['removecourse'])) {
        $Id = $_POST["Id"];
        $sql = "DELETE FROM `courses` WHERE `id`='$Id'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
            window.location=document.referrer;
            </script>";
    }
    
    if(isset($_POST['createCourse'])) {
        $coursecode = $_POST["coursecode"];
        $course = $_POST["course"];
        $course_fn = $_POST["course_fn"];
        $sql = "INSERT INTO `courses` ( `course_code`, `course_sn`, `course_fn`) VALUES ('$coursecode', '$course', '$course_fn')";   
                $result = mysqli_query($conn, $sql);
                if ($result){
                    echo "<script>alert('New Course Added Successfuly.');
                            window.location=document.referrer;
                        </script>";
                }else {
                    echo "<script>alert('Failed');
                            window.location=document.referrer;
                        </script>";
                }
            }
            
    if(isset($_POST['editCourse'])) {
        $id = $_POST["courseId"];
        $coursecode = $_POST['coursecode'];
        $course = $_POST['course'];
        $course_fn = $_POST['course_fn'];

        $sql = "UPDATE `courses` SET `course_code`='$coursecode', `course_sn`='$course', `course_fn`='$course_fn' WHERE `id`='$id'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('update successfully');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }   
}
?>