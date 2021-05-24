<?php
    include_once("navigation.php");
	include_once "php/config.php";
    $sql = mysqli_query($conn, "select * from category");
?>
<center><h2>ADD NEW CATEGORY</h2></center>

<center><form action="" class="form-horizontal" method="post" name="myForm" id="formpurchase">
<br>
<div class="form-group pt-2">
            
          <div class="form-group">
          	<h4 class="text-center"></h4>
          	<br>
          	<div class="row ml-2">
          		<div class="col-md-2">
	            	
	        	</div>
	        	
	        	<div class="col-md-3">
	        		<input type="text" class="form-control" id="cat" name="cat" placeholder="Category">
	        	</div>
	        	<div class="col-md-3">
	        		<input type="text" class="form-control" id="catcode" name="catcode" placeholder="Category Code: Eg. cpu">
	        	</div>
	        	<div class="col-md-1">
	        		<button type="submit" class="btn btn-primary" id="addcomponent" name="add">Add to Category</button>
	        	</div>

				<br><br>
              	<br><br>
          		<div class="col-sm-offset-2 col-md-9 text-center">
    			<table class="table table-hover">
                    <tr>
                        <th>Category_ID</th>
                        <th>Category</th>
						<th>Category Code</th>
                    </tr>

                    <?php
                        while($row = mysqli_fetch_array($sql))  
                        {  
                                echo '<tr>
                                <td>'.$row['category_id'].'</td>
                                <td>'.$row['category'].'</td>
								<td>'.$row['category_code'].'</td>
                                </tr>';
                        }
                    ?>
                </table>
	            </div>



            </div>
          </div>
          
			</form></center><br><br><br>

<?php
    include_once("footer.php");
?>
<script>
	const form=document.querySelector("#formpurchase"),
	continueBtn1=form.querySelector("#addcomponent"),
	continueBtn2=form.querySelector("#addcpu");
	// errorText = form.querySelector(".error-text");


	continueBtn1.onclick = (e)=>{

	e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/addcategory.php", true);
    console.log(xhr.response);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              console.log(data);
			  if(data === "success"){
					alert("New Category has been added Successfully!!");
					document.getElementById("cat").value="";
					document.getElementById("catcode").value="";
			  }
			  else{
					alert(data);
			  }
          }
      }
    
    }
    let formData = new FormData(form);
    xhr.send(formData);
    
    }

</script>	
</body>
</html>
