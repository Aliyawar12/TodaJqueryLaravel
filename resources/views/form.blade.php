<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Task</title>
</head>
<body>
    <h1>Crud Operation</h1>
    <form id="add-form">
        <input type="text" name="name" placeholder="Enter Name" required>
        <br>
        <input type="email" name="email" placeholder="Enter email" required>
        <br>
        <input type="password" name="password" placeholder="Password" required>
        <br>
        <input type="role" name="role" placeholder="Role" required>
        <br>
        <input type="submit" value="Add Record" id="btnSubmit">
    </form>

    <script>
        $(document).ready(function(){
            $('#add-form').submit(function(event){
                event.preventDefault();

                var form = $("#add-form")[0];

                $.ajax({
                    type:"POST",
                    url:"{{ route('addUser') }}",
                    data:data,
                    processData:false,
                    contentType:false,
                    success:function(data){

                    },
                    error:function(e){

                    }
                })
            });
        });
    </script>
</body>
</html>