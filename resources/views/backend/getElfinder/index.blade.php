<!DOCTYPE html>
<html>
<head>
    <title>Get Image</title>
        <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="{{ \Helper::assetUrl() }}backend/elfinder/css/elfinder.min.css">
        <link rel="stylesheet" type="text/css" href="{{ \Helper::assetUrl() }}backend/elfinder/css/theme.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" ></script> 
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
        <script type="text/javascript" src="{{ \Helper::assetUrl() }}backend/js/1.8.0.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<!-- elFinder CSS (REQUIRED) -->

<!-- elFinder JS (REQUIRED) -->
<script src="{{ \Helper::assetUrl() }}backend/elfinder/js/elfinder.min.js"></script>

<!-- elFinder translation (OPTIONAL) -->
<script src="{{ \Helper::assetUrl() }}backend/elfinder/js/i18n/elfinder.ru.js"></script>

        <script src="{{ \Helper::assetUrl() }}backend/elfinder/js/elfinder.min.js"></script>
    <script type="text/javascript">

            function getUrlParam(paramName) {
                var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
                var match = window.location.search.match(reParam) ;

                return (match && match.length > 1) ? match[1] : '' ;
            }

            $(document).ready(function(){
                 // star elfinder image

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

                    var urlImage = '{{ url("/backend/elfinder/php/connector_image.minimal.php") }}';
                    var funcNum = getUrlParam('CKEditorFuncNum');
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
                         getFileCallback : function(file) {
                            window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
                             window.close();
                            
                        },
                                   
                    }).elfinder('instance');;

                    // 
            });

    </script>

</head>
<body>

        <div id="elfinder"></div>

</body>
</html>