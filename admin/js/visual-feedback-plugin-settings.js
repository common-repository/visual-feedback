jQuery(document).ready(function($) {
    
	$.extend({
		getUrlVars: function(){
			var vars = [], hash;
			var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			for(var i = 0; i < hashes.length; i++)
			{
				hash = hashes[i].split('=');
				vars.push(hash[0]);
				vars[hash[0]] = hash[1];
			}
			return vars;
		},
		getURLParameter: function(name){
			return $.getUrlVars()[name];
		}
	});

	// Attempt to grab parameters from URL, will return null if no parameters present
	var newEventID = $.getURLParameter("seid");
	var newEventShareLink = $.getURLParameter("sesl");
	var newEventTitle = $.getURLParameter("set");
	var newProjectID = $.getURLParameter("spid");
	var newProjectTitle = $.getURLParameter("spt");

	// Flag
	var oneOrMoreUpdatedFields = false;

	//console.log("New Event ID: ", newEventID);
	//console.log("New Event Title: ", newEventTitle);
	//console.log("New Project ID: ", newProjectID);
	//console.log("New Project Title: ", newProjectTitle);
	console.log("New Event Share Link: ", newEventShareLink);

	// If updated Event ID was provided
	if (newEventID != null && newEventID != "undefined") {
		// Decode parameter value
		newEventID = decodeURIComponent(newEventID.replace(/\+/g, ' '));
		// If value has been changed i.e. we are not updating the field to the same value it already holds
		if(newEventID != $('#visual_feedback_by_timeline__user_options_vf_user_specified_event_id').val()) {
			// Set flag
			oneOrMoreUpdatedFields = true;
			// Update input value on page
			$('#visual_feedback_by_timeline__user_options_vf_user_specified_event_id').val(newEventID);
		}
	}

	// If updated Event Share Link
	if (newEventShareLink != null && newEventShareLink != "undefined") {
		// If value has been changed i.e. we are not updating the field to the same value it already holds
		if(newEventShareLink != $('#visual_feedback_by_timeline__user_options_vf_user_specified_event_share_link').val()) {
			// Set flag
			oneOrMoreUpdatedFields = true;
			// Update input value on page
			$('#visual_feedback_by_timeline__user_options_vf_user_specified_event_share_link').val(newEventShareLink);
		}
	}

	// If updated Event title was provided
	if (newEventTitle != null && newEventTitle != "undefined") {
		// Decode parameter value
		newEventTitle = decodeURIComponent(newEventTitle.replace(/\+/g, ' '));
		// If value has been changed i.e. we are not updating the field to the same value it already holds
		if(newEventTitle != $('#visual_feedback_by_timeline__user_options_vf_user_specified_event_title').val()) {
			// Set flag
			oneOrMoreUpdatedFields = true;
			// Update input value on page
			$('#visual_feedback_by_timeline__user_options_vf_user_specified_event_title').val(newEventTitle);
		}
	}

	// If updated Project ID was provided
	if (newProjectID != null && newProjectID != "undefined") {
		// Parameter value should be an integer only but decode it just to be safe
		newProjectID = decodeURIComponent(newProjectID.replace(/\+/g, ' '));
		// If value has been changed i.e. we are not updating the field to the same value it already holds
		if(newProjectID != $('#visual_feedback_by_timeline__user_options_vf_user_specified_project_id').val()) {
			// Set flag
			oneOrMoreUpdatedFields = true;
			// Update input value on page
			$('#visual_feedback_by_timeline__user_options_vf_user_specified_project_id').val(newProjectID);
		}
	}

	// If updated Project title was provided
	if (newProjectTitle != null && newProjectTitle != "undefined") {
		// Parameter value should be an integer only but decode it just to be safe
		newProjectTitle = decodeURIComponent(newProjectTitle.replace(/\+/g, ' '));
		// If value has been changed i.e. we are not updating the field to the same value it already holds
		if(newProjectTitle != $('#visual_feedback_by_timeline__user_options_vf_user_specified_project_title').val()) {
			// Set flag
			oneOrMoreUpdatedFields = true;
			// Update input value on page
			$('#visual_feedback_by_timeline__user_options_vf_user_specified_project_title').val(newProjectTitle);
		}
	}

	// If one or more fields are being updated via params
	if(oneOrMoreUpdatedFields) {

		// Manually submit form for user to prevent them from having to do so after configuring the plugin off-site
		$('form#visual_feedback_by_timeline__plugin_settings_form').find('input[type="submit"]').trigger('click');

	}

	// If user has not configured plugin yet, disable the form and instruct the user to configure it
	if($('#visual_feedback_by_timeline__user_options_vf_user_specified_event_id').val() == -1 || $('#visual_feedback_by_timeline__user_options_vf_user_specified_event_id').val() == "" || 
		 $('#visual_feedback_by_timeline__user_options_vf_user_specified_project_id').val() == -1 || $('#visual_feedback_by_timeline__user_options_vf_user_specified_project_id').val() == "") {

		$('#visual_feedback_by_timeline__plugin_settings_form').addClass('visual_feedback_by_timeline__form_disabled');
		$('body.toplevel_page_visual-feedback-settings-page h1').after('<div class="notice notice-warning"><p>Visual Feedback has not yet been configured. Please do so by clicking the "Configure Plugin" button below.</p></div>');

	}

	// If user enables/disable feedback, automatically save the changes
	$('#visual_feedback_by_timeline__user_options_vf_is_feedback_enabled').change(function() {
		$('form#visual_feedback_by_timeline__plugin_settings_form').find('input[type="submit"]').trigger('click');
      if(this.checked) {
      	$('#visual_feedback_by_timeline__feedback_disabled_message').remove();
      } else {
      	$('#visual_feedback_by_timeline__feedback_enabled_message').remove();
      }
      // Add message informing user we are saving their changes
      if (!$('#visual_feedback_by_timeline__feedback_please_save_message').length) {
      	$('label[for="visual_feedback_by_timeline__user_options_vf_is_feedback_enabled"]').after('<span id="visual_feedback_by_timeline__feedback_please_save_message">Saving your changes...</span>');
      }
	
  });
    
});