
<?php $__env->startSection('content'); ?>

<div class="card-header">
    <button type="button" class="btn btn-info" style="float: right"; onclick="window.location='<?php echo e(URL::route('color')); ?>'" ><i class="fa fa-arrow-left"></i> Back </button>
</div>
<div class="card-body">
   <h5>  New Colors Add Page</h5>
</div>

<form action="javascript:void(0)" id="colorForm" name="colorForm-add"  method="post">
   
    <div class="card-body">
        <div class="form-group">
            <label for="color"> Color <span style="color:#ff0000">*</span></label>
                <input type="text" name="color" class="form-control" id="color" placeholder="Enter Color ">
            <div class="error" id="colorErr"></div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="colorForm-add btn btn-submit btn-primary" id="colorForm-add">Save</button>
    </div>
</form>
                                          
<div style="display: none;" class="pop-outer">
    <div class="pop-inner">
        <h2 class="pop-heading">Color Added Successfully</h2>
    </div>
</div> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script type="text/javascript">  
        $( function() {     
            $('#color').on('input', function() {
                $('#colorErr').hide();
            });
        });

        $(document).on('click', '.colorForm-add', function (e) {
        
        $('#color').on('input', function() {
            $('#colorErr').hide();
        });
       
        var colorFlag  = 0;
        var color          = $("#color").val();
    
        if(color == "") {
            $("#colorErr").html("Please Enter Color");
            colorFlag = 1;
        }
        
        if( 1 == colorFlag ){
            return false;
        }else{
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:"<?php echo e(route('color.create')); ?>",
                type: "POST",
                dataType: "json",
                data:{ 
                    color:color,
                },
                success:function(data){
                    if( data.status == 'success' ){
                        $(".pop-outer").fadeIn("slow");
                        setTimeout(function () {
                            window.location = '<?php echo e(route('color')); ?>'
                        }, 2500);
                    }else{
                        $("#colorErr").html("Data Not Saved ! Please check Data");
                    }
                    
                },
                error: function(response) {
                    
                }
                 
            });
        }
    });
       

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\TimesworldTechnology\resources\views/color/colors-add.blade.php ENDPATH**/ ?>