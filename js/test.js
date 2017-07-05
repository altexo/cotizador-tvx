 $(document).ready(function () { 
       $('body').on('click', '.prev_final', function(){
            // Get the form data. This serializes the entire form. pritty easy huh!
            var form = new FormData($('#myform')[0]);

            // Make the ajax call
            $.ajax({
                url: 'php/test.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',progress, false);
                    }
                    return myXhr;
                },
                //add beforesend handler to validate or something
                //beforeSend: functionname,
                success: function (res) {
                    $('#content_here_please').html(res);
                },
                //add error handler for when a error occurs if you want!
                //error: errorfunction,
                data: form,
                // this is the important stuf you need to overide the usual post behavior
                cache: false,
                contentType: false,
                processData: false
            });
        });


        $(".prev_final").on('click', function(){
            
            // send ajax
            $.ajax({
                url: 'php/test.php', // url where to submit the request
                type : "POST", // type of action POST || GET
                dataType : 'json', // data type
                // this is the important stuf you need to overide the usual post behavior
                cache: false,
                contentType: false,
                processData: false,
                 xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',progress, false);
                    }
                    return myXhr;
                },
                data : $(".test").serialize(), // post data || get data

                success : function(result) {
                     $('#content_here_please').html(res);
                    // you can see the result from the console
                    // tab of the´´ developer tools
                    //$.each(result[0], function(key, value) {
                        //var eng_uni = value.en
                        //var radio_with_label = $('<tr class="r"><td>'+value.cantidad_eq+'</td><td>'+value.descripcion+'</td><td class="alinear">'+value.enganche+'</td><td class="alinear">'+value.tarifa_unitaria+'</td><td class="alinear">'+value.costo_mensual+'</td></tr>');

                      //  $(".tab").append(radio_with_label); // TARGET -> any valid selector container to radios
                    //});
                    console.log(result);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                   
                }
            })
        });

    }); 

    // Yes outside of the .ready space becouse this is a function not an event listner!
    function progress(e){
        if(e.lengthComputable){
            //this makes a nice fancy progress bar
            $('progress').attr({value:e.loaded,max:e.total});
        }
    }

