const addZero =(number)=>number/10<1? `0${number}`:number

const time = new Date();
    const clockWidget = document.getElementsByClassName("timeWidget")[0];
    document.getElementsByClassName("clockWidget")[0].innerHTML =`${time.getHours()}:${addZero(time.getMinutes())}`;

    const url  = window.location.href

    if (time.getHours() < 12) clockWidget.innerHTML = "Good Morning User";
    if (time.getHours() > 12) clockWidget.innerHTML = "Good Evning User"; 
