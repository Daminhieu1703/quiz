function editQuiz(element, id, name, duration_minutes, start_time, end_time, status, is_shuffle) {
    var start_time1 = moment(start_time).format('YYYY-MM-DD');
    var start_time2 = moment(end_time).format('YYYY-MM-DD');
    document.getElementById('id').value = id;
    document.getElementById('dateStart').value = start_time1;
    document.getElementById('dateEnd').value = start_time2;
    document.getElementById('nameQuiz').value = name;
    document.getElementById('timeQuiz').value = duration_minutes;
    document.getElementById('status').value = status;
    document.getElementById('is_shuffle').value = is_shuffle;
}