<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8"/>
	<title>[Панель Администратора CI CMS] - <?= $page_title ?></title>
<style type="text/css">
<!--
	p,td {
	   font-family: Verdana, Arial, sans-serif;
       font-size: 13px;
	}
    
    .h a {
        padding: 10px 10px;
        color: white;
        text-decoration: none;
    }
    
    .h a:visited {
        color: white;
        text-decoration: none;
    }
    
    .h a:hover {
        color: white;
        text-decoration: underline overline;
    }
    
    a {
        padding: 10px 10px;
        text-decoration: none;
    }
    
    a:visited {
        text-decoration: none;
    }
    
    a:hover {
        text-decoration: underline;
    }
    
    h1 {
        color: #cc0000;
        font-size: 18px;
        font-family: Verdana, Arial, sans-serif;
    }
    
    .tshapka {
        color: white;
        background-color: #336699;
    }
    
    .tshapka a {
        color: white;
    }
    
    #hd {
        background-image: url(<?= base_url() ?>img/topbkg.jpg);
        background-repeat: no-repeat;
        -webkit-background-size: 100%;
    }
-->
</style>

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginheght="0" marginwidth="0" bgcolor="#ffffff">

<div align="center">
	<table border="0" id="hd" width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td width="50%"><img src="<?= base_url() ?>img/toplogo.gif" width="142" height="95"/></td>
			<td width="50%"><p align="right"><img src="<?= base_url() ?>img/topright.gif" width="327" height="66"/></p></td>
		</tr>
	</table>

	<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000">
		<tr>
			<td width="100%"><font color="#bbc0f0" face="Arial" size="2"><b class="h">&nbsp;&nbsp; |&nbsp;&nbsp; <?= anchor('',
"Главная") ?>&nbsp;&nbsp; |&nbsp;&nbsp; <?= anchor('contact',
"Обратная связь") ?>&nbsp;&nbsp; |&nbsp;&nbsp; <?= anchor('admin',
"Вход") ?>&nbsp;&nbsp; |</b></font></td>
		</tr>
	</table>

    <div align="left">
    	
    	<h1><?= $page_title ?></h1>
    
    </div>
    
    <div align="center">
