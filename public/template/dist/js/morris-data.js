/*Morris Init*/
$(function() {
	"use strict";
	
    if($('#morris_area_chart').length > 0)
		// Area Chart
		Morris.Area({
			element: 'morris_area_chart',
			data: [{
				period: '2010 Q1',
				iphone: 2666,
				ipad: null,
				itouch: 2647
			}, {
				period: '2010 Q3',	
				iphone: 4912,
				ipad: 1969,
				itouch: 2501
			}],
			xkey: 'period',
			ykeys: ['iphone', 'ipad', 'itouch'],
			labels: ['iPhone', 'iPad', 'iPod Touch'],
			pointSize: 0,
			pointStrokeColors:['#177ec1', '#dc4666', '#e69a2a'],
			behaveLikeLine: true,
			gridLineColor: '#878787',
			lineWidth: 0,
			smooth: true,
			hideHover: 'auto',
			lineColors: ['#177ec1', '#dc4666', '#e69a2a'],
			resize: true,
			gridTextColor:'#878787',
			gridTextFamily:"Roboto",
		});

    if($('#morris_donut_chart').length > 0) {
		// Donut Chart
		Morris.Donut({
			element: 'morris_donut_chart',
			data: [{
				label: "Download Sales",
				value: 12
			}, {
				label: "In-Store Sales",
				value: 30
			}, {
				label: "Mail-Order Sales",
				value: 20
			}],
			colors: ['#177ec1', '#dc4666', '#e69a2a'],
			resize: true,
			labelColor: '#878787',
		});
		$("div svg text").attr("style","font-family: Roboto").attr("font-weight","400");
	}	

    if($('#morris_line_chart').length > 0)
		// Line Chart
		Morris.Line({
			// ID of the element in which to draw the chart.
			element: 'morris_line_chart',
			// Chart data records -- each entry in this array corresponds to a point on
			// the chart.
			data: [{
				d: '2012-10-01',
				visits: 802
			}, {
				d: '2012-10-02',
				visits: 783
			}, {
				d: '2012-10-03',
				visits: 820
			}, ],
			// The name of the data record attribute that contains x-visitss.
			xkey: 'd',
			// A list of names of data record attributes that contain y-visitss.
			ykeys: ['visits'],
			// Labels for the ykeys -- will be displayed when you hover over the
			// chart.
			labels: ['Visits'],
			// Disables line smoothing
			pointSize: 1,
			pointStrokeColors:['#177ec1'],
			behaveLikeLine: true,
			gridLineColor: '#878787',
			gridTextColor:'#878787',
			lineWidth: 2,
			smooth: true,
			hideHover: 'auto',
			lineColors: ['#177ec1'],
			resize: true,
			gridTextFamily:"Roboto"
		});

	if($('#morris_bar_chart').length > 0)
	   // Bar Chart
		Morris.Bar({
			element: 'morris_bar_chart',
			data: [{
				device: 'Januari',
				geekbench: 700
			}, {
				device: 'Februari',
				geekbench: 500
			}, {
				device: 'Maret',
				geekbench: 550
			}, {
				device: 'April',
				geekbench: 600
			}, {
				device: 'Maret',
				geekbench: 655
			}, {
				device: 'April',
				geekbench: 655
			}, {
				device: 'Mei',
				geekbench: 655
			}, {
				device: 'Juni',
				geekbench: 655
			}, {
				device: 'Juli',
				geekbench: 655
			}, {
				device: 'Agustus',
				geekbench: 655
			}, {
				device: 'September',
				geekbench: 655
			}, {
				device: 'Oktober',
				geekbench: 655
			}, {
				device: 'November',
				geekbench: 655
			}, {
				device: 'Desember ',
				geekbench: 655
			}],
			xkey: 'device',
			ykeys: ['geekbench'],
			labels: ['Geekbench'],
			barRatio: 0.4,
			xLabelAngle: 35,
			pointSize: 1,
			pointStrokeColors:['#e69a2a'],
			behaveLikeLine: true,
			gridLineColor: '#878787',
			gridTextColor:'#878787',
			hideHover: 'auto',
			barColors: ['#e69a2a'],
			resize: true,
			gridTextFamily:"Roboto"
		});
	
	if($('#morris_extra_line_chart').length > 0)
		Morris.Line({
        element: 'morris_extra_line_chart',
        data: [{
            period: '2010',
            iphone: 50,
            ipad: 80,
            itouch: 20
        }, {
            period: '2011',
            iphone: 130,
            ipad: 100,
            itouch: 80
        }, {
            period: '2012',
            iphone: 80,
            ipad: 60,
            itouch: 70
        }],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['iPhone', 'iPad', 'iPod Touch'],
        pointSize: 2,
        fillOpacity: 0,
		lineWidth:2,
		pointStrokeColors:['#177ec1', '#dc4666', '#e69a2a'],
		behaveLikeLine: true,
		gridLineColor: '#878787',
		hideHover: 'auto',
		lineColors: ['#177ec1', '#dc4666', '#e69a2a'],
		resize: true,
		gridTextColor:'#878787',
		gridTextFamily:"Roboto"
        
    });
	
	if($('#morris_extra_bar_chart').length > 0)
		// Morris bar chart
		Morris.Bar({
			element: 'morris_extra_bar_chart',
			data: [{
				y: '2006',
				a: 100,
				b: 90,
				c: 60
			}, {
				y: '2007',
				a: 75,
				b: 65,
				c: 40
			}],
			xkey: 'y',
			ykeys: ['a', 'b', 'c'],
			labels: ['A', 'B', 'C'],
			barColors:['#177ec1', '#dc4666', '#e69a2a'],
			hideHover: 'auto',
			gridLineColor: '#878787',
			resize: true,
			gridTextColor:'#878787',
			gridTextFamily:"Roboto"
		});

});
