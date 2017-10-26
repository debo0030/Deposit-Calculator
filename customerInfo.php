<?php include("./Lab4Common/header.php"); ?>

<?php
    session_start();
    include('./Lab4Common/functions.php');

    if(!isset($_SESSION["checked"]))
		{
		header("Location: disclaimer.php");
		exit( );
	}

            //check validations
    if (isset($_POST['Submit']))
    {
        $valid = TRUE;
        extract($_POST);

        $NameErrMssg = ValidateName($name);
        $PCErrMssg = ValidatePostalCode($postalCode);
        $PhoneErrMssg = ValidatePhone($phoneNumber);
        $EmailErrMssg = ValidateEmail($emailAddress);
        $ContactErrMssg = ValidateContact($contact, $time);
    }
    ?>
    <html>
    <head>
            <title>Customer Information</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./css/style.css">

        </head>
        <body>
            <?php if(!$valid): ?>
            <main>
                <div class="container">
                    <h1>Customer Information</h1>
                   <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div >
                            <div class='form-group'>
                                <label class="control-label" for="name">Name</label>
                                <span class="error inline-block"><?php print $NameErrMssg?></span>
                                <input class="form-control" name="name" id="name" value="<?php echo $name?>">

                            </div>
                            <div class='form-group'>
                                <label class="control-label" for='postalCode'>Postal Code</label>
                                <span class="error inline-block"><?php print $PCErrMssg; ?></span>
                                <input class="form-control" name="postalCode" id="postalCode" value="<?php echo $postalCode?>">

                            </div>
                            <div class='form-group'>
                                <label class="control-label" for="phoneNumber">Phone Number</label>
                                <span class="error inline-block"><?php print $PhoneErrMssg; ?></span>
                                <input class="form-control" type="tel" name="phoneNumber" id="phoneNumber" value="<?php echo $phoneNumber?>">

                            </div>
                            <div class='form-group'>
                                <label class="control-label" for="emailAddress">Email Address</label>
                                <span class="error inline-block"><?php print $EmailErrMssg; ?></span>
                                <input  class="form-control" name="emailAddress" id="emailAddress" value="<?php echo $emailAddress?>">

                            </div>
                            <div class='form-group'>
                                <label for='contact' >Preferred Contact Method</label>
                                <div class="radio">
                                  <label><input class="radio" type="radio" name="contact" id="contact" value="phone" checked> Phone </label>
                                  <label><input class="radio" type="radio" name="contact" value="email"> Email </label>
                                </div>
                            </div>
                            <div class='form-group'>
                                <p class="control-label">If phone is selected, when can we contact you?<br/>
                                (check all applicable)</p>
                                <span class="error inline-block"><?php echo $ContactErrMssg; ?></span>

                                <div class="checkbox">
                                  <label class="checkbox-inline"><input class="checkbox" type="checkbox" name="time[]" value="morning">Morning</label>
                                  <label class="checkbox-inline"><input class="checkbox" type="checkbox" name="time[]" value="afternoon">Afternoon</label>
                                  <label class="checkbox-inline"><input class="checkbox" type="checkbox" name="time[]" value="evening">Evening</label>
                                </div>
                            </div>
                            <div class='form-group'>
                                <input class="btn bg-primary"type="submit" value="Submit" name="Submit" >
                                <input class="btn bg-primary" type="reset" name="Clear" value="Clear">
                            </div>
                        </div>
                    </form>
                </div>
            <?php
            else :
            {
                $_SESSION['name'] = $_POST["name"];
                header("Location: depositCalculator.php");
                exit();
            }
            ?>
            <?php endif; ?>

<?php include("./Lab4Common/footer.php"); ?>
