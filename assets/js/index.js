import $ from 'jquery';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

let timeDiff = 0;
		
	function startTime() {
		
		var browserNow = new Date();
		var h = browserNow.getHours();
		var m = browserNow.getMinutes();
		//var s = browserNow.getSeconds();
		m = checkTime(m);
		//s = checkTime(s);
		$("#browserTime").html(h + ":" + m);
		
		var serverNow = new Date(Math.floor(Date.now()) + (timeDiff * 1000));
		var h = serverNow.getHours();
		var m = serverNow.getMinutes();
		//var s = serverNow.getSeconds();
		m = checkTime(m);
		//s = checkTime(s);
		$("#serverTime").html(h + ":" + m);
		
		//Update click every 60 seconds
		var t = setTimeout(startTime, 60000);
	}
	
	function checkTime(i) {
		if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		return i;
	}	
		
		
    $(function(){
		
		timeDiff = 0; //Math.floor(Date.now() / 1000) - Math.floor(<?php echo(time()); ?>);
		console.log(timeDiff);
		
		startTime();

		$("#live-image").on('click', function(e) {
			$("#type").val('preview');
            $("#live-image").button('loading');
			$("#configData").submit();
        });
        


        $("#sharpness").on('input', function(evt){
            $("#sharpness-value").text(evt.target.value)
        });

        $("#contrast").on('input', function(evt){
            $("#contrast-value").text(evt.target.value)
        });

        $("#brightness").on('input', function(evt){
            $("#brightness-value").text(evt.target.value)
        });

        $("#saturation").on('input', function(evt){
            $("#saturation-value").text(evt.target.value)
        });

        $("#ISO").on('input', function(evt){
            $("#ISO-value").text(evt.target.value)
        });

        $("#ev").on('input', function(evt){
            $("#ev-value").text(evt.target.value)
        });
        

		$("#run-timelapse").on('click', function(e){
			
			let timeout = $("#timeout").val();
			let timelapse = $("#timelapse").val();
            $("#live-image").hide();
			
			if(timeout === '' || timelapse === '') {
				alert('erro');
				return;
			}
			
			
			$("#type").val('timelapse');
			$("#configData").submit();
		});


		$("#configData").submit(function(e) {
			e.preventDefault(); // avoid to execute the actual submit of the form.
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: $("#configData").serialize(), // serializes the form's elements.
				success: function(data, status, xhr)
				{
					if(data.isTimelapseRunning) {
						$("#info-box").removeClass().addClass("alert").addClass("alert-"+data.status).html(data.info).show(); 
						return; 
					}
					$("#live-image-placeholder").attr('src',data.previewImage);
					$("#shellScript").val(data.shellContent);
					if(data.type === 'timelapse') {
						$("#info-box").removeClass().addClass("alert").addClass("alert-"+data.status).html(data.info).show();          
					}
                    $("#live-image").button('reset');
				}
			});
		});

		$('#myTabs a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})
    });

