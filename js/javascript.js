window.onload = () =>{
    myFunct();
    
    // adding time 
    var time = new Date();
    var clockWidget = document.getElementsByClassName("timeWidget")[0];
    document.getElementsByClassName("clockWidget")[0].innerHTML = innerHTML=time.getHours() + ":" + time.getMinutes();
    
    if (time.getHours() < 12) {
        clockWidget.innerHTML = "Good Morning";
    }
    
    if (time.getHours() > 12) {
        clockWidget.innerHTML = "Good Evning";
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

        let defaultDate = "orginalColor";
        let closeDate = "todayTaskColor";
        let missedDate = "missedTaskColor";

        if(diffYears == 0){
            if(diffMonth > 0){
                taskStyle(defaultDate, orginalPath, status,d,info,fromTo);        
            }else if (diffMonth == 0){
                if(diffDays == 0){
                    taskStyle(closeDate, todayPath,status,d,info,fromTo);
                    if(fromTo){
                        d.textContent = "Today at: "
                    }
                }else if(diffDays < 0){
                    taskStyle(missedDate, missedPath, status,d,info,fromTo);
                }else{
                    if(diffDays == 1){
                        if(fromTo){
                            d.textContent = "Tomorrow at: ";
                        }
                    }
                    taskStyle(defaultDate, orginalPath, status,d,info,fromTo);          
                }
            }else{
                taskStyle(missedDate, missedPath, status,d,info,fromTo);
            }
        }else if(diffYears > 0){
            taskStyle(defaultDate, orginalPath, status,d,info,fromTo);           
        }else{
            taskStyle(missedDate, missedPath, status,d,info,fromTo);
        }
    }
} 

//add style to icon,date,from-to 
function taskStyle(style,path,status,d,info,fromTo){
    status.setAttribute("d",path);
    status.classList.add(style);
    d.classList.add(style);
    info.classList.add(style);
    if(fromTo){
        fromTo.classList.add(style);
    }           
}