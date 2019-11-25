
$(document).ready( function(){

    let $buttonInProcess = $('#in_process');

    $buttonInProcess.on('click',function(){

        let $form = $('#altaArticuloForm');
        console.log('clicked');
        let params = [] ;
        $form.find('input,select, textarea').each(function(i,elem){

            let $elem = $(elem);
            let key = $elem.attr('id');
            let value = $elem.val();
            if( (key != undefined ) && (value !== undefined) ) {
                params[key] = value;
            }

        });

        let $token = $( "input[name='_token']" );

        params['_token'] = $token.val();
        params['state'] = 'en proceso';


        //var $formData = new FormData();
        // Attach file
        //$formData.append('image_path', $('input[type=file]')[0].files[0]);
        $file = $('input[type=file]')[0].files[0];
        console.log(typeof(formData));
        post(urlArticleSave, params, 'post' , $file);


    })

    let $buttonForReview =$('#for_review');

    $buttonForReview.on('click', function(){

        let $form = $('#altaArticuloForm');
        console.log('clicked');
        let params = [] ;
        $form.find('input,select,textarea').each(function(i,elem){

            let $elem = $(elem);
            let key = $elem.attr('id');
            let value = $elem.val();
            if( (key != undefined ) && (value !== undefined) ) {
                params[key] = value;
            }

        });

        let $token = $( "input[name='_token']" );

        params['_token'] = $token.val();
        params['state'] = 'en revisión';
        console.log(params);
        // post(urlArticleSave, params, 'post');
    })
});



function post(path, params, method, attachment) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);
    form.setAttribute("enctype" , 'multipart/form-data');

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField)
        }
    }




    document.body.appendChild(form);
    form.submit();
}


