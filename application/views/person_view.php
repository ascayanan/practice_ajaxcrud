<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alhajji Cayanan</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    </head> 
<body>

    <div class="container">
    <div style='margin-top: 15px !important;' class="form">
    <div>
    <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/><!-- ID Checker --> 
                    
                    <div class='row' style='margin-top: 0px !important;'>
                                <div style='margin-top: -15px !important;' class='col-md-2' >
                                    <h3>First Name</h3>
                                </div>

                                 <div class='col-md-4'>
                                    <input type='text' onkeyup="javascript:this.value=this.value.replace(/[^a-z-A-Z]/g, '');" class='form-control mt PersonalInformationTextFields' name='firstName' placeholder='First Name'>
                                    <span class="help-block"></span>            
                                </div>

                                <div style='margin-top: -15px !important;' class='col-md-2' >
                                    <h3>Last Name</h3>
                                </div>

                                <div class='col-md-4'>
                                    <input type='text' onkeyup="javascript:this.value=this.value.replace(/[^a-z-A-Z]/g, '');" class='form-control mt PersonalInformationTextFields' name='lastName' placeholder='Last Name'>
                                    <span class="help-block"></span>
                                </div>
                          </div>
                    </div>
                   
                    <div class='row' style='margin-top: 0px !important;'>
                                <div style='margin-top: -15px !important;' class='col-md-2'>
                                    <h3>Date of Birth</h3>
                                </div>

                                 <div class='col-md-4'>
                                     <input type='text' placeholder="Date of Birth" class="form-control datepicker" name='dob'  readonly="">
                                     <span class="help-block"></span>
                                </div>

                                <div style='margin-top: -15px !important;' class='col-md-2'>
                                    <h3>Gender</h3>
                                </div>

                                <div class='col-md-4'>
                                    <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="help-block"></span>
                                </div>
                          </div>
                    </div>

                    <div class='row' style='margin-top: 0px !important;'>
                                <div style='margin-top: -15px !important;' class='col-md-2'>
                                    <h3>Address</h3>
                                </div>

                                <div class='col-md-10'>
                                    <input type='text' class='form-control mt PersonalInformationTextFields'name='address' placeholder='Address'>
                                    <span class="help-block"></span>
                                </div>
                    </div>

            <div class="alert alert-success" style="display: none;">
            </div>
            <div class="alert alert-danger" style="display: none;">
            </div>
            <div class="alert alert-info" style="display: none;">
            </div>



          <div class='row pull-right'>
                                <div class="col-md-12 ">
                                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
                                <button type="button" onclick="reload_table()" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-erase"></i> Cancel/Clear</button>
                                </div>
                            </div>
        </form>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="info">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </form>
    </div>

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<script type="text/javascript">

var table;

$(document).ready(function() {
    $checkadd="";
    //datatables
    table = $('#table').DataTable({ 
    
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('person/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function edit_person(id)
{
    $checkadd='edit';
    $('#form')[0].reset(); // reset form 
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('person/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $checkadd=$('[name="id"]').val(data.id);
            $('[name="firstName"]').val(data.firstName);
            $('[name="lastName"]').val(data.lastName);
            $('[name="gender"]').val(data.gender);
            $('[name="address"]').val(data.address);
            $('[name="dob"]').datepicker('update',data.dob);
            
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    $('#form')[0].reset(); // reset form on modals
    table.ajax.reload(null,false); //reload datatable ajax 
    $checkadd='';
}

function save()
{
    
    var url;

    if($checkadd == '') {   
        url = "<?php echo site_url('person/ajax_add')?>";
    } else {
        
        url = "<?php echo site_url('person/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) 
            {
                 if($checkadd == ''){
                    
                $('.alert-success').html('<center>Added Successfully</center>').fadeIn().delay(2000).fadeOut('fast');
                }   else{
                    
                $('.alert-info').html('<center>Updated Successfully</center>').fadeIn().delay(2000).fadeOut('fast');
                }
                $('#form')[0].reset(); // reset form
                reload_table();

               
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $checkadd='';
           

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
           

        }
    });
}

function delete_person(id)
{
    if(confirm('Are you sure you want to delete this?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('person/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                reload_table();
                $('.alert-danger').html('<center>Deleted Successfully</center>').fadeIn().delay(2000).fadeOut('fast');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>


</body>
</html>