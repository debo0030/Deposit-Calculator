<?php include("./Lab4Common/header.php");

    session_start();
    include('./Lab4Common/functions.php');

    if(!isset($_SESSION["name"]))
		{
		header("Location: customerInfo.php");
		exit( );
	}

//check validations
if (isset($_POST['Calculate']))
{
    $valid = TRUE;
    extract($_POST);
    $PrincipalErrMssg = ValidatePrincipal($principal);
    $RateErrMssg = ValidateRate($rate);
    $YearsErrMssg = ValidateYears($years);
}
?>
        <main>
            <div class="container">
                <h1>Deposit Calculator</h1>
               <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="principal">Principal Amount</label>
                            <span class="error inline-block"><?php print $PrincipalErrMssg; ?></span>
                            <input class="form-control" type="text" name="principal" id="principal" value="<?php echo $principal?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="rate">Interest Rate (%)</label>
                            <span class="error inline-block"><?php print $RateErrMssg; ?></span>
                            <input class="form-control" type="text" name="rate" id="rate" value="<?php echo $rate?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="years">Years to Deposit</label>
                            <span class="error inline-block"><?php print $YearsErrMssg; ?></span>
                            <input class="form-control" type="text" name="years" id="years" value="<?php echo $years?>">                            
                        </div>
                        <div>
                            <input class="btn btn-primary" type="submit" value="Calculate" name="Calculate" >
                            <input class="btn btn-primary" type="reset" name="Clear" value="Clear" id="clearBtn">
                        </div>
                    </div>
               </form>

    <?php if($valid): ?>
<div class="container col-md-4">

  <div class="table-responsicve">
        <table class="table table-striped table-hover" ID="resultsTable">
<caption>The following is the result of the calculation:</caption>

            <tr>
                <th>Years</th>
                <th>Principal at Start of Year</th>
                <th>Interest for the Year</th>
            </tr>
                <?php

                $i = 1;

                $NewPrincipal = $principal;
                do {
                    $InterestForYear = $NewPrincipal * ($rate / 100);
                    printf("<tr><td>%s</td><td>\$%.2f</td><td>\$%.2f</td></tr>", $i, $NewPrincipal, $InterestForYear);
//
                    $NewPrincipal += $InterestForYear;
                    $i++;
                } while($i <= $years);

        ?>
        </table>
      </div>
      </div>
            </body>
            </div>
        <?php endif; ?>
<?php include("./Lab4Common/footer.php"); ?>


            <script>
            $('#clearBtn').on('click', function(e)
            {
                e.preventDefault();
                $('input[type=text]').val("");
                $('#resultsTable ').remove();
            });

            </script>
