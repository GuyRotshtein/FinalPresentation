    const time = new Date();

    const clockWidget = document.getElementsByClassName("timeWidget")[0];
    document.getElementsByClassName("clockWidget")[0].innerHTML =`${time.getHours()}:${addZero(time.getMinutes())}`;

const url  = window.location.href

    if (time.getHours() < 12) {
        clockWidget.innerHTML = "Good Morning, Greg";
    } if (time.getHours() > 12) {
        clockWidget.innerHTML = "Good Evning, Greg";
    }