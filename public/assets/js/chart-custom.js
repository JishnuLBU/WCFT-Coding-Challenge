! function(e) {
	"use strict";

	function t(t) {
		t ? e(".right-sidebar-mini").addClass("right-sidebar") : e(".right-sidebar-mini").removeClass("right-sidebar")
	}
	e(document).ready(function() {
		var a = !1;
		t(a), e(document).on("click", ".right-sidebar-toggle", function() {
			t(a = !a)
		})
	})
}(jQuery);
var options = {
	chart: {
		height: 80,
		type: "area",
		sparkline: {
			enabled: !0
		},
		group: "sparklines"
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		width: 3,
		curve: "smooth"
	},
	fill: {
		type: "gradient",
		gradient: {
			shadeIntensity: 1,
			opacityFrom: .5,
			opacityTo: 0
		}
	},
	series: [{
		name: "series1",
		data: [60, 15, 50, 30, 70]
	}],
	colors: ["var(--iq-primary)"],
	xaxis: {
		type: "datetime",
		categories: ["2018-08-19T00:00:00", "2018-09-19T01:30:00", "2018-10-19T02:30:00", "2018-11-19T01:30:00", "2018-12-19T01:30:00"]
	},
	tooltip: {
		x: {
			format: "dd/MM/yy HH:mm"
		}
	}
};


