jQuery(document).ready(function() {
	jQuery("input[display='week']").each( function () {
		jQuery(this).datepicker({
			dateFormat : jQuery(this).attr("dateformat"),
			minDate : jQuery(this).attr("mindate"),
			maxDate : jQuery(this).attr("maxdate"),
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
			showWeek: true,
			beforeShow: function(dateText, inst) {
				// for week highighting
				jQuery(".ui-datepicker-calendar tbody tr").live("mousemove", function() {
					jQuery(this).find("td a").addClass("ui-state-hover");
					jQuery(this).find(".ui-datepicker-week-col").addClass("ui-state-hover");
				});
				jQuery(".ui-datepicker-calendar tbody tr").live("mouseleave", function() {
					jQuery(this).find("td a").removeClass("ui-state-hover");
					jQuery(this).find(".ui-datepicker-week-col").removeClass("ui-state-hover");
				});
			},
			onClose: function(dateText, inst) {
				var date = jQuery(this).datepicker( "getDate" );
				var dateFormat = inst.settings.dateFormat || jQuery(this).datepicker._defaults.dateFormat;
				var endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 6);
				var endDateFormatted = jQuery.datepicker.formatDate( dateFormat, endDate, inst.settings );
				jQuery(this).val(dateText + " - " + endDateFormatted);
				// disable live listeners so they dont impact other instances
				jQuery(".ui-datepicker-calendar tbody tr").die("mousemove");
				jQuery(".ui-datepicker-calendar tbody tr").die("mouseleave");
			}
		});
	});
});