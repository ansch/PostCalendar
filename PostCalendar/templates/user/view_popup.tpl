{* $Id: postcalendar_user_view_popup.htm 639 2010-06-30 22:16:08Z craigh $ *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>{$loaded_event.title}</title>
<link rel="stylesheet" href="{$stylepath}/style.css" type="text/css" />
<link rel="stylesheet" href="modules/PostCalendar/pnstyle/popupstyle.css" type="text/css" />
</head>
<body>
{assign var="popup" value=true}
{include file="event/view.tpl"}
</body>
</html>