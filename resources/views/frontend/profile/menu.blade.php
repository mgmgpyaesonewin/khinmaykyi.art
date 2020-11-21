<style>
	.dashboard_list a:hover{
		background-color: #fc846b;
  color: #fff;
  width: 100%;
  padding: 20px;
  margin: 10px;
  z-index: 3;
  border-radius: 3px;
	}
</style>
	<h4><strong>My Account</strong></h4>
	<hr>
	<ol style="list-style: none;">
		<li class="dashboard_list"><a href="/profile"><i class="icon-dashboard"></i>  Dashboard</a></li>
		<br>
		<li class="dashboard_list"><a href="profile/order"><i class="fas fa-calendar-week"></i>  Orders</a></li>
		<br>
		<li class="dashboard_list"><a href="/wishlist"><i class="icon-heart"></i>  Wishlist</a></li>
		<br>
		<li class="dashboard_list"><a href="/profile/account"><i class="fas fa-address-card"></i>  Profile</a></li>
		<br>
		<li class="dashboard_list"><a href="{{ route('logout') }}"><i class="fas fa-key"></i>  Logout</a></li>
	</ol>