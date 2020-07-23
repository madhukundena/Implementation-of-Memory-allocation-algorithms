<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Memory allocation Algorithms</title>
<style>
body {
  background-color: #E6B0AA;

}
table, th, td {
 border: 0px solid black;
 border-collapse: collapse;
 text-align:center;
}
</style>

 <script type="text/javascript">
  function array1(){
  //alert("called");
  var i = 1;
  var n1=document.getElementById("n1").value;
  var n2=document.getElementById("n2").value;
    my_div.innerHTML ="";
    my_div1.innerHTML ="";
    if(n1&&n2)
    {
  for(i=1;i<=n1;i++)
  {
     my_div1.innerHTML +="<br>P :"+i+" <input type='text' name='l"+ i +"' required> <br>"
  }


  for(i=1;i<=n2;i++)
  {
    my_div.innerHTML +="<br>B: "+i+" <input type='text' name='b"+ i +"' required> <br>"
  }
}




    }
</script>
</head>
<body>
 <br>
  <form action="f2.php" method="POST" name="form1" onsubmit="document.form1.target='f2'; return true;">
  <h2 style="color:red;" align="center" font-family="Arial" > Implementation of memory Allocation Algorithms </h2>
&emsp;&emsp;&emsp;<label style="color:blue;"><b>  Select the fit:</b></label>
  <select  name="fit">
  <option>-select fit-</option>
  <option value="1" selected>First Fit</option>
  <option value="2" >best Fit</option>
  <option value="3" >worst Fit</option>
  </select>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

<label style="color:blue;"><b>No of process</b></label>
<input type="text" Id="n1" name="n1" value="" placeholder="enter the n" oninput="array1()" required><br> <br>

&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label style="color:blue;"><b>No of blocks </b></label>
 <input type="text" Id="n2" name="n2" value="" placeholder="enter the n" oninput="array1()" required><br> <br>

<table style="width:100%">
<tr>
  <th style="color:#7E5109 ">Blocks:</th><th style="color:#6E2C00 ">Process:</th>
</tr>
<tr>
<td>
<div id="my_div">
</div>
</td>
<td>
<div id="my_div1">
</div>
</td>
</tr>
</table>

</body>

  <br><br><br>
  <center>
  <input type="submit" name="" value="simulate" > &emsp;&emsp;
  <input type="reset" >
</center>
  </form>
</body>
</html>
