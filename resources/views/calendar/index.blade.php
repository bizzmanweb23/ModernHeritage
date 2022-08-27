@extends('frontend.admin.layouts.master')
@section('content')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>MindFusion JsPlanner Sample - Timetable view</title>
    <link href="common/samples.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="themes/light.css" />
    <style type="text/css">
        #datePicker .mfp-bg-cell.mfp-selection .mfp-bg-cell-header
        {
            background-color: #d4d4d4;
        }
    </style>
</head>
<body>
    <div id="header" style="height: 99px;">
        <div style="float: left; margin-left: 5px;">
            <a href="index.html" style="margin-left: 10px;">Index</a> &nbsp; Dates<div id="datePicker"
                style="height: 20px; display: inline-block; margin-bottom: 10px">
            </div>
            Orientation&nbsp;<select id="orientation">
                <option value="0">Horizontal</option>
                <option value="1">Vertical</option>
            </select>
            Cell size&nbsp;<input id="cellSize" maxlength="2" size="2" />
            Cell time&nbsp;<select id="cellTime">
                <option value="10">10 minutes</option>
                <option value="30">30 minutes</option>
                <option value="60">1 hour</option>
                <option value="90">1 hour 30 minutes</option>
                <option value="180">3 hours</option>
            </select>
            Reverse grouping&nbsp;<input id="reverseGrouping" type="checkbox" />
            <button onclick="group(1)">
                Group by contacts</button>
            <button onclick="group(3)">
                Group by locations</button>
            <button onclick="group(0)">
                Clear grouping</button>
        </div>
        <div style="float: right; margin-right: 5px;">
            <a href="Timetable.js" style="margin-right: 10px;">View source</a>
            <button id="expandButton" onclick="onExpandCollapse()">
                &rsaquo;
            </button>
        </div>
    </div>
    <div id="info" style="top: 110px; bottom: 24px;">
        <div id="infoTab" style="padding: 10px;">
            <h1>
                About this sample</h1>
            <p>
                This sample shows the capabilities of the Timetable view.
                <br />
                This view displays one or more days, divided in arbitrary time intervals. Additionaly
                it can be grouped by location, task, contact or resource. The vertical timetable
                displays one column for each date or resource, and the horizontal timetable displays
                a row for each.
                <br />
                Use the TimetableSettings property of the Calendar class to set the appearance of
                the timetable view.
            </p>
        </div>
    </div>
    <div id="content" style="top: 110px; bottom: 24px;">
        <div style="position: absolute; width: 100%; height: 100%;">
            <div id="calendar" style="height: 100%; width: 100%;">
            </div>
        </div>
    </div>
    <div id="footer" style="height: 24px;">
        <span id="copyright"></span>
    </div>
    <script src="MindFusion.Scheduling.js" type="text/javascript"></script>
    <script src="Timetable.js" type="text/javascript"></script>
    <script type="text/javascript" src="common/samples.js"></script>
</body>
</html>
@endsection
/// <reference path="MindFusion.Scheduling-vsdoc.js" /> 
<script>

var p = MindFusion.Scheduling;

// create a new instance of the calendar
calendar = new p.Calendar(document.getElementById("calendar"));

// set the view to Timetable, which displays the allotment of resources to distinct hours of a day
calendar.currentView = p.CalendarView.Timetable;

calendar.theme = "light";
calendar.contactNameFormat = "L";

var resource;

// Add some contacts to the schedule.contacts collection.
resource = new p.Contact();
resource.firstName = "Emmy";
resource.lastName = "Noether";
calendar.schedule.contacts.add(resource);

resource = new p.Contact();
resource.firstName = "Ernest";
resource.lastName = "Henley";
calendar.schedule.contacts.add(resource);

resource = new p.Contact();
resource.firstName = "Jeffrey";
resource.lastName = "Goldstone";
calendar.schedule.contacts.add(resource);

resource = new p.Contact();
resource.firstName = "Francesco";
resource.lastName = "Iachello";
calendar.schedule.contacts.add(resource);

// Add some locations to the schedule.locations collection.
resource = new p.Location();
resource.name = "Oxford";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "Harvard";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "Tokyo";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "Paris";
calendar.schedule.locations.add(resource);

// group the calendar
group(p.GroupType.GroupByContacts);

// render the calendar control
calendar.render();

datePicker = new p.Calendar(document.getElementById("datePicker"));
datePicker.currentView = p.CalendarView.List;
datePicker.theme = "light";
datePicker.listSettings.visibleCells = datePicker.listSettings.numberOfCells = 30;
datePicker.listSettings.headerStyle = p.MainHeaderStyle.None;
datePicker.useForms = false;
datePicker.selectionEnd.addEventListener(handleSelectionEnd);
datePicker.render();

function handleSelectionEnd(sender, args) {
	var startDate = args.startTime;
	var endDate = args.endTime;

	// show the selected date range in the timetable
	calendar.timetableSettings.dates.clear();
	while (startDate < endDate) {
		calendar.timetableSettings.dates.add(startDate);
		startDate = p.DateTime.addDays(startDate, 1);
	}
}

document.getElementById("orientation").value = calendar.timetableSettings.orientation;
document.getElementById("orientation").onchange = function () {
	calendar.timetableSettings.orientation = +document.getElementById("orientation").value;
	document.getElementById("orientation").value = calendar.timetableSettings.orientation;
}

document.getElementById("cellSize").value = calendar.timetableSettings.cellSize;
document.getElementById("cellSize").onchange = function () {
	calendar.timetableSettings.cellSize = +document.getElementById("cellSize").value || 25;
	document.getElementById("cellSize").value = calendar.timetableSettings.cellSize;
}

document.getElementById("cellTime").value = calendar.timetableSettings.cellTime.minutes;
document.getElementById("cellTime").onchange = function () {
	calendar.timetableSettings.cellTime = p.TimeSpan.fromMinutes(+document.getElementById("cellTime").value || 30);
	document.getElementById("cellTime").value = calendar.timetableSettings.cellTime.minutes;
}

document.getElementById("reverseGrouping").checked = calendar.timetableSettings.reverseGrouping;
document.getElementById("reverseGrouping").onchange = function () {
	calendar.timetableSettings.reverseGrouping = +document.getElementById("reverseGrouping").checked;
	document.getElementById("reverseGrouping").checked = calendar.timetableSettings.reverseGrouping;
}


function group(value) {
	calendar.contacts.clear();
	if (value == p.GroupType.GroupByContacts) {
		// add the contacts by which to group to the calendar.contacts collection
		calendar.contacts.addRange(calendar.schedule.contacts.items());
	}
	calendar.locations.clear();
	if (value == p.GroupType.GroupByLocations) {
		// add the locations by which to group to the calendar.locations collection
		calendar.locations.addRange(calendar.schedule.locations.items());
	}
	calendar.groupType = value;
}
</script>
