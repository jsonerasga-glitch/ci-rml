$(document).ready(function() {
    bind_upload();
    add_modal()
});

let data_files_original;
let data_files_organized;
let worksheet_images_original;

function bind_upload(){
    $('#imageUploadButton').on('click', function(){
        uploadFiles()
    })
}

function uploadFiles(){
    let files = $('#fileInput')[0].files;
    let idOfCertificate = $('#idOfCertificate').val();
    let moduleNumber = $('#moduleNumber').val();
    let fileType = 'evidence';
    let formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        formData.append('imageFiles[]', files[i]);
    }
    formData.append('certificate_id', idOfCertificate);
    formData.append('module_Number', moduleNumber);
    formData.append('fileType', fileType);

    $.ajax({
        url: '/image/add/' + idOfCertificate,
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log('Files uploaded successfully:', response);
            alert("Files Uploaded Successfully")
            get_files()
        },
        error: function(error) {
            console.error('Error uploading files:', error);
        }
    });
}

function view_images(){

    let data_evidence = data_files_organized.evidence

    data_evidence.forEach(items => {
        let divs = $('<div>', {
            "class": 'col mb-3',
        }).append($('<div>', {
            "class": 'card',
            "style": 'width:48vh;height:50vh',
        }).append($('<div>', {
            "class": 'card-body',
        }).append($('<img>', {
            "src": '/' + items.path,
            "style": 'width:100%; height:100%'
        }))))
    
        $('#imageCardRow').append(
            divs
        )
    })

    
}

function add_modal(){
    let modal_header = $('<div>', {
        'class': "modal-header",
    }).append(
        $('<h5>', {
            'class': "modal-title",
            'html': 'Images'
        }), 
        $('<button>', {
            'class': "close",
            'type': "button",
            'data-dismiss' : "modal"
        }).append(
            $('<span>', {
                'html': "&times;",
            })
    ))

    let modal_body = $('<div>', {
            'class': "modal-body",
        }).append(
            $('<div>').append(
                $('<div>', {
                    'class': "row",
                    'id': "imageCardRow"
                })
        ))

    let modal_footer = $('<div>', {
            'class': "modal-footer",
        }).append(
            $('<div>', {
                'class': "btn-toolbar",
                'role': "toolbar"
            }).append(
                $('<div>', {
                    'class': "btn-group",
                    'group': "group"
                }).append($('<button>', {
                    'class': "btn btn-warning mb-2",
                    'type': "button",
                    'data-bs-dismiss' : "modal",
                    'html': "Close"
                }))
        ))

    let modalDIV = $('<div>', {
        'class': "modal-dialog modal-dialog-scrollable",
    }).append(
        $('<div>').addClass('modal-content').append(modal_header, modal_body, modal_footer)
    )
        
    $('#imagesModal').append(modalDIV)

}

async function get_files(){
    let idOfCertificate = $('#idOfCertificate').val();
    let moduleNumber = $('#moduleNumber').val();
    await $.ajax({
        url: '/image/getData',
        type: 'POST',
        data: {
            'worksheetType' : moduleNumber,
            'worksheetID' : idOfCertificate,
        },
        cache: false,
        success: function(response) {
            data_files_original = response.files_data;
            data_files_organized = organize_data();
            
            try {
                view_images()
            } catch (error) {
                console.log('No evidence uploaded')
            }
            
            console.log('Files retrieved successfully');
        },
        error: function(error) {
            console.error('Error retrieved files: ', error);
        }
    });
}


function organize_data(){
    let organized = {}

    data_files_original.forEach(items=> {
        let fileType = items.fileType
        let path = items.path
        let imageName = items.imageName
        
        if(!Object.keys(organized).includes(fileType)){
            organized[fileType] = []; 
        }

        let temp_obj = {
            "path": path,
            "imageName": imageName
        }

        organized[fileType].push(temp_obj)
    })

    return organized;
}

function updateFiles(){
    let files = $('#fileInput')[0].files;
    let idOfCertificate = $('#idOfCertificate').val();
    let moduleNumber = $('#moduleNumber').val();
    let fileType = 'evidence';
    let formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        formData.append('imageFiles[]', files[i]);
    }
    formData.append('certificate_id', idOfCertificate);
    formData.append('module_Number', moduleNumber);
    formData.append('fileType', fileType);

    $.ajax({
        url: '/image/add/' + idOfCertificate,
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log('Files uploaded successfully:', response);
            alert("Files Uploaded Successfully")
            get_files()
        },
        error: function(error) {
            console.error('Error uploading files:', error);
        }
    });
}

function get_worksheet_image_data(){
    let idOfCertificate = $('#idOfCertificate').val();
    let moduleNumber = $('#moduleNumber').val();
    $.ajax({
        url: '/worksheet/get_worksheet_image_data',
        type: 'POST',
        data: {
            'worksheetType' : moduleNumber,
            'worksheetID' : idOfCertificate,
        },
        cache: false,
        success: function(response) {
            worksheet_images_original = JSON.parse(response.images);
        },
        error: function(error) {
            console.error('Error retrieved files: ', error);
        }
    });
}