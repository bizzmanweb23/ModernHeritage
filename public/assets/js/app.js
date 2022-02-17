$(function() {

    $('#calendar').fullCalendar({
      defaultView: 'agendaDay',
      groupByResource: true,
      resources: [
        { id: 'a', title: 'Cindy' },
        { id: 'b', title: 'Mindy' },
        { id: 'c', title: 'Poltu' },
        { id: 'd', title: 'Laltu' },
        { id: 'e', title: 'Hadu' },
        { id: 'f', title: 'Chungi'},
        { id: 'g', title: 'Minku' },
        { id: 'h', title: 'Twinkle' },
        { id: 'i', title: 'Demmy' },

      ],
      dayClick: function(date) {

        //alert('Clicked on: ' + date.format());
       $('#modalTitle').html(date.format());
       //$('#modalBody').html(date.format());
       //$('#eventUrl').attr('href',date.format());
       $('#calendarModal').modal();

     },
     
     eventClick: function(event, jsEvent, view) {
           $('#modalTitle').html(event.title);
           $('#modalBody').html(event.description);
           $('#eventUrl').attr('href',event.url);
           $('#calendarModal').modal();
     },
     
    //  defaultDate: '2022-02-10',
     navLinks: true, // can click day/week names to navigate views
     editable: true,
     eventLimit: true, // allow "more" link when too many events
    
   });

 });