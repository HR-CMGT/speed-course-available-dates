// date element ophalen
let dataElement = document.getElementById("date");

// if the date is changed
dataElement.addEventListener("change", addAvailableDatesToDropdown)

async function addAvailableDatesToDropdown(element) {
    // retrieve the selected date
    let selectedDate = element.target.value;
    let timeDropDown = document.getElementById('time');

    // retrieve available dates via a ajax request
    let response = await fetch("available_dates.php?date="+selectedDate)
    // retrieve the json result
    const json = await response.json();

    // empty the dropdown if someone selects a different date. Otherwise the dropdown will keep on expanding
    timeDropDown.innerHTML = '';

    // add all available dates to the dropdown
    for(let item of json) {
        let optionElement = document.createElement('option')
        optionElement.setAttribute('value', item)
        optionElement.innerHTML = item

        timeDropDown.appendChild(optionElement)
    }
}










