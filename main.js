(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('#calendar').fullCalendar({
        googleCalendarApiKey: 'AIzaSyAMdAKe1QdTiRUpW8oLZAfkLTGzz3NhUfM',
        events: {
            googleCalendarId: 'csescholarsum@gmail.com'
        }
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space