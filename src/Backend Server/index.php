<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	
 	
	    .app:link{
	        color:#203E74;
	        font-size:13pt;
	        text-decoration:none;
	    }
	   .app:visited{
	        color:#203E74;
	        font-size:13pt;
	        text-decoration:none;
	    }
	    
	   .app:hover{
	        color:#000000;
	        font-size:14pt;
	        text-decoration:none;
	    }
	    
	    
	    
	      a:link{
	        color:#ffffff;
	        font-size:13pt;
	        text-decoration:none;
	        }
	      a:visited{
	        color:#ffffff;
	        font-size:13pt;
	        text-decoration:none;
	       }
	    
	      a:hover{
	        color:#ffffff;
	        font-size:14pt;
	        text-decoration:none;
	    }
	</style>
</head>
<body >
<table border='0' width="100%" align="center"   >
    <tr >
        <td align="center">
            
         <div style="color:#000000; font-size:12pt" >	This system protoype is developed for research purpose only</div>   
        </td>
    </tr>
 <tr height="120px" >
     <td>
     <table border="0">
         <tr>
             <td><img src="images/logo.jpg" width="100px" align="left"/></td>
              <td>	<h2 style="color:#203E74" >On the Exploitation of GPS-based Data for Real-time Visualization of Pedestrian Dynamics in Open Environments</h2> 
 
 	<div style="color:#203E74; font-size:18pt" >	To Organize Successful Events </div></td>
             
         </tr>
     </table>
     
 
 	
 	
 	</td>
 </tr>
 <tr height="30px" style="background-color:#203E74">
 	<td>   &nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php">Home </a>  |  
      &nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php?page=dataset">Real Data Set </a> </td>
 </tr>
 <tr height="400px"  >	<td align="left" valign="top">
     <?php
     
     $page1=$_GET["page"];
     $page1=$page1.".php";
     if(is_file($page1))
     include($page1);
     else
       include("main.php");
     
     
     ?>
     
 	</td>
 </tr>
 <tr height="30px" style="background-color:#203E74" >
 	<td align="center"><div style=" color:#ffffff">Copyright &copy  2020   Ahmed Alia, Mohammed Maree and Mohcine Chraibi.  All Rights Reserved. </div></td>
 </tr>
</table>
<!--style=" background-color:#F58833" -->
</body>
</html>