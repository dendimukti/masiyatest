<!DOCTYPE html>
<html>
<style type="text/css">
.status {
	color: white;
    width: 75px;
    height: 35px;
    margin:auto;  
    border-radius: 35px;
    text-align: center;
	line-height: 35px;
}

body {
	font-family: "Lato", sans-serif;
	width: 750px;
	color: #444444;
}

td{
  border-left: none;
  border-right: none;
  border-bottom: 1px solid #d0d0d0;
}

th{
  border-left: none;
  border-right: none;
  border-bottom: none;
  border-top: none;
}

ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #ffffff;
    color: #444444;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: #bebebe;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
    width:125px;
    background-color: #e8e8e8;
}

/* Change background color of links on hover */
ul.tab li a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
	color: #fbfdfe;
    background-color: #2ebcd2;
}

/* Style the tab content */
.tabcontent {
    display: none;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
}

@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}
</style>
<body>
<pre>
<?php //print_r($array); ?>
</pre>
<ul class="tab">
  <li><div style="width:436px;"><font size="6px">Person</font></div></li>
  <li><a href="#" class="tablinks" onclick="opentab(event, 'bycity')">By City</a></li>
  <li><a href="#" class="tablinks" onclick="opentab(event, 'bydept')">By Department</a></li>
</ul>


<div id="bycity" class="tabcontent">
	<table cellspacing="0" cellpadding="10" width="100%">
		<tr bgcolor='#2ebcd2' style='color: #fff;'>
			<th>Name</th>
			<th>City</th>
			<th>Department</th>
			<th></th>
		</tr>
		<?php	
		
			$bycity = array();
			foreach($array['data']['row'] as $data){
				if (!in_array($data['field'][3], $bycity))
					$bycity[]=$data['field'][3];
			}		
			foreach($bycity as $city){
				echo "<tr bgcolor='#25adc2' style='color: #fff;' align='left'><th colspan='4'><b>".$city."</b></th></tr>";	
				foreach($array['data']['row'] as $data){
					if($city==$data['field'][3]){
						echo 
						"<tr>
							<td>".$data['field'][1]."<br>
							<font color='#ababab' size='2'>".$data['field'][2]."</font></td>
							<td>".$data['field'][3]."</td>
							<td>".$data['field'][5]."</td>
							<td>";
							if($data['field'][7]==1)
								echo "<div class='status' style='background-color:#659330;'>Masuk</div>";
							else if($data['field'][7]==2)
								echo "<div class='status' style='background-color:#d74456;'>Cuti</div>";
							else if($data['field'][7]==3)
								echo "<div class='status' style='background-color:#9b9b9b;'>Libur</div>";
							echo "</td>
						</tr>";
					}
				}
			}
		?>
	</table>
</div>

<div id="bydept" class="tabcontent">
	<table cellspacing="0" cellpadding="10" width="100%">
		<tr bgcolor='#2ebcd2' style='color: #fff;'>
			<th>Name</th>
			<th>City</th>
			<th>Department</th>
			<th></th>
		</tr>
		<?php	
			$bydept = array();
			foreach($array['data']['row'] as $data){
				if (!in_array($data['field'][5], $bydept))
					$bydept[]=$data['field'][5];
			}		
			foreach($bydept as $dept){
				echo "<tr bgcolor='#25adc2' style='color: #fff;' align='left'><th colspan='4'><b>".$dept."</b></th></tr>";	
				foreach($array['data']['row'] as $data){
					if($dept==$data['field'][5]){
						echo 
						"<tr>
							<td>".$data['field'][1]."<br>
							<font color='#ababab' size='2'>".$data['field'][2]."</font></td>
							<td>".$data['field'][3]."</td>
							<td>".$data['field'][5]."</td>
							<td>";
							if($data['field'][7]==1)
								echo "<div class='status' style='background-color:#659330;'>Masuk</div>";
							else if($data['field'][7]==2)
								echo "<div class='status' style='background-color:#d74456;'>Cuti</div>";
							else if($data['field'][7]==3)
								echo "<div class='status' style='background-color:#9b9b9b;'>Libur</div>";
							echo "</td>
						</tr>";
					}
				}
			}
		?>
	</table>
</div>

<script>
function opentab(evt, byParam) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(byParam).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
     
</body>
</html> 


