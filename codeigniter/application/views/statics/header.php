<html>
<head>
	<title><?php echo isset($page_title)? $page_title: "TaskBoard"; ?></title>
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
			<td class="header_cell">
				<a href="<?php echo site_url('/task/explore') ?>"> Task </a>
			</td>
			<td class="header_cell">
				<a href="/"> Sign Up </a>
			</td>
			<td class="header_cell"> Log in </td>
		</tr>
	</table>
</div>