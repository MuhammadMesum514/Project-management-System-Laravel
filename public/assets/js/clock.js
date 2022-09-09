const deg= 6;
const hor = document.querySelector('#hor');
const mn = document.querySelector('#mn');
const sc = document.querySelector('#sc');


setInterval(() => {
  //For Islamabad time difference is 5.0 hrs so
// city_time_diff=5.0; //change according to your city
// let time_now = Date.now();
// time_now = time_now + (3600000 * city_time_diff); //Add our city time (in msec);

// let day = new Date();
    var b=new Date();
    var offset='5.0';
		var utc=b.getTime()+(b.getTimezoneOffset()*60000);
		var day=new Date(utc+(3600000*offset));

// day=day.toLocaleDateString('en-US', { timeZone: 'America/New_York' });

let hh = day.getHours() * 30;
let mm = day.getMinutes() * deg;
let ss = day.getSeconds() * deg;

hor.style.transform = `rotateZ(${(hh)+(mm/12)}deg)`;
mn.style.transform = `rotateZ(${mm}deg)`;
sc.style.transform = `rotateZ(${ss}deg)`;
});

$(document).ready(function(){
    $(".datetime").hide();
    $(".dig").click(function(){
      $(".clock").hide();
      $(".datetime").show();
    });
    $(".analog").click(function(){
        $(".datetime").hide();
        $(".clock").show();
      });
  });