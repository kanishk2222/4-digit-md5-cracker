<!DOCTYPE html>
<head><title>Kanishk Dutt Sharma MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a 4 digits pin number and
attempts to hash all 4 digits combinations
to determine the original 4 digits.</p>
<pre>
Debug Output:
<?php
$goodtext="not found";

// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];


    $num= "0123456789";
    $show = 15;

    // Outer loop go go through the alphabet for the
    // first position in our "possible" pre-hash
    // text
    for($i=0; $i<strlen($num); $i++ ) {
        $n1 = $num[$i];   // The first number

        for($j=0; $j<strlen($num); $j++ ) {
            $n2 = $num[$j];  // Our second number

           for($k=0; $k<strlen($num); $k++){
               $n3= $num[$k];  //third number

               for($l=0; $l<strlen($num); $l++){
                    $n4= $num[$l];  // fourth number

            // Concatenate the two characters together to
            // form the "possible" pre-hash text
            $try = $n1.$n2.$n3.$n4;

            // Run the hash and then check to see if we match
            $check = hash('md5', $try);
            if ( $check == $md5 ) {
                $goodtext = $try;
                break;   // Exit the inner loop
            }

            // Debug output until $show hits 0
            if ( $show > 0 ) {
                print "$check $try\n";
                $show = $show - 1;
            }

             }
          }
        }
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<p>PIN: <?=  htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
</body>
</html>
