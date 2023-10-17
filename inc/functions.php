<?php
session_start();
$dbconn = "";
function dbConn()
{
    global $dbconn;
    $dbconn = mysqli_connect("localhost", 'root', '', 'gym');
    if (!$dbconn) {
        die("Deshtoi lidhja me DB" . mysqli_error($dbconn));
    }
}
dbConn();
if(isset($_GET['argument'])){
    if($_GET['argument']=='logout'){
        session_destroy();
        echo "index.php";
    }
    else if($_GET['argument']=='message'){
        unset($_SESSION['message']);
    }

}
function payment($email,$membership_fee,$payment_date){
    global $dbconn;
    $member=getMemberEmail($email);
    $member_id=$member['member_id'];
    $sql="INSERT INTO payments (member_id,amount,payment_date) VALUES ($member_id,$membership_fee,'$payment_date')";
    $res=mysqli_query($dbconn,$sql);
}
function chPayment($member_id,$membership_fee,$paymentdate){
    global $dbconn;
    $sql="INSERT INTO payments (member_id,amount,payment_date) VALUES ($member_id,$membership_fee,'$paymentdate')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        header("Location: m-membership.php");
    }
}
function changeMembership($member_id,$membership_id,$joiningdate){
    global $dbconn;
    $membership_period=getMembershipPeriod($membership_id);
    $sql="UPDATE members SET type_id=$membership_id,joining_date='$joiningdate',end_of_membership = DATE_ADD('$joiningdate', INTERVAL $membership_period MONTH) Where member_id='$member_id'";
    mysqli_query($dbconn,$sql);

}
function paymentId($member_id,$membership_fee,$payment_date){
    global $dbconn;
    $sql="INSERT INTO payments (member_id,amount,payment_date) VALUES ($member_id,$membership_fee,'$payment_date') WHERE member_id=$member_id";
    $res=mysqli_query($dbconn,$sql);
}
function getMemberEmail($email){
    global $dbconn;
    $sql="SELECT member_id from members WHERE email='$email'";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "There is no data!";
    }

}
function register($firstname, $lastname, $telephone,$email,$password,$age,$gender,$membership,$joiningdate){
    global $dbconn;
    $membership_period = getMembershipPeriod($membership);
    $sql="INSERT INTO members(member_firstname,member_lastname,telephone,email,password,age,gender,type_id,joining_date) VALUES ('$firstname', '$lastname', '$telephone','$email','$password','$age','$gender','$membership','$joiningdate')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="You are registred succesfully";
        endOfMembership($membership_period,$joiningdate,$email);
        loginMember($email,$password);
    }else{
        die("Failed to register" . mysqli_error($dbconn));
    }
}
function getMembershipPeriod($type_id) {
    global $dbconn;
    $sql="SELECT membership_period From membershiptype where type_id=$type_id";
    $result=mysqli_query($dbconn,$sql);
    if (mysqli_num_rows($result) == 1) {
        $memberData = mysqli_fetch_assoc($result);
        return $memberData['membership_period'];
}
}
function endOfMembership($membership_period,$joiningdate,$email){
    global $dbconn;
    $sql="UPDATE members SET end_of_membership = DATE_ADD('$joiningdate', INTERVAL $membership_period MONTH) Where email='$email'";
    mysqli_query($dbconn,$sql);
}
function loginMember($email, $password)
{
    global $dbconn;
    $sql = "SELECT * FROM members ";
    $sql .= " WHERE email='$email' AND password='$password'";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $memberData = mysqli_fetch_assoc($result);
        $member = array();
        $member['member_id'] = $memberData['member_id'];
        $member['member_firstname'] = $memberData['member_firstname'];
        $member['member_lastname']=$memberData['member_lastname'];
        $member['telephone']=$memberData['telephone'];
        $member['age']=$memberData['age'];
        $member['gender']=$memberData['gender'];
        $member['email']=$memberData['email'];
        $member['password']=$memberData['password'];
        $member['joining_date'] = $memberData['joining_date'];
        $member['end_of_membership'] = $memberData['end_of_membership'];
        $member['type_id']=$memberData['type_id'];
        $_SESSION['member']=$member;
        header("Location: m-profile.php");
    } else {
        echo "No user with this data ";
    }
}

function getMemberships()
{
    global $dbconn;
    $sql = "SELECT * FROM membershiptype";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "There is no data";
    }
}
function updateMembership($member_id,$membership,$joiningdate){
    global $dbconn;
    $sql = "UPDATE members SET type_id=$membership, joining_date='$joiningdate' WHERE member_id=$member_id";
}
function getMemberId($member_id){
    global $dbconn;
    $sql = "SELECT * FROM members WHERE member_id=$member_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "There is no data";
    }
}
function modifyMemberProfile($member_id,$telephone,$age, $gender, 
$email, $password)
{
    global $dbconn;
    $sql = "UPDATE members SET telephone='$telephone', age='$age', gender='$gender',";
    $sql .= " email='$email', password='$password' WHERE member_id=$member_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Member modified successfully";
        header("Location: m-profile.php");
    } else {
        echo 'Failed to modify member';
        die(mysqli_error($dbconn));
    }
}
function getMembershipType($memberid){
    global $dbconn;
    $sql="SELECT m.joining_date,m.end_of_membership,mt.type_name,mt.type_description,mt.membership_fee,mt.membership_type FROM members m INNER JOIN membershiptype mt ON m.type_id=mt.type_id WHERE m.member_id=$memberid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "There is no data";
    }
}
function getWorkoutPlan($member_id){
    global $dbconn;
    $sql="SELECT wp.member_id,wp.workout_date, wp.start_time, wp.end_time, w.workout_name, w.workout_description FROM workoutplan wp INNER JOIN workouts w ON wp.workout_id=w.workout_id WHERE wp.member_id=$member_id GROUP BY wp.workout_date ASC";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "You don't have a personal plan";
    }
}

/* TRAINERS*/
function loginTrainer($email, $password){
    global $dbconn;
    $sql = "SELECT * FROM trainers ";
    $sql .= " WHERE email='$email' AND password='$password'";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $trainerData = mysqli_fetch_assoc($result);
        $trainer = array();
        $trainer['trainer_id'] = $trainerData['trainer_id'];
        $trainer['trainer_firstname'] = $trainerData['trainer_firstname'];
        $trainer['trainer_lastname']=$trainerData['trainer_lastname'];
        $trainer['telephone']=$trainerData['telephone'];
        $trainer['email']=$trainerData['email'];
        $trainer['password']=$trainerData['password'];
        $_SESSION['member']=$trainer;
        header("Location: t-profile.php");
    } else {
        echo "<h3 class='section-title'>There is no user with this data!</h3>";
    }
}
function getTrainerId($trainer_id) {
    global $dbconn;
    $sql = "SELECT * FROM trainers WHERE trainer_id=$trainer_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "<h3 class='section-title'>There is no data!</h3>";
    }
}
function modifyTrainerProfile($trainer_id,$telephone,$email,$password)
{
    global $dbconn;
    $sql = "UPDATE trainers SET telephone='$telephone',";
    $sql .= " email='$email', password='$password' WHERE trainer_id=$trainer_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Profile modified successfully";
        header("Location: t-profile.php");
    } else {
        echo "<h3 class='section-title'>Failed to modify profile</h3>";
        die(mysqli_error($dbconn));
    }
}
function getWorkouts() {
    global $dbconn;
    $sql = "SELECT * FROM workouts";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "There is no data!";
    }
}
function getWorkoutId($workout_id){
    global $dbconn;
    $sql = "SELECT * FROM workouts WHERE workout_id=$workout_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "There is no data!";
    }
}
function modifyWorkout($workout_id,$workout_name, $workout_description){
    global $dbconn;
    $sql = "UPDATE workouts SET workout_name='$workout_name',";
    $sql .= " workout_description='$workout_description' WHERE workout_id=$workout_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Workout is modified successfully";
        header("Location: t-workouts.php");
    } else {
        echo 'Modification of workout failed';
        die(mysqli_error($dbconn));
    }
}
function deleteWorkout($workout_id) {
    global $dbconn;
    $sql = "DELETE FROM workouts WHERE workout_id=$workout_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Workout is deleted successfully";
        header("Location: t-workouts.php");
    } else {
        echo 'Failed to delete workout';
        die(mysqli_error($dbconn));
    }
}
function addWorkout($workout_name, $workout_description){
    global $dbconn;
    $sql = "INSERT INTO workouts (workout_name,workout_description)";
    $sql .= " VALUES ('$workout_name','$workout_description')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Workout added successfully";
        header("Location: t-workouts.php");
    } else {
        echo 'Failed to add workout';
        die(mysqli_error($dbconn));
    }
}
function getMembersWP($trainer_id) {
    global $dbconn;
    $sql = "SELECT m.member_id,m.member_firstname,m.member_lastname 
    FROM members m INNER JOIN workoutplan w ON m.member_id=w.member_id
    WHERE w.trainer_id=$trainer_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "There is no data!";
    }
}
function getMembersNoP() {
    global $dbconn;
    $sql = "SELECT m.member_id,m.member_firstname,m.member_lastname FROM members m INNER JOIN membershiptype mt ON m.type_id=mt.type_id WHERE mt.membership_type='plan' HAVING NOT EXISTS (SELECT 1 FROM workoutplan w WHERE m.member_id = w.member_id)";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "There is no data!";
    }
}
function getPlanDate($trainer_id,$date) {
    global $dbconn;
    $sql = "SELECT m.member_id,m.member_firstname,m.member_lastname,wp.workout_date,wp.start_time,wp.end_time,w.workout_name,w.workout_description FROM workoutplan wp INNER JOIN members m ON wp.member_id=m.member_id INNER JOIN workouts w ON wp.workout_id=w.workout_id WHERE wp.trainer_id=$trainer_id AND wp.workout_date='$date' GROUP BY wp.workout_date ASC";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "There is no data!";
    }
}
function addWorkoutPlan($member_id, $workout_date, $start_time, $end_time,$trainer_id, $workout_id){
    global $dbconn;
    $sql = "INSERT INTO workoutplan (workout_date,start_time,end_time,member_id,trainer_id,workout_id)";
    $sql .= " VALUES ('$workout_date','$start_time','$end_time','$member_id','$trainer_id', '$workout_id')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Workout plan added successfully";
        header("Location: t-memberplan.php?mid=$member_id");
    } else {
        echo 'Failed to add workout';
        die(mysqli_error($dbconn));
    }
}
function getWorkoutIdDate($member_id,$workout_date){
    global $dbconn;
    $sql = "SELECT wp.workout_id,wp.workout_date, wp.start_time, wp.end_time, w.workout_name FROM workoutplan wp INNER JOIN workouts w ON wp.workout_id=w.workout_id WHERE wp.member_id=$member_id AND wp.workout_date='$workout_date'";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "There is no data!";
    }
}
function modifyWorkoutPlan($member_id, $workout_date,$start_time,$end_time, $workout_id){
    global $dbconn;
    $sql = "UPDATE workoutplan SET start_time='$start_time', end_time='$end_time', workout_id='$workout_id' WHERE member_id=$member_id and workout_date='$workout_date'";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Workout is modified successfully";
        header("Location: t-memberplan.php?mid=$member_id");
    } else {
        echo 'Modification of workout failed';
        die(mysqli_error($dbconn));
    }
}
function deleteWorkoutPlan($member_id, $workout_date){
    global $dbconn;
    $sql = "DELETE FROM workoutplan WHERE member_id=$member_id AND workout_date='$workout_date'";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Workout plan is deleted successfully";
        header("Location: t-memberplan.php?mid=$member_id");
    } else {
        echo 'Failed to delete workout plan';
        die(mysqli_error($dbconn));
    }
}

/*Users*/
function loginUser($email, $password){
    global $dbconn;
    $sql = "SELECT * FROM users";
    $sql .= " WHERE email='$email' AND password='$password'";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $userData = mysqli_fetch_assoc($result);
        $users = array();
        $users['user_id'] = $userData['user_id'];
        $users['user_firstname'] = $userData['user_firstname'];
        $users['user_lastname']=$userData['user_lastname'];
        $users['telephone']=$userData['telephone'];
        $users['email']=$userData['email'];
        $users['password']=$userData['password'];
        $users['role']=$userData['role'];
        $_SESSION['user']=$users;
        header("Location: u-profile.php");
    } else {
        echo "Nuk ka perdoues me keto shenime ";
    }
}
function modifyTrainer($trainer_id,$firstname,$lastname,$telephone,$email,$password)
{
    global $dbconn;
    $sql = "UPDATE trainers SET telephone='$telephone',";
    $sql .= " email='$email', password='$password' WHERE trainer_id=$trainer_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Anetari u modifikua me sukses";
        header("Location: t-profile.php");
    } else {
        echo 'Deshtoi modifikimi i anetarit';
        die(mysqli_error($dbconn));
    }
}
function getUserId($user_id) {
    global $dbconn;
    $sql = "SELECT * FROM users WHERE user_id=$user_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "There is no data!";
    }
}
function modifyUserProfile($user_id,$user_firstname,$user_lastname,$telephone,$email,$password)
{
    global $dbconn;
    $sql = "UPDATE users SET user_firstname='$user_firstname',user_lastname='$user_lastname',telephone='$telephone',email='$email', password='$password' WHERE user_id=$user_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Profile modified successfully";
        header("Location: u-profile.php");
    } else {
        echo 'Failed to modify profile';
        die(mysqli_error($dbconn));
    }
}
function getMembershipId($membership_id)
{
    global $dbconn;
    $sql = "SELECT * FROM membershiptype WHERE type_id=$membership_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "There is no data";
    }
}
function modifyMembership($membership_id,$membership_name, $membership_description,$membership_period,$membership_fee,$membership_type)
{
    global $dbconn;
    $sql = "UPDATE membershiptype SET type_name='$membership_name',type_description='$membership_description',membership_period=$membership_period,membership_fee=$membership_fee,membership_type='$membership_type' WHERE type_id=$membership_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Membership modified successfully";
        header("Location: u-membershiptypes.php");
    } else {
        echo 'Failed to modify membership';
        die(mysqli_error($dbconn));
    }
}
function deleteMembership($membership_id){
    global $dbconn;
    $sql = "DELETE FROM membershiptype WHERE type_id=$membership_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Membership is deleted successfully";
        header("Location: u-membershiptypes.php");
    } else {
        echo 'Failed to delete membership';
        die(mysqli_error($dbconn));
    }   
}
function addMembership($membership_name, $membership_description,$membership_period,$membership_fee,$membership_type,$user_id){
    global $dbconn;
    $sql = "INSERT INTO membershiptype (type_name,type_description,membership_period,membership_fee,membership_type, user_id)";
    $sql .= " VALUES ('$membership_name','$membership_description',$membership_period,$membership_fee,'$membership_type',$user_id)";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Membership added successfully";
        header("Location: u-membershiptypes.php");
    } else {
        echo 'Failed to add membership';
        die(mysqli_error($dbconn));
    }
}
function getTrainers(){
    global $dbconn;
    $sql = "SELECT * FROM trainers";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "There is no data!";
    }
}
function modifyTrainers($trainer_id,$trainer_firstname,$trainer_lastname,$telephone,$email,$password){
    global $dbconn;
    $sql = "UPDATE trainers SET trainer_firstname='$trainer_firstname',trainer_lastname='$trainer_lastname',telephone='$telephone',email='$email', password='$password' WHERE trainer_id=$trainer_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Trainer  modified successfully";
        header("Location: u-trainers.php");
    } else {
        echo 'Failed to modify trainer';
        die(mysqli_error($dbconn));
    }
}
function deleteTrainer($trainer_id){
    global $dbconn;
    $sql = "DELETE FROM trainers WHERE trainer_id=$trainer_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Trainer is deleted successfully";
        header("Location: u-trainers.php");
    } else {
        echo 'Failed to delete trainer';
        die(mysqli_error($dbconn));
    }    
}
function addTrainer($trainer_firstname,$trainer_lastname,$telephone,$email,$password,$user_id){
    global $dbconn;
    $sql = "INSERT INTO trainers (trainer_firstname,trainer_lastname,telephone,email,password,user_id)";
    $sql .= " VALUES ('$trainer_firstname','$trainer_lastname','$telephone','$email','$password',$user_id)";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="Trainer added successfully";
        header("Location: u-trainers.php");
    } else {
        echo 'Failed to add trainer';
        die(mysqli_error($dbconn));
    }
}
function getPayments($filter,$from,$to){
    global $dbconn;
    if(isset($from)&empty($to)){
        $sql="SELECT m.member_firstname,m.member_lastname,p.payment_date,m.joining_date,p.amount FROM members m INNER JOIN payments p ON m.member_id=p.member_id WHERE $filter >= '$from' ORDER BY $filter DESC";
    }else if(isset($to)&empty($from)){
        $sql="SELECT m.member_firstname,m.member_lastname,p.payment_date,m.joining_date,p.amount FROM members m INNER JOIN payments p ON m.member_id=p.member_id WHERE $filter <= '$to' ORDER BY $filter DESC";
    }else if(isset($from)&isset($to)){
        $sql="SELECT m.member_firstname,m.member_lastname,p.payment_date,m.joining_date,p.amount FROM members m INNER JOIN payments p ON m.member_id=p.member_id WHERE $filter BETWEEN '$from' AND '$to' ORDER BY $filter DESC";
    }
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "There is no data";
    }
}
function getPaymentsAll($date){
    global $dbconn;
    $sql = "SELECT m.member_firstname,m.member_lastname,p.payment_date,m.joining_date,p.amount FROM members m INNER JOIN payments p ON m.member_id=p.member_id ORDER BY $date DESC";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "There is no data";
    }
}
function getUsers(){
    global $dbconn;
    $sql = "SELECT * FROM users";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "There is no data";
    }
}
function modifyUsers($user_id,$user_firstname,$user_lastname,$telephone,$email,$password){
    global $dbconn;
    $sql = "UPDATE users SET user_firstname='$user_firstname',user_lastname='$user_lastname',telephone='$telephone',email='$email', password='$password' WHERE user_id=$user_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="User  modified successfully";
        header("Location: u-users.php");
    } else {
        echo 'Failed to modify user';
        die(mysqli_error($dbconn));
    }
}
function deleteUser($user_id){
    global $dbconn;
    $sql = "DELETE FROM users WHERE user_id=$user_id";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="User is deleted successfully";
        header("Location: u-users.php");
    } else {
        echo 'Failed to delete user';
        die(mysqli_error($dbconn));
    }    
}
function addUser($user_firstname,$user_lastname,$telephone,$email,$password,$role){
    global $dbconn;
    $sql = "INSERT INTO users (user_firstname,user_lastname,telephone,email,password,role) VALUES ('$user_firstname','$user_lastname','$telephone','$email','$password','$role')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['message']="User added successfully";
        header("Location: u-users.php");
    } else {
        echo 'Failed to add trainer';
        die(mysqli_error($dbconn));
    }
}
