var  baseUrl = window.location.origin + '/' + window.location.pathname.split( '/' )[1];

function get_base_url(){
    var base_url = window.location.origin + '/' + window.location.pathname.split( '/' )[1];

    $.ajax({
        cache: false,
        type: "post",
        url: base_url + '/get_base_url',
        success: function(result) {
            baseUrl = result.base_url
        },
        error: function (error) {
            console.log(error);
        },
    })
}


$(document).on('ajaxSend', function(event, jqxhr, settings){
    let url = settings.url
    if(!url.includes('')){// chenge prefix 
        let url_no_prefix = url.replace('http://192.168.2.19', '') // change this to IP address
        let url_return = baseUrl + url_no_prefix 
        settings.url = url_return
        console.log('URL CORRECTED')
    }
})

// document.onreadystatechange = function(){
    
//     let links_array = document.getElementsByTagName("link")
//     for (let i = 0; i < links_array.length; i++) {
//         const element = links_array[i];
//         let element_href = element.getAttribute('href')
//         if(!element_href.includes('/r3cms')){
//             element.setAttribute('href', baseUrl + element_href)
//         }
//     }

  
//     if (document.readyState === 'complete'){
        
//         let scripts_array = document.getElementsByTagName("script")
//         for (let i = 0; i < scripts_array.length; i++) {
//             const element = scripts_array[i];
//             let element_href = element.getAttribute('src')
//             if(element_href != null && !element_href.includes('/r3cms')){
//                 element.setAttribute('href', baseUrl + element_href)
//             }
//         }
        
//     }
// };
