<!DOCTYPE html>
<html lang="en">
<head>
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
</head>

<script src="{!!asset('/summernote-master/dist/summernote.css')!!}"></script>

<script src="{!!asset('/summernote-master/dist/summernote.min.js')!!}"></script>

<body>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({height:300});
        });
    </script>
</body>