<script type="text/javascript" charset="utf-8">
    // Documentation for client options:
    // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
    
    $('document').ready(function(){
         $(".cancel-button").click(function(){
            document.location.href = '{{ \Helper::urlAction("index") }}';
            return false;
        });
    });
    
    function getUrl(file_url)
    {
         var url = file_url;

         replace = "/jakindo/public";

         return replace_url = url.replace(replace, "");
    }

    $(document).ready(function() {

        var rightUpload = '{{ \Helper::elfinderUpload() }}';

        if(rightUpload == 'true')
        {
            paramUpload = 'upload';
        }else{
            paramUpload = '';
        }

        var rightDelete = '{{ \Helper::elfinderDelete() }}';

        if(rightDelete == 'true')
        {
            paramDelete = 'rm';
        }else{
            paramDelete = '';
        }

        // star elfinder image

        var urlImage = '{{ url("/backend/elfinder/php/connector_image.minimal.php") }}';

        $('#elfinder').elfinder({
             url :  urlImage ,
             uiOptions : {
                 toolbar : [
                        [paramUpload , 'mkdir'],
                ],
             },
             contextmenu : {
               files  : ['getfile', '|','', paramDelete, '|'],
               navbar : [],
             },
             onlyMimes : ["image"],
             resizable : false , 
                       
        });

        // 

        // start elfinder video

        var urlVideo = '{{ url("/backend/elfinder/php/connector_video.minimal.php") }}';


        $('#elfinder_video').elfinder({
             url :  urlVideo ,
             uiOptions : {
                 toolbar : [
                        [paramUpload , 'mkdir'],
                ],
             },
             contextmenu : {
               files  : ['getfile', '|','', paramDelete, '|'],
               navbar : [],
             },
             onlyMimes : ["video"],
             resizable : false ,                
        });

        //
        
        // start elfinder video

        var urlDocument = '{{ url("/backend/elfinder/php/connector_document.minimal.php") }}';


        $('#elfinder_document').elfinder({
             url :  urlDocument ,
             uiOptions : {
                 toolbar : [
                        [paramUpload , 'mkdir'],
                ],
             },
             contextmenu : {
               files  : ['getfile', '|','', paramDelete, '|'],
               navbar : [],
             },
             onlyMimes : ["application/pdf"],
             resizable : false ,                
        });

        //

        //
            var urlImageBrowser = '{{ \Helper::urlBackend("getElfinder") }}';

             CKEDITOR.replace( 'ckeditor_upload' ,{
                "extraPlugins": "imagebrowser",
                //"imageBrowser_listUrl": urlImageBrowser,
                filebrowserBrowseUrl : urlImageBrowser,
             });

        //
        


    });
        function getUrlParam(paramName) {
            var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
            var match = window.location.search.match(reParam) ;

            return (match && match.length > 1) ? match[1] : '' ;
        }

        function browseElfinder(param1 , param2 , param3)
        {
                    var rightUpload = '{{ \Helper::elfinderUpload() }}';

                    if(rightUpload == 'true')
                    {
                        paramUpload = 'upload';
                    }else{
                        paramUpload = '';
                    }

                    var rightDelete = '{{ \Helper::elfinderDelete() }}';

                    if(rightDelete == 'true')
                    {
                        paramDelete = 'rm';
                    }else{
                        paramDelete = '';
                    }

                    $(".pop_back").show(); 
                     var urlImage = '{{ url("/backend/elfinder/php/connector_image.minimal.php") }}';
                     var funcNum = getUrlParam('CKEditorFuncNum');
                     $('div[id^="elfinder_browse"]').hide();
                     $('#elfinder_browse').hide();
                     $('#'+param3).show();
                     $('#'+ param3).elfinder({
                             url :  urlImage ,
                             uiOptions : {
                                 toolbar : [
                                        [paramUpload],
                                ],
                             },
                             contextmenu : {
                               files  : ['getfile', '|','', paramDelete, '|'],
                               navbar : [],
                             },
                             onlyMimes : ["image"],
                             resizable : false , 
                             width : 1000,
                             getFileCallback : function(file) {
                                 var file_url = getUrl(file.url);
                                 $("#"+param1).val(file_url);
                                 $("#"+param2).html("<img src = '"+ file.url +"' width = '200' height = '200' />");
                                 $(".pop_back").hide();

                                
                            },

                            height: 490,
                                docked: false,
                            dialog: { width: 400, modal: true },
                                       
                        }).elfinder('instance');
        }

        function browseElfinderClose()
        {
            $(".pop_back").hide();
        }
</script> 