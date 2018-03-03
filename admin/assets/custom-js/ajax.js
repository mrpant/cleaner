	var ACTION_ERROR = 'Your action could not be completed. Please try again.';
	var ICON_SUCCESS = '<img src="assets/images/icon_success.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_ERROR = '<img src="assets/images/error.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_LOADING = '<img src="assets/images/loading.gif" alt="loading" style="height:20px;width:20px" />';
	function getAvailableTokenList(handlerField,holder)
	{
		var handlerId = jQuery("#"+handlerField).val();
		jQuery("#"+holder).html(ICON_LOADING).fadeIn(100);
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getAvailableTokenList','handlerId':handlerId},
		  success: function(data) {
			  jQuery('#'+holder).html(data).fadeIn(100);
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				jQuery("#"+status).html(ACTION_ERROR).fadeIn(100);
			}
		});
	}
	function getAttributeFields(attributeSet,holder)
	{
		var attributeSetId = jQuery("#"+attributeSet).val();
		jQuery("#"+holder).html(ICON_LOADING).fadeIn(100);
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getAttributeFields','attributeSetId':attributeSetId},
		  success: function(data) {
			  jQuery('#'+holder).html(data).fadeIn(100);
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				jQuery("#"+status).html(ACTION_ERROR).fadeIn(100);
			}
		});
	}
	function getStateList(country)
	{
		var countryId = jQuery("#"+country).val();
		//jQuery("#"+holder).html(ICON_LOADING).fadeIn(100);
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getStateList','countryId':countryId},
		  success: function(data) {
			  jQuery('#state').html(data).fadeIn(100);
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				jQuery("#"+status).html(ACTION_ERROR).fadeIn(100);
			}
		});
	}
	function getCityList(state)
	{
		var stateId = jQuery("#"+state).val();
		//jQuery("#"+holder).html(ICON_LOADING).fadeIn(100);
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getCityList','stateId':stateId},
		  success: function(data) {
			  jQuery('#city').html(data).fadeIn(100);
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				jQuery("#"+status).html(ACTION_ERROR).fadeIn(100);
			}
		});
	}
	function getProductPrice(product)
	{
		var productId = jQuery("#"+product).val();
		//jQuery("#"+holder).html(ICON_LOADING).fadeIn(100);
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getProductPrice','productId':productId},
		  success: function(data) {
			  jQuery('#price').val(data).fadeIn(50);
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				jQuery("#"+status).html(ACTION_ERROR).fadeIn(100);
			}
		});
	}
	function getSupplierNumber(supplier)
	{
		var supplierId = jQuery("#"+supplier).val();
		//jQuery("#"+holder).html(ICON_LOADING).fadeIn(100);
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getSuplierNumber','supplierId':supplierId},
		  success: function(data) {
			  jQuery('#number').val(data).fadeIn(50);
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				jQuery("#"+status).html(ACTION_ERROR).fadeIn(100);
			}
		});
	}
	function getTripList(user)
	{
		var userId = jQuery("#"+user).val();
		//jQuery("#"+holder).html(ICON_LOADING).fadeIn(100);
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getTripList','userId':userId},
		  success: function(data) {
			  jQuery('#ddTrip').html(data).fadeIn(50);
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				jQuery("#"+status).html(ACTION_ERROR).fadeIn(100);
			}
		});
	}

	function get_group_code(userType,groupID){
		


		 	jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'get_group_id','groupId':userType},
		  success: function(data) {
			  jQuery('#'+groupID).html(data);
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				jQuery("#"+status).html(ACTION_ERROR).fadeIn(100);
			}
		});



		}

	function resetDropDown(element)
	{
		jQuery("#"+element).html('<option value="">Select</option>');
	}

	