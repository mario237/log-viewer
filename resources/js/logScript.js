let codeEditor = $("#codeEditor");
let lineCounter = $("#lineCounter");
let lastIndexOfLines = 0;
let currentCursor = 0;


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#viewLogBtn").on('click', function () {
    currentCursor = 0;
    clearTextArea()
    getChunkOfLines();
});


$("#nextBtn").on('click', function () {
    if (currentCursor < lastIndexOfLines) {
        currentCursor++;
        clearTextArea();
        getChunkOfLines();
    } else {
        showAlert('info', 'You show end of file already');
    }
});

$("#previousBtn").on('click', function () {
    if (currentCursor > 0) {
        currentCursor--;
        clearTextArea();
        getChunkOfLines();
    } else {
        showAlert('info', 'You show begin of file already');
    }

});

$("#beginBtn").on('click', function () {
    currentCursor = 0;
    clearTextArea();
    getChunkOfLines();
});

$("#endBtn").on('click', function () {
    clearTextArea();
    getChunkOfLines(true);
});


function clearTextArea() {
    codeEditor.val('')
    lineCounter.val('')
}


function getChunkOfLines(endOfFile = null) {
    let filePath = $("#filePath").val();

    $.ajax({
        type: 'POST',
        url: "/log-view",
        data: {path: filePath, cursor: currentCursor, endOfFile: endOfFile},
        success: function (response) {

            if (response.success) {
                hideAlerts();

                let lineCount = response.data.lines.length;
                currentCursor = response.data.current_cursor;
                lastIndexOfLines = response.data.last_index;
                let counts = [];
                let linesData = [];


                let lineNumber = (currentCursor * 10) + 1;

                for (let x = 0; x < lineCount; x++) {
                    counts[x] = lineNumber;
                    linesData[x] = response.data.lines[x];
                    lineNumber++;
                }
                currentCursor = response.data.current_cursor;
                lineCounter.val(counts.join('\n'));
                codeEditor.val(linesData.join('\n'));


            } else {
                showAlert('error', response.message);
            }
        },
        error: function (error) {
            console.log(error)
        }
    });
}


function hideAlerts() {
    $("#errorAlert").addClass('d-none');
    $("#infoAlert").addClass('d-none');
}


function showAlert(type, message) {
    let errorAlert = $("#errorAlert");
    let infoAlert = $("#infoAlert");

    if (type === 'error') {
        errorAlert.text(message)
        errorAlert.removeClass('d-none');
    } else if (type === 'info') {
        infoAlert.text(message)
        infoAlert.removeClass('d-none');
    }
}



