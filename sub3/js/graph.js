		var options = {
			'dataset': {
				title: '주주구성',
				values:[46, 32, 4, 5, 1,11],
				colorset: ['#faa7af', '#f7c238', '#de5374', '#29acc0', '#d81863','#44368b'],
				fields: ['Free Floats 46%',
				 		'Domestic Invetoras 32%',
				   		'reasury Stock 4%',
						'Foreign Investors 5%',
						'Employees 1%',
						'Manaement&Direciors 11%'
						] 
			},
			'donut_width' : 200, 
			'core_circle_radius':0,
			'chartDiv': 'chart',
			'chartType': 'pie',
			'chartSize': {width:1200, height:500}
		};

		Nwagon.chart(options);