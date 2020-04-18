let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");

let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

let monthAndYear = document.getElementById("monthAndYear");
let calendar = {};


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


    for(let i in json){
        let shift = json[i]
        let thisCell = calendar[shift.date];

        if(thisCell === undefined)
            continue;

        thisCell.innerHTML = shift.type.name;
    }


}

