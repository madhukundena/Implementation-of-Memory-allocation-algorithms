
 <!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Memory allocation Algorithms</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
#cc{
  color:MAROON;
  font:50px verdana;
  font-weight:"bold";
  text-align:center;
 }
 table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align:center;
}
th, td {
  padding: 5px;
}
body {
  background-color: #F7DC6F ;
}

</style>

</head>
<body>
  <?php
   $p= array();
   $y= array(1=>"FIRST FIT",2=>"BEST FIT",3=>"WORST FIT");
   $np=$_POST["n1"];
   $fit1=$_POST["fit"];
   $nb=$_POST["n2"];
   $val=100;

 for($i=1;$i<=$np;$i++)
   {
       $ind="l"."$i";
     $p[$i]=$_POST[$ind];

     }
       $barray= array();
       $b= array();
       $fragment=array();
       $parray=array();
       $unal=array();
    for($i=1;$i<=$nb;$i++)
    {
      $ind="b"."$i";
      $b[$i]=$_POST[$ind];
      $val+=100;
      $barray[$i]=-1;
      $fragment[$i]=0;
      $parray[$i]=0;
      $unal[$i]=0;
    }
      $lowest=9999;
     $temp;
     $flag=0;
     $unid=0;
   for($i=1;$i<=$np;$i++)
	{
		for($j=1;$j<=$nb;$j++)
		{
			if($barray[$j]!=1)
			{
				$temp=$b[$j]-$p[$i];
				if($temp>=0)
					if($lowest>$temp)
					{
						$parray[$i]=$j;
            $lowest=$temp;
            $flag=1;
					}
			}
		}
   if($flag==1){
    $fragment[$i]=$lowest;
     $temp=$parray[$i];
		$barray[$temp]=1;
		$lowest=10000;
      $flag=0;
    }
    else{
        $parray[$i]=0;
        $unid++;
       $unal[$unid]=$i;
    }

  }
  if($fit1=='2')
  {
   echo("<br><center><input type='text' id='cc' value='Best Fit' text-align:center disabled='disabled' size='10'> </center><br>");
   echo "<table class='table table-dark' align='center' text-align:center; border='1' cellpadding='5' cellspacing='0'>
      <thead>
        <tr bgcolor='#979797'>

          <th scope='col'>Process no</th>
          <th scope='col'>Process size</th>
          <th scope='col'>Block no</th>
          <th scope='col'>Block size</th>
          <th scope='col'>Fragment</th>


        </tr>
      </thead> ";
  for($i=1;$i<=$np;$i++)
     { echo "<tr>";
      if( $parray[$i]!=0)
      {$temp=$parray[$i];
  	echo("<br> <td> $i </td> <td> $p[$i] </td>  <td> $parray[$i] </td> <td> $b[$temp] </td> <td> $fragment[$i] </td>");

  }
  echo "</tr>";
  }
  for($i=1;$i<=$unid;$i++)
  {  echo "<tr>";
      $temp6=$unal[$i];
      echo "<span style='color: red;' /> <td> $unal[$i] </td> <td>$p[$temp6]</td><td style='color: red;'>Not allocated </td> <td>-</td> <td>-</td></span>";
      echo "</tr>";
 }
echo "</table>";
//echo "<br><br><br><br><br>";
}

if($fit1=='1')
 {
  echo("<br><center><input type='text' id='cc' value='First Fit' text-align:center disabled='disabled' size='10'> </center><br>");
  $bsize=array();
  $psize= array();
  $flags=array();
  $allocation=array();
 	for($i = 1; $i <=$nb; $i++)
 	{
 		$flags[$i] =0;
 		$allocation[$i] =-1;

 	}

  $bno=$nb;
  $bsize=$b;
  $pno=$np;
  $psize=$p;
   for($i = 1; $i <= $pno; $i++)
 		for($j = 1; $j <= $bno; $j++)
 			if($flags[$j] == 0 && $bsize[$j] >= $psize[$i])
 		  {
        $allocation[$j] = $i;
 				$flags[$j] = 1;
 				break;

  }
    echo "  <table class='table table-dark' align='left' border='1' cellpadding='3' cellspacing='0'>
        <thead>
          <tr bgcolor='#979797'>

            <th scope='col'>Block no</th>
            <th scope='col'>Block size</th>
            <th scope='col'>Process no</th>
            <th scope='col'>Process size</th>
            <th scope='col'>Fragment</th>

          </tr>
        </thead> ";

  for($i = 1; $i <= $bno; $i++)
 	{  echo"<tr>";
 	    echo("<td> $i </td>  <td> $bsize[$i]</td>");
    if($flags[$i] == 1)
      {
        $temp=$allocation[$i];
        $frag1=$bsize[$i]-$psize[$temp];
      echo("<td> $allocation[$i] </td>  <td> $psize[$temp] </td>  <td> $frag1 </td><br>");    }
   		else{

            echo "<span style='color: red;'' /><td style='color: red;'>Not allocated </td> <td> -</td> <td>- </td> <br></span>";
      }
   echo("</tr>");
 	}

  echo"</table>";
  echo "<br><br><br><br><br>";
}


if($fit1=='3'){
  echo("<br><center><input type='text' id='cc' value='Worst Fit' text-align:center disabled='disabled' size='10'> </center><br><br><br>");
  $fragments=array();
        $blocks=array();
        $files=array();
        $flags=array();
        $top = 0;
        $block_arr=array();
        $file_arr=array();
        $po=array();
         $number_of_blocks=$nb;
         $number_of_files=$np;

        for($m = 1; $m <= $number_of_blocks; $m++)
          {
              $block_arr[$m]=0;
                $file_arr[$m] = 0;
                $flags=0;
                $po[$m]=$m;
          }
          for($m = 1; $m <= $number_of_files; $m++)
            {
                  $file_arr[$m] = 0;
            }


         $blocks=$b;
      for($i=1; $i<=$number_of_blocks; $i++)
      {
          for($j=$i+1; $j<=$number_of_blocks; $j++)
          {
              if($blocks[$i] < $blocks[$j])
              {
                  $tmp = $blocks[$i];
                  $blocks[$i] = $blocks[$j];
                  $blocks[$j] = $tmp;
                  $temp1=$po[$i];
                  $po[$i]=$po[$j];
                  $po[$j]=$temp1;

              }
          }
       }

        $files=$p;
        for($m = 1; $m <= $number_of_files; $m++)
        {
                $flag3=0;
              for($n = 1; $n <= $number_of_blocks; $n++)
              {
                    if($block_arr[$n] != 1)
                    {
                          $temp = $blocks[$n] - $files[$m];
                          if($temp >= 0&& $flag3==0)
                          {

                                if($top < $temp)
                                {
                                      $file_arr[$m] =$po[$n];
                                       $top = $temp;
                                       $block_arr[$n] = 1;
                                      $flag3=1;
                                }
                          }
                    }
                    $fragments[$n] = $top;
                    $temp=$file_arr[$m];
                    $top = 0;

              }
        }
                echo "<table class='table table-dark' align='left' border='1' cellpadding='3' cellspacing='0'>
            <thead>
              <tr bgcolor='#979797'>

                <th scope='col'>Process no</th>
                <th scope='col'>Process size</th>
                <th scope='col'>Block no</th>
                <th scope='col'>Block size</th>
                <th scope='col'>Fragment</th>

              </tr>
            </thead> ";

        for($m = 1; $m <= $number_of_files; $m++)
         {
             $temp=$file_arr[$m];
              echo "<tr>";
              echo ("<td>$m </td> <td> $files[$m] </td> " );
        if($temp==0){
                          echo"<span style='color: red;' /> <td style='color: red;'>Not allocated</td><td>-</td><td>-</td</span>";
                          $temp=-1;
                      }
            else {
                    $frag=$blocks[$temp]-$files[$m];
              echo (" <td> $file_arr[$m] </td> <td> $blocks[$temp] </td> <td> $frag</td>");

              }
             echo"</tr>";
            }
              echo"</table>";

        echo "<br>";

}

   ?>
