<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="dist/images/usb_icon.png">

    <title>SafeDisk</title>

    <!-- Bootstrap core CSS -->
    <?php include("fileofcss.php");?>
    <!--CSS-->
    <style>
      .css_table{
        border-radius:10px;
        font-size: 20px;
        background-color: #CCFFCC
      }
      td{
        font-size: 17px;
        text-align: center;
      }
      .css_imgleft{
        padding: 10px;
      }
    </style>
  </head>

  <body background="dist/images/menberbg.jpg">

    <!--Navbar-->
    <?php include("navbar.php");?>
    <!--Table-->
    <div class="container table-responsive" style="padding-bottom: 0px">
        <div>
          <h3>User Menage</h3>
        </div>
        <table class="css_table table-bordered  table_class table table-striped table-responsive table-hover" id="table_id">
          <thead>
            <tr>
              <th class="col-xs-1 col-md-1 text-center"><span class="glyphicon glyphicon-tasks css_imgleft"></span></th>
              <th class="col-xs-2 col-md-2 text-center"><span class="glyphicon glyphicon-user css_imgleft"></span>Name</th>
              <th class="col-xs-4 col-md-4 text-center"><span class="glyphicon glyphicon-envelope css_imgleft"></span>Email</th>
              <th class="col-xs-2 col-md-2 text-center"><span class="glyphicon glyphicon-phone css_imgleft"></span>Phone</th>
            </tr>
          </thead>
        </table>
    </div>

    <!--footer-->
    <?php include("footer.php");?>

    <!--JavaScript=====================================================================-->  
    <script type="text/javascript" language="javascript" src="dist/js/dataTables.bootstrap.js"></script> 
   <!-- <script type="text/javascript" src="dist/js/dateTable/dataTables.select.min.js"></script>
    <script type="text/javascript" src="dist/js/dateTable/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="dist/js/dateTable/dataTables.editor.min.js"></script>-->
    <script type="text/javascript" charset="utf-8">

      //Table Read
    $(document).ready(function() {
        var opt={
          "ajax":"dist/sqlFunction/member_list.php"
        };
 $('#table_id').dataTable(opt);
    });
 /* 

      var editor; // use a global for the submit and return data rendering in the examples  table: "#example",
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "datetabletoSQL.php",
        table: "#table_id",
        fields: [ {
                label: "使用者名稱:",
                name: "user"
            }, {
                label: "Email:",
                name: "email"
            }, {
                label: "Phone:",
                name: "phone"
            }
        ]
    } );
 
    $('#table_id').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            submit: 'allIfChanged'
        } );
    } );
 
    $('#table_id').DataTable( {
        dom: "Bfrtip",
        ajax: "datetabletoSQL.php",
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
            { data: "user" },
            { data: "email" },
            { data: "phone" },
            //{ data: "office" },
            //{ data: "start_date" },
            //{ data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
        ],
        order: [ 1, 'asc' ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );*/
    </script>
  </body>
</html>

