function getCurrentDate() {
    var now = new Date();
    var dd = now.getDate();
    if (dd < 10) {
        dd = '0' + dd;
    }
    var mm = now.getMonth() + 1;
    if (mm < 10) {
        mm = '0' + mm;
    }
    var yyyy = now.getFullYear();

    return yyyy + '-' + mm + '-' + dd;
}

function getCurrentTime() {
    var now = new Date();
    var hh = now.getHours();
    if (hh < 10) {
        hh = '0' + hh;
    }
    var mm = now.getMinutes();
    if (mm < 10) {
        mm = '0' + mm;
    }

    return hh + ':' + mm;
}