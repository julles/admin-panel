<script type="text/javascript" charset="utf-8">
    // Documentation for client options:
    // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
    $(document).ready(function() {

        var urls = '{{ url("/backend/elfinder/php/connector_image.minimal.php") }}';

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

        $('#elfinder').elfinder({
             url :  urls ,
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
    });
</script> 