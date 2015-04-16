<?php
function create_events_calendar($month,$year,$dateArray) {

if ("$month"=="12") {
    $upmonth=1;
}
else {
    $upmonth=$month+1;
}

if ("$month"=="12") {
    $upyear=$year+1;
}
else {
    $upyear=$year;
}

if ("$month"=="1" || "$month"=="01") {
    $downmonth=12;
}
else {
    $downmonth=$month-1;
}

if ("$month"=="1" || "$month"=="01") {
    $downyear=$year-1;
}
else {
    $downyear=$year;
}

//array holding of days of week.
$daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

//first day of the month 
$firstDayOfMonth = mktime(0,0,0,$month,1,$year);

//all the days of each month
$numberDays = date('t',$firstDayOfMonth);

//information about the first day of the month
$dateComponents = getdate($firstDayOfMonth);

//name of month
$monthName = $dateComponents['month'];

//name of day
$dayOfWeek = $dateComponents['wday'];

//table tag opener and day headers
$calendar = "<table style='table-layout: fixed;' border='1' width='100%' height='650px'>";
$calendar .="<caption><h2><a href='index.php?month=$downmonth&year=$downyear'><</a> $monthName $year <a href='index.php?month=$upmonth&year=$upyear'>></a></h2><BR></caption>";
$calendar .="<tr>";

//displays the days of the week in the top table
foreach($daysOfWeek as $day) {
    $calendar .= "<th class='header'>$day</th>";
}

//display calendar, starting with the 1st day of the .
$currentDay = 1;
$calendar .= "</tr><tr>";

//if days of the week is greater than 0 (7), then it displays correctly.
if ($dayOfWeek > 0) {
    $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
}

while ($currentDay <= $numberDays) {
    if ($dayOfWeek == 7) {
        $dayOfWeek = 0;
        $calendar .= "</tr><tr>";
}

$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
$date = "$year-$month-$currentDayRel";

if ("$num_rows"=="0") {
    $events="";
}
else if ("$num_rows"=="1") {
    $events="1 Event Scheduled";
}
else {
    $events="$num_rows Events Scheduled";
}

$calendar .= "<td style='text-align:left;vertical-align:top' width='(100/7)%' class='day' rel='$date'><B><big>$currentDay</big></b><BR><br><a href='#content$currentDay' class='inline'>$events</a></td>";

if ("$num_rows"!="0") {

//create div to show events
echo "<div style='display:none'>";
echo "<div id='content$currentDay' style='padding:10px; background:#fff;'>";

$query = "SELECT * FROM calendar WHERE theatre='$_COOKIE[theatre]' AND month='$month' AND day='$currentDay' AND year='$year' AND status='active' ORDER BY start ASC";

$result = mysql_query($query);
if(mysql_num_rows($result)!=0) {
    $current=1;
        echo "<big><Big><big><b><i><center>$monthName $currentDay, $year</center></big></i></big></big></b><BR><BR>";
    while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{

$time_in_12_hour_format1  = DATE("g:i a", STRTOTIME("$row[start]"));
$time_in_12_hour_format2  = DATE("g:i a", STRTOTIME("$row[end]"));

echo "<big><Big><b>$row[title]</big></big></b><BR>";

if ("$row[all_day]"=="yes") {
    echo "<b>Time:</b> All Day<BR>";
}
else {
    echo "<b>Time:</b> $time_in_12_hour_format1 to $time_in_12_hour_format2<BR>";
}

if ("$_COOKIE[level]" <= "3" && "$_COOKIE[level]" != "") {
    echo "<a href='calendaredit.php?type=edit&id=$row[id]'>Click to edit the above event</a><BR>";
}


if ("$num_rows"=="$current") {
}
else {
    echo "<hr>";
}

$current++;

}
}

echo "</div>";
echo "</div>";

}

//Increment counters
$currentDay++;
$dayOfWeek++;
}

//Complete the row of the last week in month, if necessary
if ($dayOfWeek != 7) {
    $remainingDays = 7 - $dayOfWeek;
    $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
}
    $calendar .= "</tr>";
    $calendar .= "</table>";
    return $calendar;
}

?> 

<?php

if (isset($_GET[month]) && isset($_GET[year])) {
    echo create_events_calendar($_GET[month],$_GET[year],$dateArray);
}
else {
     $dateComponents = getdate();
     $month = $dateComponents['mon'];
     $year = $dateComponents['year'];
    echo create_events_calendar($month,$year,$dateArray);
}
?>
