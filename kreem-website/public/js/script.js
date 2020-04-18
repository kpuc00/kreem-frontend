let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");

let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

let monthAndYear = document.getElementById("monthAndYear");
let calendar = {};

let shiftIcons = {
    Morning : '🌄',
    Noon : '🌞',
    Night : '🌙',
}

showCalendar(currentMonth, currentYear);



function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function goTo() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}

function showCalendar(month, year) {
    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    let currentDay = new Date(year, month);
    let lastDay = new Date(currentDay);

    lastDay.setMonth(lastDay.getMonth()+1);
    refreshCalendarFromAPI(currentDay);


    let tbl = document.getElementById("calendar-body"); // body of the calendar
    // clearing all previous cells
    tbl.innerHTML = "";
    calendar={};

    let row = document.createElement("tr");

    let spaces = (currentDay.getDay() + 6) % 7;
    for(let i = 0; i< spaces; i++){
        row.appendChild(document.createElement('td'));
    }

    while(currentDay < lastDay){
        let currentCell = document.createElement("td");
        let dateKey = dateToISO(currentDay);

        calendar[dateKey] = currentCell;

        currentCell.textContent = currentDay.getDate().toString();
        currentCell.setAttribute('data-date', dateToISO(currentDay));
        currentCell.setAttribute('data-isShiftAssigned', 'false');

        row.appendChild(currentCell);
        if(currentDay.getDay() === 0){
            tbl.appendChild(row);
            row = document.createElement("tr");
        }
        currentDay.setDate(currentDay.getDate()+1);
    }
        tbl.appendChild(row);
}

//

function dateToISO(date){
    return [date.getFullYear(),
        (date.getMonth() +1 >9 ? '' : '0') + (date.getMonth() + 1),
        (date.getDate()>9 ? '' : '0') + date.getDate()
    ].join('-');
}

async function refreshCalendarFromAPI(date){
    const response = await fetch('/json/schedule/' + dateToISO(date));
    const json = await response.json();


    json.forEach( shift => {
        let thisCell = calendar[shift.date];

        if(thisCell === undefined)
            return;

        setCellForShift(thisCell, shift);
    });
}

function assignedShift_MouseOver ( event ) {
    let icon = createIcon('😷');
    icon.addEventListener('click', callIn);
    event.target.innerHTML = '';
    event.target.appendChild(icon);

}

function setCellForShift(cell, shift){
    cell.innerHTML = '';
    cell.setAttribute('data-isShiftAssigned', 'true');
    cell.setAttribute('data-shiftId', shift.id);

    let icon;
    if(shift.callIn === null){
        icon = createIcon(shiftIcons[shift.type.name]);
        icon.addEventListener("mouseenter", assignedShift_MouseOver);
        icon.addEventListener("mouseleave", () => setCellForShift(cell, shift) );

    }else{
        icon = createIcon('😷');
        icon.setAttribute('title', 'You already called in sick');
        icon.setAttribute('data-toggle', 'tooltip');
        $(icon).tooltip();
    }

    cell.appendChild(icon);

}


function createIcon(text){
    let icon = document.createElement('h2');
    icon.textContent = text;
    icon.style.cursor = 'pointer';
    return icon;
}


async function callIn(event){
    let shiftId = event.target.parentElement.getAttribute('data-shiftId')

    let reason = prompt('Give reason (Personal, Sick, Other)');

    let response = await fetch(`/json/shifts/${shiftId}/callins`, {
        method: 'POST',
        headers: {'content-type': 'application/json'},
        body:JSON.stringify({reason})
    });

    if(response.ok){
        alert('You have called in sick');
    }else{
        alert('Something went wrong, please try again');
    }
}
