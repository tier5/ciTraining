$(document).ready(function(){

		$.post('Admin/cardCheck',function(data){


			
				//console.log(data);
				data = $.parseJSON(data);
				console.log(data);
				if($.trim(data))
			{
						$('#cardMsg').html('Card Id '+data.Card_id+'</br> Assign It To Someone');
						$('#cardCheck').modal('show');

						$('#addEmpToCard').click(function(){

							var empId = $('#idToCard').val();

							if(empId)
							{
								$.post('Admin/assignCard',{Cid: data.Cid, empId: empId},function(value){

									//alert(value);
									$('#cardAddedMsg').html('Card Id '+data.Card_id+' is Added To Employee Id '+value );
									$('#cardAdded').modal('show');

								});
								
								
								
							}

						});
					
				
			}
		})

		$('#cardAddedConfirm').click(function(){

			location.reload();

		});



});