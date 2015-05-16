<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/home/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/home/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/home/css/bootstrap-social.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/home/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/home/css/main.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/home/images/favicon.ico">

    <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Fira+Sans:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>

    <style>
/* side navigation */
#sidemenu {
  margin: 0;
  padding: 0;
  background: #e8e8e8;
}


#sidemenu li {
    list-style-type: none;
    display: block;
    text-shadow: 0px 1px 1px #F2F1F0;
    font-size: 1.11em;
    position: relative;
    border-right-width: 0;
    border-bottom: 1px solid #DDD;
    margin: auto;
    //padding: 10px 15px !important;
    background: whiteSmoke; /* Old browsers */
    background: -moz-linear-gradient(top, #ffffff 0%, #f2f2f2 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ffffff), color-stop(100%, #f2f2f2)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top, #ffffff 0%, #f2f2f2 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top, #ffffff 0%, #f2f2f2 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top, #ffffff 0%, #f2f2f2 100%); /* IE10+ */
    background: linear-gradient(top, #ffffff 0%, #f2f2f2 100%); /* W3C */
}

#sidemenu li a {
  color: #4e7f16;

}
#sidemenu li a:hover {

}

#sidemenu li a strong {
  display: block;
  margin-top: 5px;
}

#sidemenu li a.open {
  	color: black;
    border-right: none;
    z-index: 10;
    background: white !important;
    position: relative;
    moz-box-shadow: inset 0 0 35px 5px #fafbfd;
    -webkit-box-shadow: inset 0 0 35px 5px #fafbfd;
    box-shadow: inset 0 0 35px 5px #fafbfd;
    border-right: 3px solid #4e7f16;
}



div#OR {
    height: 30px;
    width: 30px;
    border: 1px solid #C2C2C2;
    border-radius: 50%;
    font-weight: bold;
    line-height: 28px;
    text-align: center;
    font-size: 12px;
    float: right;
    position: absolute;
    right: -16px;
    top: 40%;
    z-index: 1;
    background: #DFDFDF;
}

#commentcontainer
{
	height:auto;
	width:600px;
	margin:0 auto;
}
#commentcontainer img
{
float:left;
border:1px solid #eeeeee;
padding:5px;
margin:0 12px 12px 0;
}

#subcomm img
{
height:auto;
max-width:40px;
float:left;
border:1px solid #eeeeee;
padding:5px;
margin:5px 5px 5px 5px;
}
#subcomm
{
float:right;
height:auto;
width:497px;
background-color:#EDEFF4;
border-bottom:1px solid white;
}
#maincomm
{
border-bottom:1px solid gray;
padding-bottom:5px;
margin-bottom:10px;
}
#name
{
font-weight: bold;
color: #3B5998;
text-transform:capitalize;
}
#comm a
{
	text-decoration:none;
	color:#3b5998;
}
#comm a:hover
{
	text-decoration:underline;
}
</style>
</head>
<body>
    <div id="wrapper" >
        <div id="page-content-wrapper" class="st-pusher">
            <div class="st-pusher-after"></div>
            <!-- ============================================== HEADER ============================================== -->
<?php $this->load->view('frontend/templates/header'); ?>

<!-- ============================================== HEADER : END ============================================== -->

<?php $this->load->view($main_content); ?>


<!-- ============================================== FOOTER ============================================== -->
<?php $this->load->view('frontend/templates/footer'); ?>
<!-- ============================================== FOOTER : END ============================================== -->
</div><!-- /.st-pusher -->
            <!-- ============================================== TOGGLE RIGHT CONTENT ============================================== -->

<div id="cart-dropdown-wrapper">
	<nav id="menu1" class="cart-dropdown">
		<h2 class="shopping-cart-heading">Shopping cart</h2>
		<div id="cart_container">
       </div>

	</nav>
</div>

<!-- ============================================== TOGGLE RIGHT CONTENT : END ============================================== -->



                </div><!-- /#wrapper -->

    <script src="<?php echo base_url(); ?>assets/home/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/jquery.progressTimer.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/jquery.customSelect.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/jquery.easing-1.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/echo.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/home/js/scripts.js"></script>

    <script type="text/javascript">
	$(document).ready(function() {
		$("div.col-md-3.col-sm-4:not(:first)").addClass('hidden-xs');

		//Search
		/*$("#page-search").autocomplete({
			source: '<?php echo site_url("home/search") ?>'// name of controller followed by function

		}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<a><div class="list_item_container"><div class="image"><img src="<?php echo base_url(); ?>upload/book-covers/' + item.image + '"></div><div class="label">' + item.name + '</div><div class="description">' + item.author + '</div></div></a>';
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append(inner_html)
            .appendTo( "#result" );
    	};*/
    });
	</script>

    <script>
        $(function() {
            $("#page-search").keyup(function (e) {
            	switch (e.keyCode) {
			case 13:

				return false;
			break;
			case 40:

				return false;
			break;
			case 38:

				return false;
			break;
			default:
                var searchid = $(this).val();
                if(searchid.length > 2)
                {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo site_url("home/search") ?>',
                        data: 'query=' + searchid,
                        cache: false,
                        success: function(html)
                        {
                            $("#result").html(html).show();
                            jQuery("#result").fadeIn();
                        }
                    });
                }else
                {
                    $("#result").fadeOut();
                }
            }
            });



            jQuery("#result").on("click", function (e) {
                var $clicked = $(e.target);
                var $name = $clicked.find('.title').html();
                var decoded = $("<div/>").html($name).text();
                $('#page-search').val(decoded);
            });

            $(document).on("click", function (e) {
                var $clicked = $(e.target);
                if (!$clicked.hasClass("search-input")) {
                    jQuery("#result").fadeOut();
                }
            });

        });
    </script>
    <script type="text/javascript">
    	$(function(){
		  $('#sidemenu a').on('click', function(e){
		    e.preventDefault();

		    if($(this).hasClass('open')) {
		      // do nothing because the link is already open
		    } else {
		      var oldcontent = $('#sidemenu a.open').attr('href');
		      var newcontent = $(this).attr('href');

		      $(oldcontent).fadeOut('fast', function(){
		        $(newcontent).fadeIn().removeClass('hidden');
		        $(oldcontent).addClass('hidden');
		      });


		      $('#sidemenu a').removeClass('open');
		      $(this).addClass('open');
		    }
		  });
		});
    </script>

<style type="text/css" media="screen">
	#result
	{
		position: absolute;
		//padding:10px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: rgb(250, 251, 248);
		z-index: 1000;
        width: 100%;
        box-shadow: 0 2px 3px rgba(0,0,0,0.17);
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
	}
	.suggest-item
	{
		padding:10px;
		border-bottom:1px #999 dashed;
		font-size:15px;
		height:80px;
	}
    .suggest-item:last-child {
        border: none;
    }
	.suggest-item:hover
	{
		background:#599806;
		color:#FFF;
		cursor:pointer;
	}
    .suggest-item .image-thumb-min {
        margin-right: 6px;
        float: left;
    }
    .suggest-item .image-thumb-min img {
        width: 50px;
        height: 60px;
    }
    .suggest-item .suggestionlabel {
        margin: 0px;
        //float: left;
    }
    .suggest-item .suggestionlabel .title {
        color: #000000;
        font-size: 13px;
        font-weight: bold;
        display: block;
        max-width: 392px;
    }
    .suggest-item .suggestionlabel .detail span {
        line-height: 18px;
        font-weight: normal;
        font-style: normal;
        color: #a3a3a3;
        font-size: 12px;
    }
    .suggest-item .suggestionlabel .detail .price {
        color: #CA2027;
        display: block;
        font-size: 13px;
    }
</style>


	<script>
	$("#progressTimer").progressTimer({
    timeLimit: 4,
    warningThreshold: 5,
    baseStyle: 'progress-bar-warning',
    warningStyle: 'progress-bar-danger',
    completeStyle: 'progress-bar-success',
    onFinish: function() {
    	window.location.href = '<?php echo base_url(); ?>';
        console.log("done :v");
    }
});

	function remove_cart(itemid)
	{
	        $.ajax({
	            type: 'POST',
	            url: '<?php echo site_url("cart/remove_cart/'+itemid+'")?>',
	            data: { id:itemid },
	            dataType:"json",
	            success:function(response){
	            $(".total_price").html(response.total);
	            $("#total_items").html(response.items);
	             //$("#cart_container").html(response);
	            //$(".view_cart").trigger( "click" ); //trigger click to update the cart box.

	           view_cart();
	             console.log(response);
	     }
	  });

	}

function view_cart()
	{
				$.ajax({
	            type: 'POST',
	            url: '<?php echo site_url("cart/view_cart")?>',
	            data: { id:'1' },
	            success:function(response){
	              $("#cart_container").html(response);
	                console.log(response);
	     }
	  });/* Aajx */
	}
	function update_cart(itemid)
	{
	  var qty= document.getElementById(itemid+"_qty").value;
	        $.ajax({
	            type: 'POST',
	            url: '<?php echo site_url("cart/update_cart/'+itemid+'/'+qty+'")?>',
	            data: { id:itemid },
	            dataType:"json",
	            success:function(response){
	             //$("#cart_container").html(response.viewcart);
	             $(".total_price").html(response.total);
	             view_cart();
	             console.log(response);
	     }
	  });

	}



	  var pid="";
	    $(document).ready(function() {


	$(".view_cart").click(function(event) {

	 $.ajax({
	            type: 'POST',
	            url: '<?php echo site_url("cart/view_cart")?>',
	            data: { id:'1' },
	            //dataType:"json",
	            success:function(response){
	              $("#cart_container").html(response);
	                console.log(response);
	     }
	  });/* Aajx */



	});


	$(".add-to-cart").click(function(event) {

	  var id=$(this).data('id');
	  var stock = $(this).data('stock');
	  if(stock != 0){
	  var qty=1;

	  $.ajax({
	            type: 'POST',
	            url: '<?php echo site_url("cart/add_to_cart/'+id+'/'+qty+'")?>',
	            data: { id:id },
	            dataType:"json",
	            success:function(response){
	            $(".total_price").html(response.total);
	            $("#total_items").html(response.items);
	            $(".view_cart").click();
	            console.log(response);
	     }
	  });/* Aajx */
	}

	});/* Add to cart clicked */


	      $('.delete_product').click(function(event) {
	        var id=$(this).data('id');
	        bootbox.confirm("Want to delete this?", function(result) {
	          if(result)
	          {
	              $("#tr_"+id).hide('slow');
	             $.ajax({
	            type: 'POST',
	            url: '<?php echo site_url("ajax_controller/delete_product/'+id+'")?>',
	            data: { del_id:id },
	            success:function(response){

	     }
	  });
	          }
	        });

	    });/* Delete Product*/



	      });/*document */


  </script>

  <script type="text/javascript">
  	$(document).ready(function() {
  	//var file = $('#avatar')[0].files[0];

	$('#upload_avatar').on('click',function(e) {
        $(".loading").css("display","block");
		//var file = document.getElementById("avatar").files[0];
		var file = $('#avatar').prop("files")[0];
	  	var uid = $("#uid").val();

	  	var formdata = new FormData();
	    formdata.append('uid',uid);
	    formdata.append('img_upload',file);

		e.preventDefault();

		$.ajax({
			type: 'POST',
			url 			:'<?php echo site_url("user/up_avatar")?>',
			dataType		: 'json',
			data			: formdata,
			contentType: false,
			cache: false,
            processData: false,
            enctype: 'multipart/form-data',
			success	: function (data)
			{
				if(data.status != 'error')
				{
                    $(".loading").css("display","none");
                    $(".alert-info").css("display","block");
					/*$('#files').html('<p>Reloading files...</p>');
					refresh_files();
					$('#title').val('');*/
					$('#avatar').val('');
					$(".show_img").html(data.img);
					$(".result").html(data.msg);
					console.log(data);
				}
				else{
					alert(data.msg);
                    $(".loading").css("display","none");
				}
			}
			/*error: function(){
				alert(data.msg);
			}*/
		});
		return false;
	});
});
// Replace missing img
$('img').error(function(){
        $(this).attr('src', '<?php echo base_url() ?>assets/photo_not_available.jpg');
});
  </script>
</body>
</html>