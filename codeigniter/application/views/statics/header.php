<html>
<head>
	<title><?php echo isset($page_title)? $page_title: "pomo board"; ?></title>
	<link href="/css/style.css" rel="stylesheet" type="text/css">
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
		h1 {
			color: #444;
			background-color: transparent;
			/* border-bottom: 1px solid #D0D0D0; */
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		.header {
			background-color: #00ff00;
		}
		.header_cell {
			font-size: 24px;
			border:  solid silver;
		}
	</style>
</head>
<body>
<div class="header">
	<table>
		<tr>
			<td class="header_cell">
				<a href="/"> Home </a>
			</td>
			<?php if($this->User->logined()): ?>
				<td class="header_cell">
					<select class="selectpicker" style="color: black">
					  	<option>Project</option>
						<option>Project Tag</option>
					</select>
					<!-- a href="<?php echo site_url('project/explore') ?>"> Project </a> -->
				</td>
			<?php endif; ?>
			<?php if($this->User->logined())
			{
			?>
				<td class="header_cell">
					<a href="<?php echo site_url('/task/explore') ?>"> Task </a>
				</td>
			<?php
			}
			?>
			<?php if(! $this->User->logined())
			{
			?>
				<td class="header_cell">
					<a href="<?php echo site_url('/user/sign_up') ?>"> Sign Up </a>
				</td>
				<td class="header_cell">
					<a href="<?php echo site_url('/user/login') ?>"> Login </a>
				</td>
			<?php
			}
			?>
			<?php if($this->User->logined())
			{
			?>
				<td class="header_cell">
					<a href="<?php echo site_url('/user/logout') ?>"> Logout </a>
				</td>
			<?php
			}
			?>
		</tr>
	</table>
</div>