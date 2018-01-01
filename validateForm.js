function validateForm() {
    var dateInput = document.getElementById('dateInput').value;

    // Wstępna walidacja formatu tekstuw polu
    if (!dateInput.match("^[0-9]{4}-[0-9]{2}-[0-9]{2}$")) {
        alert("Podana data nie jest zgodna z formatem RRRR-MM-DD.");
        return false;
    }

    var year = parseInt(dateInput.substring(0, 4));
    var month = parseInt(dateInput.substring(5, 7));
    var day = parseInt(dateInput.substring(8, 10));

    // Walidacja daty, sprawdzamy czy nie zostały wpisane nieistniejące daty
    if (
        year < 0
        || month > 12
        || month < 0
        || day < 0
        || day > 31
        || (month === 2 && (year % 4 === 0 && year % 100 !== 0) && day > 29)
        || (month === 2 && year % 4 !== 0 && day > 28)
        || ((month === 4 || month === 6 || month === 9 || month === 11) && day > 30)
    ) {
        alert("Podana data nie istnieje.");
        return false;
    }
}