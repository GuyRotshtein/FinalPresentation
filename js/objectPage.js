// adding new task
// const arrClasses = ["taskInfo", "checkBoxDone", "taskTime", "userControl"];
// const divContent = [
//   "Take barkley for a walk",
//   "Feed Barkley",
//   "Take barkley for a walk",
//   "Feed Barkley",
//   "Make sure to give Barkley his medicine",
//   "Take barkley for a walk",
// ];
// const timeTask = [
//   "07:00 - 07:30",
//   "08:30 - 09:00",
//   "18:30 - 19:00",
//   "18:30 - 19:00",
//   "19:00 - 19:15",
//   "19:15 - 19:45",
// ];
//
// //add new status
// const divStatusContent = [
//   "Kibble 25kg food bag",
//   "Simba quality snacks bag",
//   "Medical pills (in my notes)",
// ];
// const timeStatus = ["3 Days ago", "25 Days", "44 Days"];

// for(let l = 0; l < 6; l++){
//     const newTaksDiv = document.createElement("div");
//     const spanElement = document.createElement("span");

//     newTaksDiv.classList.add('newTask');
//     spanElement.classList.add('taskBackdrop');
//     document.getElementsByClassName("tasks")[0].appendChild(newTaksDiv)
//     newTaksDiv.appendChild(spanElement);

//     for(let i = 0; i < 4; i++){
//         const newDiv = document.createElement("div");
//         newDiv.classList.add(arrClasses[i]);
//         newTaksDiv.appendChild(newDiv);

//         if(i === 0){
//             newDiv.innerHTML = divContent[l];
//             newTaksDiv.appendChild(newDiv);
//             if (l === 0){
//                 newDiv.style.color = '#BD362F';
//             }else if (l === 1){
//                 newDiv.style.color = '#FFA834';
//             }else{
//                 newDiv.style.color = '#383838';
//             }

//         }if (i == 1){
//             const checkBoxInput = document.createElement("input");
//             const checkBoxDoneElement = document.createElement("span");
//             checkBoxInput.setAttribute("type", "checkbox");
//             checkBoxDoneElement.innerHTML = 'Mark as done';
//             newDiv.appendChild(checkBoxInput);
//             newDiv.appendChild(checkBoxDoneElement);

//         }
//         if (i === 2){
//             for(let j =0; j < 2; j++){
//                 const h5 = document.createElement("h5");
//                 newDiv.appendChild(h5);

//                 // add a content for h5 element
//                 if(j === 0){
//                     h5.innerHTML = 'Today at:';
//                 }else{
//                     h5.innerHTML = timeTask[l];
//                 }
//                 // add color for h5 element, the default color giving from css file
//                 if (l === 0){
//                     h5.style.color = '#BD362F';
//                 }else if (l === 1){
//                     h5.style.color = '#FFA834';
//                 }

//             }
//         }
//         if (i === 3){
//             const aContent = ['edit', 'remove'];
//             for(let k =0; k < 2; k++){
//                 const a = document.createElement("a");
//                 const link = document.createTextNode(aContent[k]);
//                 a.href = '#';
//                 a.appendChild(link);
//                 newDiv.appendChild(a);
//             }
//         }
//     }
// }
// for(let l = 0; l < 6; l++){
//     const newTaksDiv = document.createElement("div");
//     const spanElement = document.createElement("span");

//     newTaksDiv.classList.add('newTask');
//     spanElement.classList.add('taskBackdrop');
//     document.getElementsByClassName("status")[0].appendChild(newTaksDiv)
//     newTaksDiv.appendChild(spanElement);

//     for(let i = 0; i < 4; i++){

//         const newDiv = document.createElement("div");
//         newDiv.classList.add(arrClasses[i]);
//         newTaksDiv.appendChild(newDiv);

//         if(i === 0){
//             newDiv.innerHTML = divStatusContent[l];
//             newTaksDiv.appendChild(newDiv);
//             if (l === 0){
//                 newDiv.style.color = '#BD362F';
//             }else{
//                 newDiv.style.color = '#383838';
//             }
//         }
//         if(i == 1){
//             const checkBoxInput = document.createElement("input");
//             const checkBoxDoneElement = document.createElement("span");
//             checkBoxInput.setAttribute("type", "checkbox");
//             checkBoxDoneElement.innerHTML = 'Mark as refilled';
//             newDiv.appendChild(checkBoxInput);
//             newDiv.appendChild(checkBoxDoneElement);

//         }
//         if(i === 2){
//             for(let j =0; j < 2; j++){
//                 const h5 = document.createElement("h5");
//                 newDiv.appendChild(h5);

//                 // add a content for h5 element
//                 if(j === 0){
//                     h5.innerHTML = 'Ends in:';
//                 }else{
//                     h5.innerHTML = timeStatus[l];
//                 }

//                 // add color for h5 element, the default color giving from css file
//                 if (l === 0){
//                     h5.style.color = '#BD362F';
//                 }
//             }
//         }
//         if(i === 3){
//             const aContent = ['edit', 'remove'];
//             for(let k =0; k < 2; k++){
//                 let a = document.createElement("a");
//                 let link = document.createTextNode(aContent[k]);
//                 a.href = '#';
//                 a.appendChild(link);
//                 newDiv.appendChild(a);
//             }
//         }

//         if(l > 2){
//             if(l === 3){
//                 let imageElement = document.createElement("img");
//                 imageElement.classList.add('plusIcon');
//                 imageElement.src = './images/icons/Add_an_essential_1.png';
//                 newTaksDiv.appendChild(imageElement);
//             }
//             spanElement.classList.add('taskBackdrop');
//             newTaksDiv.appendChild(spanElement);
//         }
//     }

// }
import myHeader from "./myHeader.js";
import data from "./mokeData.js";

myHeader(`listPage`);

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

const calcColor = (deadline) => {
  const now = new Date().getTime();
  if (now >= deadline) return dateMissedColor;
  if (deadline - now <= singleDay) return dateCloseColor;
  return dateDefaultColor;
};
const improveDate = (date) => {
  const now = new Date().getTime();
  const eventTimeValue = new Date(date);
  if (now >= eventTimeValue) return `today at`;
  if (now + singleDay >= eventTimeValue) return `tomorrow at`;
  return date;
};

const singleDay = 86400000;

const addEvent = (parentName, data, checkBoxText) => {
  const eventPerPage = 6;
  let currentPage = 0;
  const maxPage = Math.floor(data.length / eventPerPage);
  const nextBtn = document.getElementById(`${parentName}Next`);
  const prevBtn = document.getElementById(`${parentName}Prev`);
  if (maxPage > 0) nextBtn.classList.remove(`tableEnd`);

  nextBtn.addEventListener(`click`, (e) => {
    e.preventDefault();
    if (currentPage === maxPage) return nextBtn.classList.remove(`tableEnd`);
    prevBtn.classList.remove(`tableEnd`);
    currentPage++;
    parentElement.innerHTML = ``;
    renderEvents();
  });
  prevBtn.addEventListener(`click`, (e) => {
    e.preventDefault();
    if (currentPage === 0) return prevBtn.classList.add(`tableEnd`);
    nextBtn.classList.remove(`tableEnd`);
    currentPage--;
    parentElement.innerHTML = ``;
    renderEvents();
  });
  const parentElement = document.getElementsByClassName(parentName)[0];

  const sortData = data.sort(
    (a, b) =>
      new Date(a.task_deadline).getTime() - new Date(b.task_deadline).getTime()
  );
  const renderEvents = () => {
    const viableEvents = sortData.slice(
      eventPerPage * currentPage,
      eventPerPage * (currentPage + 1)
    );

    viableEvents.forEach((event) => {
      const eventTimeValue = new Date(event.task_deadline);
      parentElement.appendChild(
        createNewEvent(
          calcColor(eventTimeValue),
          event.information,
          improveDate(event.task_deadline),
          `${event.from}:${event.to}`,
          checkBoxText
        )
      );
    });
    if (data.length - currentPage * eventPerPage < eventPerPage)
      parentElement.appendChild(generateAddEvent());
  };
  renderEvents();
};

const addOwners = (ownerNames) => {
  const ownerList = document.getElementsByClassName(`ownersList`)[0];
  ownerList.innerHTML = ``;
  ownerNames.forEach((ownerName) => {
    const markup = `<div class="owner">
    <h4>${ownerName}</h4>
    <h3>Details</h3>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle"
         viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
    </svg>
</div>`;
    ownerList.insertAdjacentHTML(`afterbegin`, markup);
  });
};
const ownerData = [`idan`, `guy`, `mohamad`, `bob`];
addOwners(ownerData);
addEvent(`tasks`, data, `mark as done`);
//tasks, status