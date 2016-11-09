var PROJAPOTI = {
		
	APP_XHR : null,	
	AJAX_CONTENT_HOLDER: "#ajax-content",
	AJAX_LOADER: "#ajax-loader",
	APP_URL_ROOT:"",
	numbers : {
	        1: '১',
	        2: '২',
	        3: '৩',
	        4: '৪',
	        5: '৫',
	        6: '৬',
	        7: '৭',
	        8: '৮',
	        9: '৯',
	        0: '০'
	    },
	bng_numbers : {
		        '১':1,
		        '২':2,
		        '৩':3,
		        '৪':4,
		        '৫':5,
		        '৬':6,
		        '৭':7,
		        '৮':8,
		        '৯':9,
		        '০':0
		    },
	
	loadIframe : function(url,placeholder){
		var iframe = '<iframe class="iframe span12" style="overflow:hidden;" src="'+this.APP_URL_ROOT+url+'"></iframe>';
		$(placeholder).html(iframe);
		var h = $(window).height();
		$('.iframe').css('height',h-70);
	},
	selectMenu : function(id,action) {
		// remove class from current
		 $(id+' li').removeClass('active');
		// add class in the action
		 $(id+' a[href=#' + action+']').parent().addClass('active');
	},
	
	getFullPath : function(action) {
		var url = this.APP_URL_ROOT + action;
		return url;
	},
	loadContents : function(contents){
		$(this.AJAX_CONTENT_HOLDER).html(contents);
	},
	loadContentHolder : function(contents, holder){
		$(holder).html(contents);
	},
	ajax_start : function() {
		$('.loading').show();
		$('button[type=submit]').attr('disabled',true);
		$('button[type=button]').attr('disabled',true);
	},
	ajax_stop : function() {
		$('.loading').hide();
		$('button[type=submit]').attr('disabled',false);
		$('button[type=button]').attr('disabled',false);
	},	
	ajax_error : function(status, errorThrown) {
		this.ajax_stop();
		if(status==403){
			$('#loginModal').modal('show');
		}else if(status==404){
			alert("Requested uri not found in the server.");			
		}else{
			//console.debug("Status: " + status + ".\n" + errorThrown);
		}				
	},
	
	ajaxRequestModelAction : function(params){
		var url = this.getFullPath(params);
		this.ajaxLoad(url,this.AJAX_CONTENT_HOLDER);
	},	
	
	ajaxLoad : function(url, placeholder) {		
		if (this.APP_XHR)
			this.APP_XHR.abort();
		this.APP_XHR = $.ajax({
			url : url,
			beforeSend:function (XMLHttpRequest) {
				PROJAPOTI.ajax_start();
			}, 
			success : function(data, textStatus, jqXHR) {
				$(placeholder).html(data);
				PROJAPOTI.ajax_stop();
			},
			error : function(jqXHR, textStatus, errorThrown) {
				PROJAPOTI.ajax_error(jqXHR.status, errorThrown);				
			}
		});
	},
	
	ajaxLoadWithRequestData : function(url,data, placeholder) {		
		if (this.APP_XHR)
			this.APP_XHR.abort();
		this.APP_XHR = $.ajax({
			url : url,
			data: data,
			beforeSend:function (XMLHttpRequest) {
				PROJAPOTI.ajax_start();
			}, 
			success : function(data, textStatus, jqXHR) {
				$(placeholder).html(data);
				PROJAPOTI.ajax_stop();
			},
			error : function(jqXHR, textStatus, errorThrown) {
				PROJAPOTI.ajax_error(jqXHR.status, errorThrown);				
			}
		});
	},
	
	ajaxLoadCallback : function(url, callback) {
		url = this.APP_URL_ROOT + url;
		if (this.APP_XHR)
			this.APP_XHR.abort();
		this.APP_XHR = $.ajax({
			url : url,
			beforeSend:function (XMLHttpRequest) {
				PROJAPOTI.ajax_start();
			}, 
			success : function(data, textStatus, jqXHR) {
				callback(data);
				PROJAPOTI.ajax_stop();
			},
			error : function(jqXHR, textStatus, errorThrown) {
				PROJAPOTI.ajax_error(jqXHR.status, errorThrown);
			}
		});
	},

	ajaxSubmitData : function(url, data) {
		url = this.APP_URL_ROOT + url;
		if (this.APP_XHR)
			this.APP_XHR.abort();
		this.APP_XHR = $.ajax({
			async:true, 
			type:"POST", 
			url: url,
			data: data, 
			beforeSend:function (jqXHR) {
				PROJAPOTI.ajax_start();
			}, 
			error:function (jqXHR, textStatus, errorThrown) {
				PROJAPOTI.ajax_error(jqXHR.status, errorThrown);
			}, 
			success:function (data, textStatus) {
				PROJAPOTI.ajax_stop();
				PROJAPOTI.loadContents(data);
			} 
		});
	},
	ajaxSubmitDataCallback : function(url, data, datatype, callback) {
		url = this.APP_URL_ROOT + url;
		if (this.APP_XHR)
			this.APP_XHR.abort();
		this.APP_XHR = $.ajax({
			async:true, 
			type:"POST", 
			url: url,
			dataType: datatype,
			data: data, 
			beforeSend:function (jqXHR) {
				PROJAPOTI.ajax_start();
			}, 
			error:function (jqXHR, textStatus, errorThrown) {
				PROJAPOTI.ajax_error(jqXHR.status, errorThrown);
			}, 
			success:function (data, textStatus) {
				PROJAPOTI.ajax_stop();
				callback(data);
			} 
		});
	},
	ajaxLogin : function(data) {
		url = this.APP_URL_ROOT + 'ajaxlogin';
		if (this.APP_XHR)
			this.APP_XHR.abort();
		this.APP_XHR = $.ajax({
			async:true, 
			type:"POST", 
			url: url,
			data: data, 
			beforeSend:function (XMLHttpRequest) {
				$('#login-loader').show();
				$('#login-error').hide();
			}, 
			success : function(data, textStatus, jqXHR) {
				$('#login-loader').hide();
				var flg = JSON.parse(data);
				if(flg.login){
					$('#loginModal').modal('hide');
				}else{
					$('#login-error').show();
				}
			},
			error : function(jqXHR, textStatus, errorThrown) {
				$('#login-loader').hide();
				PROJAPOTI.ajax_error(jqXHR.status, errorThrown);
			}
		});
	},
	
	ajaxDeleteRecordAction : function(action){
		if (confirm('Are you sure you want to delete record from the database?')) {
			this.ajaxRequestModelAction(action);
		}
	},
	ajaxDeleteRecordCallback : function(action){
		if (confirm('Are you sure you want to delete record from the database?')) {
			url = this.APP_URL_ROOT + action;
			if (this.APP_XHR)
				this.APP_XHR.abort();
			this.APP_XHR = $.ajax({
				url : url,
				beforeSend:function (XMLHttpRequest) {
					PROJAPOTI.ajax_start();
				}, 
				success : function(data, textStatus, jqXHR) {
					if(data == 1)
					{
						alert("Record has been deleted");
						location.reload();
					}
					else
					{
						alert("Error occurred");
					}
					PROJAPOTI.ajax_stop();
				},
				error : function(jqXHR, textStatus, errorThrown) {
					PROJAPOTI.ajax_error(jqXHR.status, errorThrown);
				}
			});
		}
	},
	ajaxDeleteRecord : function(url, placeholder){
		if (confirm('Are you sure you want to delete record from the database?')) {
			this.ajaxLoad(url, placeholder);
		}
	},
	refreshDataTable : function(tableId, refreshUrl) {
		$.getJSON(refreshUrl, null, function(json) {
			table = $(tableId).dataTable();
			oSettings = table.fnSettings();

			table.fnClearTable(this);

			for ( var i = 0; i < json.aaData.length; i++) {
				table.oApi._fnAddData(oSettings, json.aaData[i]);
			}

			oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
			table.fnDraw();
		});
	},
	
	zeroFill : function( number, width )
	{
	  width -= number.toString().length;
	  if ( width > 0 )
	  {
	    return new Array( width + (/\./.test( number ) ? 2 : 1) ).join( '0' ) + number;
	  }
	  return number + "";
	},
	reloadTableData:function(tableId){
		$('#'+tableId).dataTable()._fnAjaxUpdate();
	},
	
	projapoti_dropdown:function(placeholder, data, empty_text)
	{
		// Data: id->value
		$(placeholder).empty();
		var options = "<option value=\"0\">"+empty_text+"</option>";
		$.each(data, function(i, v){
			options += "<option value=\""+v+"\">"+v+"</option>";		
		});
		$(placeholder).append(options);
	},
	projapoti_dropdown_map:function(placeholder, data, empty_text, selected_value)
	{
		// Data: id->value
		$(placeholder).empty();
		var options = "<option value=\"0\">"+empty_text+"</option>";
		$.each(data, function(i, v){
			options += "<option value=\""+i+"\">"+v+"</option>";		
		});
		if(selected_value != ""){
			$(placeholder).val(selected_value);
		}
		$(placeholder).append(options);
	},
	
	clearProjapotiForm:function(form_id)
	{
		$(':input','#'+form_id)
		 .not(':button, :submit, :reset') // removed :hidden
		 .val('')
		 .removeAttr('checked')
		 .removeAttr('selected');	
	},
	disableBtn:function(btn_id)
	{
		if(btn_id == "")
		{
			$("button").each(function(){
				$btn = $(this);
				$btn.attr('disabled', 'disabled');
			});
		}
		else
		{
			$btn = $("#"+btn_id);
			$btn.attr('disabled', 'disabled');
		}
	},
	enableBtn:function(btn_id)
	{
		if(btn_id == "")
		{
			$("button").each(function(){
				$btn = $(this);
				$btn.removeAttr('disabled');
			});
		}
		else
		{
			$btn = $("#"+btn_id);
			$btn.removeAttr('disabled');
		}	
	},
	englishToBangla:function(input)
	{
		var output = [];
        for (var i = 0; i < input.length; ++i) {
            if (PROJAPOTI.numbers.hasOwnProperty(input[i])) {
                output.push(PROJAPOTI.numbers[input[i]]);
            } else {
                output.push(input[i]);
            }
        }
        return output.join('');
	},
	banglaToEnglish:function(input)
	{
		var output = [];
        for (var i = 0; i < input.length; ++i) {
            if (PROJAPOTI.bng_numbers.hasOwnProperty(input[i])) {
                output.push(PROJAPOTI.bng_numbers[input[i]]);
            } else {
                output.push(input[i]);
            }
        }
        return output.join('');
	},
	checkIsValidDate:function(dob, $format){
		var bn = PROJAPOTI.banglaToEnglish(dob);
		var m = moment(bn, $format);
		return m.isValid();
	},
};
  

