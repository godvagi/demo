<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dreamhome";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

 $qry="SELECT * FROM branch";
 $result=mysqli_query($conn, $qry);


 $records = array();

 while($row = mysqli_fetch_assoc($result)){
	$records[] = $row;
  }

?>
<div class="container">	
	<div class="row" style="height:300px">
						<table id="branch" class="table table-bordered">
				<thead>
					<tr class="warning">
						<th>Branch No./th>
						<th>Street/th>
						<th>Salary</th>
						<th>age</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($records as $rec):?>
					<tr>
						<td><?php echo $rec['branchno']?></td>
						<td><?php echo $rec['street']?></td>
						<td><?php echo $rec['city']?></td>
						<td><?php echo $rec['postcode']?></td>
					</tr>
					<?php endforeach; ?>
					</tbody>
					</table>
</div>
	<div class="row">
		<div class="btn-group pull-center" style=" padding: 10px;">
			<div class="dropdown">
  <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
     <span ></span> Export

  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   		 <li><a href="#" onclick="$('#branch').tableExport({type:'json',escape:'false'});">  JSON</a></li>
	     <li><a href="#" onclick="$('#branch').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">JSON (ignoreColumn)</a></li>
		 <li><a href="#" onclick="$('#branch').tableExport({type:'json',escape:'true'});"> JSON (with Escape)</a></li>
		 <li><a href="#" onclick="$('#branch').tableExport({type:'xml',escape:'false'});"> XML</a></li>
		 <li><a href="#" onclick="$('#branch').tableExport({type:'sql'});"> SQL</a></li>
		
		<li><a href="#" onclick="$('#branch').tableExport({type:'csv',escape:'false'});">  CSV</a></li>
		<li><a href="#" onclick="$('#branch').tableExport({type:'txt',escape:'false'});"> 
	
       <li><a href="#" onclick="$('#branch').tableExport({type:'excel',escape:'false'});"> XLS</a></li>
		<li><a href="#" onclick="$('#branch').tableExport({type:'doc',escape:'false'});"> Word</a></li>
		<li><a href="#" onclick="$('#branch').tableExport({type:'powerpoint',escape:'false'});">  PowerPoint</a></li>
	
		<li><a href="#" onclick="$('#branch').tableExport({type:'png',escape:'false'});"> 
		<li><a href="#" onclick="$('#branch').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});">  PDF</a></li>

  </ul>
</div>
		</div>
	</div>

</div>

</body>
</html>
<script type="text/javascript">
$(function(){
	$('#example').DataTable();
      });
</script>
