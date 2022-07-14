
const createTaskBackdrop = () => {
    const backdrop = document.createElement("span");
    backdrop.classList.add(`taskBackdrop`);
    return backdrop;
  };
  
  const createTaskInfo = (color, taskDescription) => {
    const taskInfo = document.createElement("div");
    taskInfo.classList.add(`taskInfo`);
    taskInfo.style.color = color;
    taskInfo.textContent = taskDescription;
    return taskInfo;
  };
  
  const createCheckBox = (checkBoxText) => {
    const markDone = document.createElement("div");
    markDone.classList.add(`checkBoxDone`);
    const checkbox = document.createElement(`input`);
    checkbox.type = `checkbox`;
    markDone.appendChild(checkbox);
    const text = document.createElement(`span`);
    text.textContent = checkBoxText;
    markDone.appendChild(text);
    return markDone;
  };
  
  const createTaskTime = (color, Date, time) => {
    const taskTime = document.createElement("div");
    taskTime.classList.add(`taskTime`);
    const taskDate = document.createElement(`h5`);
    taskDate.style.color = color;
    taskDate.textContent = Date;
    taskTime.appendChild(taskDate);
    const taskDuration = document.createElement(`h5`);
    taskDuration.style.color = color;
    taskDuration.textContent = time;
    taskTime.appendChild(taskDuration);
    return taskTime;
  };
  
  const createUserControl = () => {
    const userControl = document.createElement("div");
    userControl.classList.add(`userControl`);
    const edit = document.createElement(`a`);
    edit.textContent = `edit`;
    edit.href = `#`;
    userControl.appendChild(edit);
    const remove = document.createElement(`a`);
    remove.textContent = `remove`;
    remove.href = `#`;
    userControl.appendChild(remove);
    return userControl;
  };
  
  const createNewEvent = (color, taskDescription, date, time, checkBoxText) => {
    const newEvent = document.createElement("div");
    newEvent.classList.add(`newTask`);
    newEvent.appendChild(createTaskBackdrop());
    newEvent.appendChild(createTaskInfo(color, taskDescription));
    newEvent.appendChild(createCheckBox(checkBoxText));
    newEvent.appendChild(createTaskTime(color, date, time));
    newEvent.appendChild(createUserControl());
    return newEvent;
  };
  
  const generateAddEvent = () => {
    const addEvent = document.createElement(`div`);
    addEvent.classList.add(`addEntry`);
    const link = document.createElement(`a`);
    link.href = `./addPetPage.html`;
    const add = document.createElement(`img`);
    add.src = "./images/icons/Add_an_essential_1.png";
    link.appendChild(add);
    addEvent.appendChild(link);
    return addEvent;
  };
  const dateMissedColor = "#BD362F";
  const dateCloseColor = "#FFA834";
  const dateDefaultColor = "#383838";
  
  const takesDiv = document.getElementsByClassName("tasks")[0];
  takesDiv.appendChild(
    createNewEvent(dateDefaultColor, `my ass`, `today`, `12:00-13:00`, `mark is done`)
  );

takesDiv.appendChild(generateAddEvent());