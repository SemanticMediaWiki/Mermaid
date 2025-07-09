<?php

namespace Mermaid\Tests;

class TestingConsts {
	const EXTRACTOR_VALUE_MAP = [
		[
			[ 'sequenceDiagram...', 'config.theme=foo' ],
			[ [ 'theme' => 'foo' ], [ 'sequenceDiagram...' ] ],
		],
		[
			[ 'sequenceDiagram id1["This is the (text) in the box"]', 'config.theme=foo' ],
			[ [ 'theme' => 'foo' ], [ 'sequenceDiagram id1["This is the (text) in the box"]' ] ],
		],
		[
			[ 'A[Hard edge] -->|Link text| B(Round edge)' ],
			[ [], [ 'A[Hard edge] -->|Link text| B(Round edge)' ] ],
		],
		[
			[ 'graph LR;', 'config.theme=foo', 'config.flowchart.curve=basis' ],
			[ [ 'theme' => 'foo', 'flowchart' => [ 'curve' => 'basis' ] ], [ 'graph LR;' ] ],
		],
		[
			[ 'graph LR;', 'config.theme=foo', 'config.flowchart.useMaxWidth=false' ],
			[ [ 'theme' => 'foo' ], [ 'graph LR;', 'config.flowchart.useMaxWidth=false' ] ],
		],
		[
			[ 'config.gantt.titleTopMargin=40', 'gantt title A Gantt Diagram' ],
			[ [ 'gantt' => [ 'titleTopMargin' => '40' ] ], [ 'gantt title A Gantt Diagram' ] ],
		],
		[
			[
				'sequenceDiagram;',
				'config.theme=dark',
				'config.flowchart.htmlLabels=true',
				'config.gantt.topAxis=false',
				'config.sequence.actorMargin=25',
				'config.sankey.showValues=true',
			],
			[
				[
					'theme' => 'dark',
					'flowchart' => [ 'htmlLabels' => true ],
					'gantt' => [ 'topAxis' => false ],
					'sequence' => [ 'actorMargin' => '25' ],
					'sankey' => [ 'showValues' => true ],
				],
				[ 'sequenceDiagram;' ],
			],
		],
		[
			[
				'graph TD;',
				'config.c4.componentFontSize=14',
				'config.c4.wrap=true',
				'config.c4.component_border_color=#000000',
			],
			[
				[
					'c4' => [
						'componentFontSize' => '14',
						'wrap' => true,
						'component_border_color' => '#000000',
					],
				],
				[ 'graph TD;' ],
			],
		],
		[
			[
				'flowchart;',
				'config.flowchart.arrowMarkerAbsolute=true',
				'config.flowchart.padding=15',
				'config.flowchart.wrappingWidth=300',
			],
			[
				[
					'flowchart' => [
						'arrowMarkerAbsolute' => true,
						'padding' => '15',
						'wrappingWidth' => '300',
					],
				],
				[ 'flowchart;' ],
			],
		],
		[
			[
				'stateDiagram;',
				'config.state.arrowMarkerAbsolute=false',
				'config.state.fontSize=16',
				'config.state.titleTopMargin=30',
			],
			[
				[
					'state' => [
						'arrowMarkerAbsolute' => false,
						'fontSize' => '16',
						'titleTopMargin' => '30',
					],
				],
				[ 'stateDiagram;' ],
			],
		],
		[
			[
				'sequenceDiagram;',
				'config.sequence.mirrorActors=true',
				'config.sequence.forceMenus=false',
				'config.sequence.showSequenceNumbers=true',
			],
			[
				[
					'sequence' => [
						'mirrorActors' => true,
						'forceMenus' => false,
						'showSequenceNumbers' => true,
					],
				],
				[ 'sequenceDiagram;' ],
			],
		],
		[
			[
				'timeline;',
				'config.timeline.activationWidth=120',
				'config.timeline.disableMulticolor=true',
				'config.timeline.rightAngles=false',
				'config.timeline.taskFontSize=14',
				'config.timeline.width=600',
			],
			[
				[
					'timeline' => [
						'activationWidth' => '120',
						'disableMulticolor' => true,
						'rightAngles' => false,
						'taskFontSize' => '14',
						'width' => '600',
					],
				],
				[ 'timeline;' ],
			],
		],
		[
			[
				'xyChart;',
				'config.xyChart.chartOrientation=horizontal',
				'config.xyChart.showTitle=true',
				'config.xyChart.titleFontSize=18',
				'config.xyChart.width=800',
				'config.xyChart.xAxis.showAxisLine=true',
				'config.xyChart.xAxis.showLabel=false',
				'config.xyChart.xAxis.tickLength=10',
				'config.xyChart.yAxis.showTitle=true',
				'config.xyChart.yAxis.tickWidth=2',
			],
			[
				[
					'xyChart' => [
						'chartOrientation' => 'horizontal',
						'showTitle' => true,
						'titleFontSize' => '18',
						'width' => '800',
						'xAxis' => [
							'showAxisLine' => true,
							'showLabel' => false,
							'tickLength' => '10',
						],
						'yAxis' => [
							'showTitle' => true,
							'tickWidth' => '2',
						],
					],
				],
				[ 'xyChart;' ],
			],
		],
		[
			[
				'xyChart;',
				'config.xyChart.height=400',
				'config.xyChart.plotReservedSpacePercent=15',
				'config.xyChart.xAxis.labelFontSize=12',
				'config.xyChart.xAxis.showTick=false',
				'config.xyChart.yAxis.labelPadding=8',
				'config.xyChart.yAxis.showAxisLine=false',
			],
			[
				[
					'xyChart' => [
						'height' => '400',
						'plotReservedSpacePercent' => '15',
						'xAxis' => [
							'labelFontSize' => '12',
							'showTick' => false,
						],
						'yAxis' => [
							'labelPadding' => '8',
							'showAxisLine' => false,
						],
					],
				],
				[ 'xyChart;' ],
			],
		],
	];
}
