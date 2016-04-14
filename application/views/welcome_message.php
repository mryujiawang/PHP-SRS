<!--<div>-->
<!--<img id="dialog" style="width:150px;height:150px;border:5px dashed #696969" width="50px" src="<?php echo asset_url().'img/plus.png'?>"/>-->
<!--</div>-->
<div id="home_dialog"></div>

<div id="createEntry">
   <button>Create new item</button>
</div>
<script>

$("button")
    .button().click(function(){
        $.post('<?php echo base_url(); ?>priority', function(response){
            $('#home_dialog').html(response);
            
            $( "#home_dialog" ).dialog('open');
            //$( "#home_dialog" ).dialog('destroy');
        });
    });

$(function() 
  {
    $( "#home_dialog" ).dialog({
      autoOpen: false,
      width:500,
      show: {
        effect: "scale",
        duration: 500
      },
      hide: {
        effect: "scale",
        duration: 500
      },
      modal:true
      
    });
  });

  </script>
<!--<input type='color' id="custom" /><h2>Basic Usage</h2>-->





</body>
</html>