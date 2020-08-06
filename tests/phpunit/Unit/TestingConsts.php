<?php


namespace Mermaid\Tests;


class TestingConsts
{
	const EXTRACTOR_VALUE_MAP = [
		[
			['sequenceDiagram...', 'config.theme=foo'],
			[['theme' => 'foo'], ['sequenceDiagram...']],
		], [
			['sequenceDiagram id1["This is the (text) in the box"]', 'config.theme=foo'],
			[['theme' => 'foo'], ['sequenceDiagram id1["This is the (text) in the box"]']],
		], [
			['A[Hard edge] -->|Link text| B(Round edge)'],
			[[], ['A[Hard edge] -->|Link text| B(Round edge)']],
		], [
			['graph LR;', 'config.theme=foo', 'config.flowchart.curve=basis'],
			[['theme' => 'foo', 'flowchart' => ['curve' => 'basis']], ['graph LR;']],
		], [
			['graph LR;', 'config.theme=foo', 'config.flowchart.useMaxWidth=false'],
			[['theme' => 'foo', 'flowchart' => ['useMaxWidth' => false]], ['graph LR;']],
		], [
			['config.gantt.titleTopMargin=40', 'gantt title A Gantt Diagram'],
			[['gantt' => ['titleTopMargin' => '40']], ['gantt title A Gantt Diagram']]
		]
	];
}
