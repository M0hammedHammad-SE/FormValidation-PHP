<?php
function   sanitize_input($input){
    $input=trim($input);
    $input = htmlspecialchars($input);
    $input = stripcslashes($input);
    return $input ;
} 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(empty($_POST['fname'])){
    $fnameErr="The First Name Is Required . ";
   }
   else{
    $fname = sanitize_input($_POST["fname"]);
    if (!preg_match("/^[a-zA-Z-']*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
   }

}
   if(empty($_POST['lname'])){
    $lnameErr="The Last Name Is Required . ";
   }else{
    $lname = sanitize_input($_POST["fname"]);
    if (!preg_match("/^[a-zA-Z-']*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
   }
   }


   if(empty($_POST['gender'])){
    $genderErr="The Gender Is Required . ";
   }

   if(empty($_POST['id'])){
    $idErr="The ID Is Required . ";
   }
   else{
    $id = sanitize_input($_POST["id"]);
    if (!preg_match('/^[0-9]*$/', $id)) {
      $idErr= "Only numbers 0-9 are allowed";
   }}
   if(empty($_POST['email'])){
    $emailErr="The Email Is Required . ";
   }else{
    $email=sanitize_input($_POST['email']);
    if(!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)){
        $emailErr="Only letters (a-z), numbers (0-9), and dots (.) are allowed.";
    }
   }
   if(empty($_POST['phone'])){
    $phoneErr="The Phone Is Required . ";
   }  else{
    $phone = sanitize_input($_POST["phone"]);
    if (!preg_match('/^[0-9]*$/', $phone)) {
      $phoneErr= "Only numbers 0-9 are allowed";
   }}


   if(empty($_POST['department'])){
    $departmentErr="The Department Is Required . ";
   }
   if(empty($_POST['level'])){
    $levelErr="The Level Is Required . ";
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section>
        <div class="container">
            <div class="box">
                <div class="head">
                    <h3>Student personal information form</h3>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="row">
                        <div class="input-form">
                            <label for="">First Name : <span class="start-req">*</span></label>
                            <input type="text" name="fname" placeholder="First Name ">
                        </div>
                        <div class="input-form">
                            <label for="">Last Name : <span class="start-req">*</span></label>
                            <input type="text"  name="lname" placeholder="Last Name ">
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">
                        <div class="input-form">
                         <?php 
                            if(isset($fnameErr)){
                                echo '<div class="error" >'.$fnameErr.'</div>';
                            }
                         ?>
                        </div>
                        <div class="input-form">
                            <?php 
                                if(isset($lnameErr)){
                                    echo '<div class="error" >'.$lnameErr.'</div>';
                                }
                            ?>                       
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">
                        <div class="input-form">
                            <label for="">Gender :  <span class="start-req">*</span></label>
                            <div class="radio-box">
                                <label for="male"><input type="radio" id="male" name="gender" value="Male"> Male</label>
                                <label for="female"><input type="radio" id="female" name="gender" value="Female"> Female
                                </label>
                            </div>
                        </div>
                        <div class="input-form">
                            <label for="">ID : <span class="start-req">*</span></label>
                            <input type="text" name="id" placeholder="ID">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-form">
                         <?php 
                            if(isset($genderErr)){
                                echo '<div class="error" >'.$genderErr.'</div>';
                            }
                         ?>
                        </div>
                        <div class="input-form">
                            <?php 
                                if(isset($idErr)){
                                    echo '<div class="error" >'.$idErr.'</div>';
                                }
                            ?>                       
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">
                        <div class="input-form">
                            <label for="">Email : <span class="start-req">*</span> </label>
                            <input type="text" name="email" placeholder="Email ">
                        </div>
                        <div class="input-form">
                            <label for="">Phone : <span class="start-req">*</span></label>
                            <input type="text" name="phone" placeholder="Phone">
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">
                        <div class="input-form">
                         <?php 
                            if(isset($emailErr)){
                                echo '<div class="error" >'.$emailErr.'</div>';
                            }
                         ?>
                        </div>
                        <div class="input-form">
                            <?php 
                                if(isset($phoneErr)){
                                    echo '<div class="error" >'.$phoneErr.'</div>';
                                }
                            ?>                       
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">
                        <div class="input-form">
                            <label for="">University Specialization : <span class="start-req">*</span></label>
                            <select name="department" id="">
                                <option value="" disabled selected>select</option>
                                <option value="Computer Systems Engineering">Computer Systems Engineering</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Information Systems">Information Systems</option>
                            </select>
                        </div>
                        <div class="input-form">
                            <label for="">Level : <span class="start-req">*</span></label>
                            <select name="level" id="">
                                <option value="" disabled selected>select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                     <!--  -->
                     <div class="row">
                        <div class="input-form">
                         <?php 
                            if(isset($departmentErr)){
                                echo '<div class="error" >'. $departmentErr .'</div>';
                            }
                         ?>
                        </div>
                        <div class="input-form">
                            <?php 
                                if(isset($levelErr)){
                                    echo '<div class="error" >'.$levelErr.'</div>';
                                }
                            ?>                       
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">
                        <input type="submit" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>

<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";

?>