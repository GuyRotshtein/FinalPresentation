const addZero = (number) => (number / 10 < 1 ? `0${number}` : number);

const setClock = (user = `user`) => {
    const time = new Date();
    const clockWidget = document.getElementsByClassName("timeWidget")[0];
    document.getElementsByClassName("clockWidget")[0].innerHTML = `${addZero(
      time.getHours()
    )}:${addZero(time.getMinutes())}`;
    if (time.getHours() < 12) clockWidget.innerHTML = `Good Morning, ${user}`;
    if (time.getHours() > 12) clockWidget.innerHTML = `Good Evening, ${user}`;
  };

export { addZero, setClock };