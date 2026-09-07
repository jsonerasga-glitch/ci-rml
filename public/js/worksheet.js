function generateWorksheet(){
    let objects_url = {
        'ElectronicBalance' : "/worksheets/ElectronicBalance",
    };
    let idOfCertificate = $('#idOfCertificate').val();
    $.ajax({
        cache: false,
        type: "post",
        url: objects_url['ElectronicBalance'],
        data: {
            'idOfCertificate' : idOfCertificate,
        },
        success: function(result) {
            console.log(result)
        },
        error: function (error) {
            console.log(error);
        },
    })
}






