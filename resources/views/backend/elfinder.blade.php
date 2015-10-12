<script type="text/javascript" charset="utf-8">
    // Documentation for client options:
    // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
        
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
</script> 