window.onload = () =>{
    myFunct();
    // adding time 
    var time = new Date();
    var clockWidget = document.getElementsByClassName("timeWidget")[0];
    document.getElementsByClassName("clockWidget")[0].innerHTML = innerHTML=time.getHours() + ":" + time.getMinutes();
    
    if (time.getHours() < 12) {
        clockWidget.innerHTML = "Good Morning,";
    }
    
    if (time.getHours() > 12) {
        clockWidget.innerHTML = "Good Evning,";
    }
}

// this function checking difference between task date and the current date
// after checking difference adding style for every special event
var myFunct = () =>{

    var len = document.getElementsByClassName("newEvent").length;
    var orginalPath = "M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z";
    var todayPath = "M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z";
    var missedPath = "M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z";

    
    for(i = 0 ; i < len; i++){

        var eventDate = document.getElementsByClassName("getDate")[i].textContent;
        eventDate = new Date(eventDate);

        var today = new Date();
        var currentDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        currentDate =new Date(currentDate);

        var diffDays = eventDate.getDate() - currentDate.getDate(); 
        var diffMonth = eventDate.getMonth() - currentDate.getMonth(); 
        var diffYears = eventDate.getFullYear() - currentDate.getFullYear(); 

        var status = document.getElementsByClassName("path")[i];
        var d = document.getElementsByClassName("getDate")[i];
        var info = document.getElementsByClassName("getInfo")[i];
        var fromTo = document.getElementsByClassName("fromTo")[i];

        //check how many days end replacement task
        if(!fromTo){
            var year = diffYears * 365;
            var month = diffMonth * 30;
            result = year + month + diffDays;
            if(result > 1){
                d.textContent = "End in : " + result + " days";
            }else if(result == 1){
                d.textContent = "End Tomorrow";
            }else if(result == 0){
                d.textContent = "End Today";
            }else{
                result = result * -1;
                d.textContent = "End before : " + result + " days";
            }
        }

        if(diffYears == 0){
            if(diffMonth > 0){
                orginalDate(orginalPath, status,d,info,fromTo);        
            }else if (diffMonth == 0){
                if(diffDays == 0){
                    todayTask(todayPath,status,d,info,fromTo);
                    if(fromTo){
                        d.textContent = "Today at: "
                    }
                }else if(diffDays < 0){
                    missedTask(missedPath, status,d,info,fromTo);
                }else{
                    if(diffDays == 1){
                        if(fromTo){
                            d.textContent = "Tomorrow at: ";
                        }
                    }
                    orginalDate(orginalPath, status,d,info,fromTo);          
                }
            }else{
                missedTask(missedPath, status,d,info,fromTo);
            }
        }else if(diffYears > 0){
            orginalDate(orginalPath, status,d,info,fromTo);           
        }else{
            missedTask(missedPath, status,d,info,fromTo);
        }

    }
} 

//add black style to icon,date,from-to 
function orginalDate(path,status,d,info,fromTo){
    status.setAttribute("d",path);
    status.classList.add("orginalColor");
    d.classList.add("orginalColor");
    info.classList.add("orginalColor");
    if(fromTo){
        fromTo.classList.add("orginalColor");
    }    
}

//add yellow style to icon,date,from-to 
function todayTask(path,status,d,info,fromTo){
    status.setAttribute("d",path);
    status.classList.add("todayTaskColor");
    d.classList.add("todayTaskColor");
    info.classList.add("todayTaskColor");    
    if(fromTo){
        fromTo.classList.add("todayTaskColor");
    }            
}

//add red style to icon,date,from-to 
function missedTask(path,status,d,info,fromTo){
    status.setAttribute("d",path);
    status.classList.add("missedTaskColor");
    d.classList.add("missedTaskColor");
    info.classList.add("missedTaskColor");
    if(fromTo){
        fromTo.classList.add("missedTaskColor");
    }          
}

    // // adding new task       
    // let arrClasses = ['taskInfo','checkBoxDone','taskTime','userControl'];
    // let divContent = ['Take barkley for a walk','Feed Barkley', 'Take barkley for a walk','Feed Barkley',
    //                   'Make sure to give Barkley his medicine', 'Take barkley for a walk'];
    // let timeTask   = ['07:00 - 07:30','08:30 - 09:00', '18:30 - 19:00', '18:30 - 19:00', '19:00 - 19:15',
    //                   '19:15 - 19:45'];
              
    // for(let l = 0; l < 6; l++){
    //     let newTaksDiv = document.createElement("div");
    //     let spanElement = document.createElement("span");

    //     newTaksDiv.classList.add('newTask');
    //     spanElement.classList.add('taskBackdrop');
    //     document.getElementsByClassName("tasks")[0].appendChild(newTaksDiv)
    //     newTaksDiv.appendChild(spanElement);

    //     for(let i = 0; i < 4; i++){

    //         let newDiv = document.createElement("div");
    //         newDiv.classList.add(arrClasses[i]); 
    //         newTaksDiv.appendChild(newDiv);

    //         if(i == 0){
    //             newDiv.innerHTML = divContent[l];
    //             newTaksDiv.appendChild(newDiv);
    //             if (l == 0){
    //                 newDiv.style.color = '#BD362F';
    //             }else if (l == 1){
    //                 newDiv.style.color = '#FFA834';
    //             }else{
    //                 newDiv.style.color = '#383838';
    //             }
    //         }
    //         if(i == 1){
    //             let checkBoxInput = document.createElement("input");
    //             let checkBoxDoneElement = document.createElement("span");
    //             checkBoxInput.setAttribute("type", "checkbox");
    //             checkBoxDoneElement.innerHTML = 'Mark as done'; 
    //             newDiv.appendChild(checkBoxInput);
    //             newDiv.appendChild(checkBoxDoneElement);

    //         }
    //         if(i == 2){
    //             for(let j =0; j < 2; j++){
    //                 let h5 = document.createElement("h5");
    //                 newDiv.appendChild(h5);

    //                 // add a content for h5 element 
    //                 if(j == 0){
    //                     h5.innerHTML = 'Today at:';                        
    //                 }else{
    //                     h5.innerHTML = timeTask[l];                                              
    //                 }

    //                 // add color for h5 element, the default color giving from css file
    //                 if (l == 0){
    //                     h5.style.color = '#BD362F';
    //                 }else if (l == 1){
    //                     h5.style.color = '#FFA834';
    //                 }
                    
    //             }
    //         }
    //         if(i == 3){
    //             let aContent = ['edit', 'remove'];
    //             for(let k =0; k < 2; k++){
    //                 let a = document.createElement("a");
    //                 var link = document.createTextNode(aContent[k]);
    //                 a.href = '#';
    //                 a.appendChild(link); 
    //                 newDiv.appendChild(a);
    //             }
    //         }
    //     }
    // }
  
    // //add new status 
    // let divStatusContent = ['Kibble 25kg food bag', 'Simba quality snacks bag', 'Medical pills (in my notes)'];
    // let timeStatus   = ['3 Days ago', '25 Days', '44 Days'];

    // for(let l = 0; l < 6; l++){
    //     let newTaksDiv = document.createElement("div");
    //     let spanElement = document.createElement("span");

    //     newTaksDiv.classList.add('newTask');
    //     spanElement.classList.add('taskBackdrop');
    //     document.getElementsByClassName("status")[0].appendChild(newTaksDiv)
    //     newTaksDiv.appendChild(spanElement);

    //     for(let i = 0; i < 4; i++){

    //         let newDiv = document.createElement("div");
    //         newDiv.classList.add(arrClasses[i]); 
    //         newTaksDiv.appendChild(newDiv);

    //         if(i == 0){
    //             newDiv.innerHTML = divStatusContent[l];
    //             newTaksDiv.appendChild(newDiv);
    //             if (l == 0){
    //                 newDiv.style.color = '#BD362F';
    //             }else{
    //                 newDiv.style.color = '#383838';
    //             }
    //         }
    //         if(i == 1){
    //             let checkBoxInput = document.createElement("input");
    //             let checkBoxDoneElement = document.createElement("span");
    //             checkBoxInput.setAttribute("type", "checkbox");
    //             checkBoxDoneElement.innerHTML = 'Mark as refilled'; 
    //             newDiv.appendChild(checkBoxInput);
    //             newDiv.appendChild(checkBoxDoneElement);

    //         }
    //         if(i == 2){
    //             for(let j =0; j < 2; j++){
    //                 let h5 = document.createElement("h5");
    //                 newDiv.appendChild(h5);

    //                 // add a content for h5 element 
    //                 if(j == 0){
    //                     h5.innerHTML = 'Ends in:';                        
    //                 }else{
    //                     h5.innerHTML = timeStatus[l];                                              
    //                 }

    //                 // add color for h5 element, the default color giving from css file
    //                 if (l == 0){
    //                     h5.style.color = '#BD362F';
    //                 }
    //             }
    //         }
    //         if(i == 3){
    //             let aContent = ['edit', 'remove'];
    //             for(let k =0; k < 2; k++){
    //                 let a = document.createElement("a");
    //                 var link = document.createTextNode(aContent[k]);
    //                 a.href = '#';
    //                 a.appendChild(link); 
    //                 newDiv.appendChild(a);
    //             }
    //         }

    //         if(l > 2){
    //             if(l == 3){
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

    // jquery 
    // $(document).ready(function(){

    //     $(".menuHumburger").click(function(){
    //       $(".humburger").show();
    //     });
    // });
