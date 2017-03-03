<% if AddOns %>
	<% loop AddOns %>
		<tr>
			<td></td>
			<td>	
				<small class="add-on"> + $Name</small>
			</td>
			<td><small>$Price.Nice</small></td>
			<td></td>
		</tr>
	<% end_loop %>
<% end_if %>
