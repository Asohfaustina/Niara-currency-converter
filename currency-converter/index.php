<?php
    $rates = ["dollar: 601 ", "pound: 770", "euro: 670"];
function doconversion($amount, $rate){
    $result = $amount / $rate;
    return $result;
}
if(isset($_POST['Convertes'])){
   
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];
    
    if($amount == ""){
        $amountError = "you must enter an amount";
    }

    if($currency == ""){
        $currencyError = "you must choose a currency";
    }
    if(!isset( $currencyError) && ! isset($amountError)){
      switch($currency){
          case "pound":
              $rate = 770;
              $symbol = "E";
              $result = doconversion($amount, $rate);
              break;
                
           case "dollar":
                  $rate = 601;
                     $symbol = "$";
                  $result = doconversion($amount, $rate);
                  break;

           case "euro":
                $rate = 670;
                 $symbol = "#";
                     $result = doconversion($amount, $rate);
              break;
          default:
              $result = "no currency was selected";
      }  
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>currency-converter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <style>
        .error {
            color: red;
            margin-bottom: 5px;
        }

    </style>
</head>

<body>

    <h1 class="text-center">PHP Currency Converter</h1>
    <div class=" container mx-auto p-5 mx-5 border">
        <form action="" method="post" class=" p-4">
            <fieldset>
                <legend class="text-danger">
                    Kindly enter the amount in the box provided and choose the currency before clicking the convert button thank you
                </legend>
                <div class="form-group">
                    <label for=""> Amount (NGN)</label> <br>
                    <input type="text" class="form-control-lg" name="amount" value="<?php if(isset($_POST['amount'])){ echo $_POST['amount'];} ?>">

                </div>


                <?php 
                if(isset($result)):
                ?>
                <div class="alert alert-info"> <?php echo "<p>NGN$amount in $currency = ".$symbol.$result."</p>"; ?>
                </div>
                <?php endif?>
                <span class="error">
                    <?php if(isset($amountError)){echo $amountError;} ?>
                </span>
                <br>
                <label for="">Choose currency</label>
                <br><br>
                <select name="currency" id="" class="form-control-lg">
                    <option value=""> --select--</option>
                    <option <?php if(isset($_POST ['currency']) && $_POST['currency'] == "pound" ){ echo"selected";} ?> value="pound">Pound</option>
                    <option <?php if(isset($_POST ['currency']) && $_POST['currency'] == "dollar" ){ echo"selected";} ?> value="dollar">dollar</option>
                    <option <?php if(isset($_POST ['currency']) && $_POST['currency'] == "euro" ){ echo"selected";} ?> value="euro">Euro</option>
                </select>
                <span class="error">
                    <?php if(isset($currencyError)){echo $currencyError;} ?>
                </span>

                <br><br>
                <div class="text-center">
                    <button class="btn btn-lg btn-info mx-3 p-3" type="submit" name="Convertes"> Convert</button>
                    <?php if(isset($_POST['showRate'])): 
        ?>
                    <button class="btn btn-lg btn-danger mx-3 p-3" type="submit" name="hideRate"> Hide Rates</button>
                    <?php else: ?>
                    <button class="btn btn-lg btn-success mx-3 p-3" type="submit" name="showRate"> Show Rates</button>
                    <?php endif?>
                </div>

                <br>
                <?php if(isset($_POST['showRate']) && !isset($_POST['hideRate'])){
             if(count($rates) != 0){
        
    
          ?>
                <div class="alert alert-primary">
                    <label for=""> Rates:
                        <?php 
            foreach($rates as $rate){
                echo $rate."<br>";
        
            } ?>
                    </label>
                </div>
                <?php }} ?>

            </fieldset>
        </form>

    </div>

</body>

</html>
