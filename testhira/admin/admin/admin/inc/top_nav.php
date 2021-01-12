<div class="nav_menu">
	
    <ul class="menu">
    	<li><a href="dashboard.php">Dashboard</a></li>
        
        <li><a href="#">Enquiry</a>
        	<ul>
            	<li><a href="quick_enquiry_list.php">Quick Enquiry</a></li>
                <li><a href="how_to_join_enquiry_list.php">How to Join Enquiry</a></li>
                <li><a href="career_enquiry_list.php">Career Enquiry</a></li>
            </ul>
        </li>


        <?php if ($fetch_u_details['criteria']=='1'){ ?>
		<li><a href="#">ADMIN</a>
        	<ul>
            	<li><a href="add_users_page.php">Add Users</a></li>
                <li><a href="add_users_list.php">Users List</a></li>
            </ul>
        </li>
        <?php } ?>

    </ul>
    
    <div class="clear"></div>
    
</div>