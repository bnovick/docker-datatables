<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Quote Watch Demo</title>
    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="css/datatables-responsive.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.css">
</head>

<body id="page-top" class="cred" data-spy="scroll" data-target=".navbar-custom">
    <!-- Core JavaScript Files -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/bootstrap-datatables.min.js"></script>
    <script src="js/dt-responsive.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" id="reg-form" autocomplete="off">
                <?php include_once('dropdown.php');?>
                    <div class="form-group" style="text-align: center">
                        <?php dropdownlist(); ?>
                        <button class="btn btn-primary">Add Symbol</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Symbol</th>
                <th>Symbol Name</th>
                <th>Last Price</th>
                <th>Change</th>
                <th>PCT Change</th>
                <th>Volume</th>
                <th>Time Traded</th>
                <th>Remove</th>
            </tr>
        </thead>
    </table>
    </div>
    <script type="text/javascript">
    
    //Instantiate Datatable. Call serverside processing script to query DB

    jQuery(document).ready(function() {
        var example = $('#example').DataTable({
        	"searching": false,
        	"paging": false,
            "processing": true,
            "serverSide": true,
            "ajax": "./serverside.php",
            "oLanguage": {
                "sEmptyTable": "There are no symbols in your watchlist, please add one"
            },
        });

        // Delete quote function
        $('#example tbody').on('click', 'td:last-of-type', function() {
            var sym = $(this).html();
            $.ajax({
                type: "POST",
                url: "delete.php",
                data: {
                    symbol: sym
                },
                success: function(result) {
                    example.draw(); // redrawing datatable
                },
                async: false
            });
        });

        //Add quote function
        $('#reg-form').submit(function(e) {

            e.preventDefault(); // Prevent Default Submission

            $.ajax({
                    url: 'add.php',
                    type: 'POST',
                    data: $(this).serialize() // it will serialize the form data
                })
                .done(function(data) {
                    console.log(data);
                    if (data == '1')
                        alert('The given symbol does not exist');
                    if (data == '2')
                        alert('This symbol has already been added to the watchlist');
                    else
                        example.draw();
                })
        })
    });
    </script>
</body>

</html>
