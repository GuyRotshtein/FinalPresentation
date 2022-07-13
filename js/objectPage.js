
   // adding new task       
   const arrClasses = ['taskInfo','checkBoxDone','taskTime','userControl'];
   const divContent = ['Take barkley for a walk','Feed Barkley', 'Take barkley for a walk','Feed Barkley',
                     'Make sure to give Barkley his medicine', 'Take barkley for a walk'];
   const timeTask   = ['07:00 - 07:30','08:30 - 09:00', '18:30 - 19:00', '18:30 - 19:00', '19:00 - 19:15',
                     '19:15 - 19:45'];
    
   //add new status 
   const divStatusContent = ['Kibble 25kg food bag', 'Simba quality snacks bag', 'Medical pills (in my notes)'];
   const timeStatus   = ['3 Days ago', '25 Days', '44 Days'];







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
    createNewEvent(dateDefaultColor, `my ass`, `today`, `12:00-13:00`, `mark my`)
  );
  
  takesDiv.appendChild(generateAddEvent());