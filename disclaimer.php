<?php
include("./Lab4Common/header.php");
include('./Lab4Common/functions.php');

session_start();

 if (isset($_POST['Start']))
 {
     extract($_POST);
     $valid = TRUE;
     $AgreeErrMssg = ValidateAgreement($agree);
 }
?>
<?php if(!$valid): ?>
<div class='container'>
    <h1 class="text-center">Terms and Conditions</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
          <div class="blockquote bg-faded">
            <p>I agree to abide by the Bank's Terms and Conditions and rules in force and the changes thereto in Terms and Conditions from time to
                    time relating to my account as communicated and made available on the Bank's website.</p>
            <p>I agree that the bank before opening any deposit account, will carry out a due diligence as required under Know Your Customer guidelines of the bank.
                I would be required to submit necessary documents or proofs, such as identity, address, photograph and any such information,
                I agree to submit above documents again at periodic intervals, as may be required by the Bank.</p>
            <p>I agree that the Bank can at its sole discretion, amend any of the services/facilities given in my account either wholly or partially at any time by
                giving me at least 30 days notice and/or provide an option to me to switch to other services/facilities.</p>
          </div> <!--blockquote-->
        <div>
          <div>
            <span class="error block"><?php print $AgreeErrMssg; ?></span>
          </div>
          <div>
            <input type='checkbox' name="agree" value="1" > I have read and agree with the terms and conditions.
          </div>
        </div>
        <input class="btn btn-primary" type='submit' name='Start' value="Start">
        </div>
    </form>
</div>
<?php
else:
    $_SESSION['checked'] = "checked";
    header("Location: customerInfo.php");
    exit();
endif;
?>
<?php include("./Lab4Common/footer.php"); ?>
