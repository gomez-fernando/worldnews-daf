//
// $(document).ready( function(){
//
//     let $buttonInProcess = $('#in_process');
//
//     $buttonInProcess.on('click',function(){
//
//         let $form = $('#altaArticuloForm');
//         console.log('clicked');
//         let params = [] ;
//         $form.find('input,select, textarea').each(function(i,elem){
//
//             let $elem = $(elem);
//             let key = $elem.attr('id');
//             let value = $elem.val();
//
//             if( (key != undefined ) && (value !== undefined) ) {
//                 console.log(elem+': '+value);
//                 params[key] = value;
//             }
//
//         });
//
//
//
//
//         let $token = $( "input[name='_token']" );
//
//         params['_token'] = $token.val();
//         params['state'] = 'en proceso';
//
//
//
//         post(urlArticleSave, params, 'post' );
//
//
//     })
//
//     let $buttonForReview =$('#for_review');
//
//     $buttonForReview.on('click', function(){
//
//         let $form = $('#altaArticuloForm');
//         console.log('clicked');
//         let params = [] ;
//         $form.find('input,select,textarea').each(function(i,elem){
//
//             let $elem = $(elem);
//             let key = $elem.attr('id');
//             let value = $elem.val();
//             if( (key != undefined ) && (value !== undefined) ) {
//                 params[key] = value;
//             }
//
//         });
//
//         let $token = $( "input[name='_token']" );
//
//         params['_token'] = $token.val();
//         params['state'] = 'en revisión';
//
//         post(urlArticleSave, params, 'post');
//     })
// });
//
//
//
// function post(path, params, method) {
//     method = method || "post"; // Set method to post by default if not specified.
//
//     // The rest of this code assumes you are not using a library.
//     // It can be made less wordy if you use one.
//     var form = new FormData();
//
//     for(var key in params) {
//         if(params.hasOwnProperty(key)) {
//            form.append(key, params[key]);
//         }
//     }
//     form.append('image_path',$('input[type=file]')[0].files[0]);
//
//
//
//     $.ajax({
//         url: path,
//         data: form,
//         cache: false,
//         contentType: false,
//         processData: false,
//         type: 'POST',
//         success: function(data){
//             console.log(data);
//         }
//     })
//
// }
//
//
