 // adding time 
 const addZero =(number)=>number/10<1? `0${number}`:number

const myHeader = ()=>{

//  document.querySelector(`header`).innerHTML = ` <a class="topLogo" href="./#"><img src="./images/logo.png"></a>
//  <h1>ManaPet</h1>
//  <h4 class="brudCrumbs">Your logistics assistant for the pet's daily life </h4>
//  <div class="statusBox">
//      <span class="clockWidget">Local time</span>
//      <br>
//      <span class="timeWidget"> good day, user </span>
//      <img src="./images/greg.png">
//  </div>
//  <nav>
//      <a href="./homePage.php">Home Page</a>
//      <a href="./Listpage.php"  class="selected">My Pets</a>
//      <a href="#">Events</a>
//      <a href="#">Calendar</a>
//      <a href="#">Logistics</a>
//  </nav>
//  <input class="searchInput" type="text" placeholder="Search">
//  <svg class="menuHumburger" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
//      <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
//  </svg>`

    const time = new Date();

    const clockWidget = document.getElementsByClassName("timeWidget")[0];
    document.getElementsByClassName("clockWidget")[0].innerHTML =`${addZero(time.getHours())}:${addZero(time.getMinutes())}`;

const url  = window.location.href

    if (time.getHours() < 12) {
        clockWidget.innerHTML = "Good Morning, Greg";
    } if (time.getHours() > 12) {
        clockWidget.innerHTML = "Good Evning, Greg";
    }
   
}
export default myHeader
    // jquery 
    // $(document).ready(function(){

    //     $(".menuHumburger").click(function(){
    //       $(".humburger").show();
    //     });
    // });

////////////////////////////////////////////

