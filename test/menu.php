<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<nav class='navbar navbar-inverse'>
<div class='container-fluid'>
<!-- Brand and toggle get grouped for better mobile display -->
<div class='navbar-header'>
<div class='btn-group'>
<button type='button' class='btn btn-success dropdown-toggle navbar-btn' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
<span class='glyphicon glyphicon-th'></span> www.code-father.com <span class='caret'></span>
</button>

<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
<span class='sr-only'>Toggle navigation</span>
<span class='icon-bar'></span>
<span class='icon-bar'></span>
<span class='icon-bar'></span>
</button>

<ul class='dropdown-menu'>
<li><a href='shop.php'>How to use.</li>
<li><a href='user.php'>Register</a></li>
<li><a href='password.php'>Contact Us</a></li>
<li role='separator' class='divider'></li>
<li><a href='#'>PHP Article</a></li>
</ul>
</div>

</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>

<ul class='nav navbar-nav' style='font-weight:bold;'>

<li <?php if($nav=='1') echo 'class=\'active\'';?>><a href='member.php?nav=1'><span class='glyphicon glyphicon-cog'></span> MEMBER</a></li>
<li <?php if($nav=='2') echo 'class=\'active\'';?>><a href='member_info.php?nav=2'><span class='glyphicon glyphicon-cog'></span> MEMBER_INFO</a></li>
<li <?php if($nav=='3') echo 'class=\'active\'';?>><a href='order_details.php?nav=3'><span class='glyphicon glyphicon-cog'></span> ORDER_DETAILS</a></li>
<li <?php if($nav=='4') echo 'class=\'active\'';?>><a href='orders.php?nav=4'><span class='glyphicon glyphicon-cog'></span> ORDERS</a></li>
<li <?php if($nav=='5') echo 'class=\'active\'';?>><a href='products.php?nav=5'><span class='glyphicon glyphicon-cog'></span> PRODUCTS</a></li>
</ul>

<button type='button' class='btn btn-danger navbar-btn navbar-right' onclick="window.location.href = 'index.php';"><span class='glyphicon glyphicon-home'></span> Home </button>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>


