<?php

//validation functions
function ValidatePrincipal($principal) 
{ 
    global $valid;
       $PrincipalErrMssg = ""; 
    if (empty($principal) || !is_numeric($principal) || $principal <= 0)
        {
            $PrincipalErrMssg = "The principal amount must be numeric and greater than 0.";
            $valid = FALSE;
        } 
     return $PrincipalErrMssg;
     
}

function ValidateRate($rate) 
{ 
        global $valid;
    $RateErrMssg = "";
    if (empty($rate) || !is_numeric($rate) || $rate <= 0)
        {
               $RateErrMssg = "The interest rate must be numeric and non-negative.";
               $valid = FALSE;
        }
        return $RateErrMssg;

}

function ValidateYears($years) 
{
        global $valid;
    $YearsErrMssg = "";
    if (empty($years) || !is_numeric($years) || $years >20 || $years <1)
        {
               $YearsErrMssg = "The number of years must be between 1 and 20.";
               $valid = FALSE;

        }
        return $YearsErrMssg;

}

function ValidateName($name) 
{
        global $valid;
    $NameErrMssg = "";
    if (empty($name))
        {
              $NameErrMssg = "Name cannot be blank.";
               $valid = FALSE;

        }
        return $NameErrMssg;
             $valid = FALSE;

}

function ValidatePostalCode($postalCode) 
{
        global $valid;
    $PCErrMssg = "";
    if (empty($postalCode))
        {
              $PCErrMssg = "Postal code cannot be blank.";
                             $valid = FALSE;

        }
    elseif (!preg_match("#[a-zA-Z][0-9][a-zA-Z]\s*[0-9][a-zA-Z][0-9]#", $postalCode))
    {
        $PCErrMssg = "Postal code must be in the form: A1A 1A1.";

    }
    else 
    {
        $PCErrMssg = "";
    }
    return $PCErrMssg;

}

function ValidatePhone($phoneNumber) 
{
        global $valid;
    $PhoneErrMssg = "";
    if (empty($phoneNumber))
        {
               $PhoneErrMssg = "Phone number cannot be blank.";
                              $valid = FALSE;

        }
    elseif (!preg_match("#^\d{3}-\d{3}-\d{4}$#", $phoneNumber))
    {
        $PhoneErrMssg = "Phone number must be in the form 123-456-1234.";
                       $valid = FALSE;

    }
    return $PhoneErrMssg;

}

function ValidateEmail($emailAddress) 
{
        global $valid;
        $EmailErrMssg = "";

    if (empty($emailAddress))
        {
                $EmailErrMssg =  "Email cannot be blank.";
                               $valid = FALSE;

        } 
    elseif(!preg_match("#^[a-zA-Z0-9._%+-]+@((?:[a-zA-Z0-9-]+)\.)+[a-zA-Z]{2,5}$#", $emailAddress))
        {
            $EmailErrMssg = "Email must be in the form john@sss.ccc";
                           $valid = FALSE;

        }
       
    return $EmailErrMssg;
  
}

function ValidateContact($contact, $time)
{
    global $valid;
    $ContactErrMssg="";
    if (isset($contact))
        {
                if ($contact == "phone" && !isset($time))
                {
                $ContactErrMssg =  "When preferred contact method is phone, you must select on or more contact times.";
                $valid = FALSE;
                }
                
        }  
     return $ContactErrMssg;
}

function ValidateAgreement($agree)
{
    global $valid;
    $AgreeErrMssg="";
    if (empty($agree))
    {
        $AgreeErrMssg = "You must agree to the terms and conditions.";
        $valid = FALSE;
        
    }
    return $AgreeErrMssg;
}

