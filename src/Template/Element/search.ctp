<div id="search_area" class="col_12 column">
			<form class="horizontal" method="POST" action="<?php echo $this->request->webroot;?>jobs/browse">
				<input id="keywords" type="text" placeholder="Enter Keywords..." name="keywords">
				<select id="state_select" name="states">
					<option>Select State</option>
				  <option value="AP">Andhra Pradesh</option>
					<option value="AR">Arunachal Pradesh</option>
					<option value="AS">Assam</option>
					<option value="BR">Bihar</option>
					<option value="CT">Chattisgarh</option>
					<option value="DL">Delhi</option>
					<option value="GA">Goa</option>
					<option value="GJ">Gujarat</option>
					<option value="HR">Haryana</option>
					<option value="HP">Himachal Pradesh</option>
					<option value="JK">Jammu Kashmir</option>
					<option value="JH">Jharkand</option>
					<option value="KA">Karnataka</option>
					<option value="KL">Kerala</option>
					<option value="MP">Madhya Pradesh</option>
					<option value="MH">Maharashtra</option>
					<option value="MN">Manipur</option>
					<option value="ML">Meghalaya</option>
					<option value="MZ">Mizoram</option>
					<option value="NL">Nagaland</option>
					<option value="OR">Odisha</option>
					<option value="PB">Punjab</option>
					<option value="RJ">Rajasthan</option>
					<option value="SK">Sikkim</option>
					<option value="TN">Tamil Nadu</option>
					<option value="TS">Telangana</option>
					<option value="TR">Tripura</option>
					<option value="UP">Uttar Pradesh</option>
					<option value="UK">Uttarakhand</option>
					<option value="WB">West Bengal</option>
				</select>
				<select id="category_select" name="category">
					<option>Select Category</option>
					<?php  foreach ($categories as $category) { ?>
					<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
					<?php   }  ?>
				</select>
				<button type="submit">Submit</button>
			</form>
		</div>