<?php

namespace Mermaid;

/**
 * @license GNU GPL v2+
 * @since 2.4.0
 *
 * @author howlowck
 */
class MermaidConfigExtractor {

	/**
	 * Configuration map for Mermaid settings.
	 * Automatically generated from mermaid/config.type.ts.
	 *
	 * @var array<string, mixed>
	 */
	private $configMap = [
		// global
		'altFontFamily' => null,
		'arrowMarkerAbsolute' => FILTER_VALIDATE_BOOLEAN,
		'darkMode' => FILTER_VALIDATE_BOOLEAN,
		'deterministicIDSeed' => null,
		'deterministicIds' => FILTER_VALIDATE_BOOLEAN,
		'dompurifyConfig' => null,
		'fontFamily' => null,
		'fontSize' => null,
		'htmlLabels' => FILTER_VALIDATE_BOOLEAN,
		'legacyMathML' => FILTER_VALIDATE_BOOLEAN,
		'logLevel' => null,
		'maxEdges' => null,
		'maxTextSize' => null,
		'secure' => null,
		'securityLevel' => null,
		'startOnLoad' => FILTER_VALIDATE_BOOLEAN,
		'theme' => null,
		'themeCSS' => null,
		'themeVariables' => null,
		'wrap' => FILTER_VALIDATE_BOOLEAN,

		// block
		'block.padding' => null,

		// c4
		'c4.boundaryFont' => null,
		'c4.boundaryFontFamily' => null,
		'c4.boundaryFontSize' => null,
		'c4.boundaryFontWeight' => null,
		'c4.boxMargin' => null,
		'c4.c4BoundaryInRow' => null,
		'c4.c4ShapeInRow' => null,
		'c4.c4ShapeMargin' => null,
		'c4.c4ShapePadding' => null,
		'c4.componentFont' => null,
		'c4.componentFontFamily' => null,
		'c4.componentFontSize' => null,
		'c4.componentFontWeight' => null,
		'c4.component_bg_color' => null,
		'c4.component_border_color' => null,
		'c4.component_dbFont' => null,
		'c4.component_dbFontFamily' => null,
		'c4.component_dbFontSize' => null,
		'c4.component_dbFontWeight' => null,
		'c4.component_db_bg_color' => null,
		'c4.component_db_border_color' => null,
		'c4.component_queueFont' => null,
		'c4.component_queueFontFamily' => null,
		'c4.component_queueFontSize' => null,
		'c4.component_queueFontWeight' => null,
		'c4.component_queue_bg_color' => null,
		'c4.component_queue_border_color' => null,
		'c4.containerFont' => null,
		'c4.containerFontFamily' => null,
		'c4.containerFontSize' => null,
		'c4.containerFontWeight' => null,
		'c4.container_bg_color' => null,
		'c4.container_border_color' => null,
		'c4.container_dbFont' => null,
		'c4.container_dbFontFamily' => null,
		'c4.container_dbFontSize' => null,
		'c4.container_dbFontWeight' => null,
		'c4.container_db_bg_color' => null,
		'c4.container_db_border_color' => null,
		'c4.container_queueFont' => null,
		'c4.container_queueFontFamily' => null,
		'c4.container_queueFontSize' => null,
		'c4.container_queueFontWeight' => null,
		'c4.container_queue_bg_color' => null,
		'c4.container_queue_border_color' => null,
		'c4.diagramMarginX' => null,
		'c4.diagramMarginY' => null,
		'c4.external_componentFont' => null,
		'c4.external_componentFontFamily' => null,
		'c4.external_componentFontSize' => null,
		'c4.external_componentFontWeight' => null,
		'c4.external_component_bg_color' => null,
		'c4.external_component_border_color' => null,
		'c4.external_component_dbFont' => null,
		'c4.external_component_dbFontFamily' => null,
		'c4.external_component_dbFontSize' => null,
		'c4.external_component_dbFontWeight' => null,
		'c4.external_component_db_bg_color' => null,
		'c4.external_component_db_border_color' => null,
		'c4.external_component_queueFont' => null,
		'c4.external_component_queueFontFamily' => null,
		'c4.external_component_queueFontSize' => null,
		'c4.external_component_queueFontWeight' => null,
		'c4.external_component_queue_bg_color' => null,
		'c4.external_component_queue_border_color' => null,
		'c4.external_containerFont' => null,
		'c4.external_containerFontFamily' => null,
		'c4.external_containerFontSize' => null,
		'c4.external_containerFontWeight' => null,
		'c4.external_container_bg_color' => null,
		'c4.external_container_border_color' => null,
		'c4.external_container_dbFont' => null,
		'c4.external_container_dbFontFamily' => null,
		'c4.external_container_dbFontSize' => null,
		'c4.external_container_dbFontWeight' => null,
		'c4.external_container_db_bg_color' => null,
		'c4.external_container_db_border_color' => null,
		'c4.external_container_queueFont' => null,
		'c4.external_container_queueFontFamily' => null,
		'c4.external_container_queueFontSize' => null,
		'c4.external_container_queueFontWeight' => null,
		'c4.external_container_queue_bg_color' => null,
		'c4.external_container_queue_border_color' => null,
		'c4.external_personFont' => null,
		'c4.external_personFontFamily' => null,
		'c4.external_personFontSize' => null,
		'c4.external_personFontWeight' => null,
		'c4.external_person_bg_color' => null,
		'c4.external_person_border_color' => null,
		'c4.external_systemFont' => null,
		'c4.external_systemFontFamily' => null,
		'c4.external_systemFontSize' => null,
		'c4.external_systemFontWeight' => null,
		'c4.external_system_bg_color' => null,
		'c4.external_system_border_color' => null,
		'c4.external_system_dbFont' => null,
		'c4.external_system_dbFontFamily' => null,
		'c4.external_system_dbFontSize' => null,
		'c4.external_system_dbFontWeight' => null,
		'c4.external_system_db_bg_color' => null,
		'c4.external_system_db_border_color' => null,
		'c4.external_system_queueFont' => null,
		'c4.external_system_queueFontFamily' => null,
		'c4.external_system_queueFontSize' => null,
		'c4.external_system_queueFontWeight' => null,
		'c4.external_system_queue_bg_color' => null,
		'c4.external_system_queue_border_color' => null,
		'c4.height' => null,
		'c4.messageFont' => null,
		'c4.messageFontFamily' => null,
		'c4.messageFontSize' => null,
		'c4.messageFontWeight' => null,
		'c4.nextLinePaddingX' => null,
		'c4.personFont' => null,
		'c4.personFontFamily' => null,
		'c4.personFontSize' => null,
		'c4.personFontWeight' => null,
		'c4.person_bg_color' => null,
		'c4.person_border_color' => null,
		'c4.systemFont' => null,
		'c4.systemFontFamily' => null,
		'c4.systemFontSize' => null,
		'c4.systemFontWeight' => null,
		'c4.system_bg_color' => null,
		'c4.system_border_color' => null,
		'c4.system_dbFont' => null,
		'c4.system_dbFontFamily' => null,
		'c4.system_dbFontSize' => null,
		'c4.system_dbFontWeight' => null,
		'c4.system_db_bg_color' => null,
		'c4.system_db_border_color' => null,
		'c4.system_queueFont' => null,
		'c4.system_queueFontFamily' => null,
		'c4.system_queueFontSize' => null,
		'c4.system_queueFontWeight' => null,
		'c4.system_queue_bg_color' => null,
		'c4.system_queue_border_color' => null,
		'c4.width' => null,
		'c4.wrap' => FILTER_VALIDATE_BOOLEAN,
		'c4.wrapPadding' => null,

		// class
		'class.arrowMarkerAbsolute' => FILTER_VALIDATE_BOOLEAN,
		'class.defaultRenderer' => null,
		'class.diagramPadding' => null,
		'class.dividerMargin' => null,
		'class.htmlLabels' => FILTER_VALIDATE_BOOLEAN,
		'class.nodeSpacing' => null,
		'class.padding' => null,
		'class.rankSpacing' => null,
		'class.textHeight' => null,
		'class.titleTopMargin' => null,

		// er
		'er.diagramPadding' => null,
		'er.entityPadding' => null,
		'er.fill' => null,
		'er.fontSize' => null,
		'er.layoutDirection' => null,
		'er.minEntityHeight' => null,
		'er.minEntityWidth' => null,
		'er.stroke' => null,
		'er.titleTopMargin' => null,

		// flowchart
		'flowchart.arrowMarkerAbsolute' => FILTER_VALIDATE_BOOLEAN,
		'flowchart.curve' => null,
		'flowchart.defaultRenderer' => null,
		'flowchart.diagramPadding' => null,
		'flowchart.htmlLabels' => FILTER_VALIDATE_BOOLEAN,
		'flowchart.nodeSpacing' => null,
		'flowchart.padding' => null,
		'flowchart.rankSpacing' => null,
		'flowchart.subGraphTitleMargin.bottom' => null,
		'flowchart.subGraphTitleMargin.top' => null,
		'flowchart.titleTopMargin' => null,
		'flowchart.wrappingWidth' => null,

		// gantt
		'gantt.axisFormat' => null,
		'gantt.barGap' => null,
		'gantt.barHeight' => null,
		'gantt.displayMode' => null,
		'gantt.fontSize' => null,
		'gantt.gridLineStartPadding' => null,
		'gantt.leftPadding' => null,
		'gantt.numberSectionStyles' => null,
		'gantt.rightPadding' => null,
		'gantt.sectionFontSize' => null,
		'gantt.tickInterval' => null,
		'gantt.titleTopMargin' => null,
		'gantt.topAxis' => FILTER_VALIDATE_BOOLEAN,
		'gantt.topPadding' => null,
		'gantt.weekday' => null,

		// gitGraph
		'gitGraph.arrowMarkerAbsolute' => FILTER_VALIDATE_BOOLEAN,
		'gitGraph.diagramPadding' => null,
		'gitGraph.mainBranchName' => null,
		'gitGraph.mainBranchOrder' => null,
		'gitGraph.nodeLabel.height' => null,
		'gitGraph.nodeLabel.width' => null,
		'gitGraph.nodeLabel.x' => null,
		'gitGraph.nodeLabel.y' => null,
		'gitGraph.parallelCommits' => FILTER_VALIDATE_BOOLEAN,
		'gitGraph.rotateCommitLabel' => FILTER_VALIDATE_BOOLEAN,
		'gitGraph.showBranches' => FILTER_VALIDATE_BOOLEAN,
		'gitGraph.showCommitLabel' => FILTER_VALIDATE_BOOLEAN,
		'gitGraph.titleTopMargin' => null,

		// journey
		'journey.activationWidth' => null,
		'journey.actorColours' => null,
		'journey.bottomMarginAdj' => null,
		'journey.boxMargin' => null,
		'journey.boxTextMargin' => null,
		'journey.diagramMarginX' => null,
		'journey.diagramMarginY' => null,
		'journey.height' => null,
		'journey.leftMargin' => null,
		'journey.messageAlign' => null,
		'journey.messageMargin' => null,
		'journey.noteMargin' => null,
		'journey.rightAngles' => FILTER_VALIDATE_BOOLEAN,
		'journey.sectionColours' => null,
		'journey.sectionFills' => null,
		'journey.taskFontFamily' => null,
		'journey.taskFontSize' => null,
		'journey.taskMargin' => null,
		'journey.textPlacement' => null,
		'journey.width' => null,

		// mindmap
		'mindmap.maxNodeWidth' => null,
		'mindmap.padding' => null,

		// pie
		'pie.textPosition' => null,

		// quadrantChart
		'quadrantChart.chartHeight' => null,
		'quadrantChart.chartWidth' => null,
		'quadrantChart.pointLabelFontSize' => null,
		'quadrantChart.pointRadius' => null,
		'quadrantChart.pointTextPadding' => null,
		'quadrantChart.quadrantExternalBorderStrokeWidth' => null,
		'quadrantChart.quadrantInternalBorderStrokeWidth' => null,
		'quadrantChart.quadrantLabelFontSize' => null,
		'quadrantChart.quadrantPadding' => null,
		'quadrantChart.quadrantTextTopPadding' => null,
		'quadrantChart.titleFontSize' => null,
		'quadrantChart.titlePadding' => null,
		'quadrantChart.xAxisLabelFontSize' => null,
		'quadrantChart.xAxisLabelPadding' => null,
		'quadrantChart.xAxisPosition' => null,
		'quadrantChart.yAxisLabelFontSize' => null,
		'quadrantChart.yAxisLabelPadding' => null,
		'quadrantChart.yAxisPosition' => null,

		// requirement
		'requirement.fontSize' => null,
		'requirement.line_height' => null,
		'requirement.rect_border_color' => null,
		'requirement.rect_border_size' => null,
		'requirement.rect_fill' => null,
		'requirement.rect_min_height' => null,
		'requirement.rect_min_width' => null,
		'requirement.rect_padding' => null,
		'requirement.text_color' => null,

		// sankey
		'sankey.height' => null,
		'sankey.linkColor' => null,
		'sankey.nodeAlignment' => null,
		'sankey.prefix' => null,
		'sankey.showValues' => FILTER_VALIDATE_BOOLEAN,
		'sankey.suffix' => null,
		'sankey.useMaxWidth' => FILTER_VALIDATE_BOOLEAN,
		'sankey.width' => null,

		// sequence
		'sequence.activationWidth' => null,
		'sequence.actorFont' => null,
		'sequence.actorFontFamily' => null,
		'sequence.actorFontSize' => null,
		'sequence.actorFontWeight' => null,
		'sequence.actorMargin' => null,
		'sequence.arrowMarkerAbsolute' => FILTER_VALIDATE_BOOLEAN,
		'sequence.bottomMarginAdj' => null,
		'sequence.boxMargin' => null,
		'sequence.boxTextMargin' => null,
		'sequence.diagramMarginX' => null,
		'sequence.diagramMarginY' => null,
		'sequence.forceMenus' => FILTER_VALIDATE_BOOLEAN,
		'sequence.height' => null,
		'sequence.hideUnusedParticipants' => FILTER_VALIDATE_BOOLEAN,
		'sequence.labelBoxHeight' => null,
		'sequence.labelBoxWidth' => null,
		'sequence.messageAlign' => null,
		'sequence.messageFont' => null,
		'sequence.messageFontFamily' => null,
		'sequence.messageFontSize' => null,
		'sequence.messageFontWeight' => null,
		'sequence.messageMargin' => null,
		'sequence.mirrorActors' => FILTER_VALIDATE_BOOLEAN,
		'sequence.noteAlign' => null,
		'sequence.noteFont' => null,
		'sequence.noteFontFamily' => null,
		'sequence.noteFontSize' => null,
		'sequence.noteFontWeight' => null,
		'sequence.noteMargin' => null,
		'sequence.rightAngles' => FILTER_VALIDATE_BOOLEAN,
		'sequence.showSequenceNumbers' => FILTER_VALIDATE_BOOLEAN,
		'sequence.width' => null,
		'sequence.wrap' => FILTER_VALIDATE_BOOLEAN,
		'sequence.wrapPadding' => null,

		// state
		'state.arrowMarkerAbsolute' => FILTER_VALIDATE_BOOLEAN,
		'state.compositTitleSize' => null,
		'state.defaultRenderer' => null,
		'state.dividerMargin' => null,
		'state.edgeLengthFactor' => null,
		'state.fontSize' => null,
		'state.fontSizeFactor' => null,
		'state.forkHeight' => null,
		'state.forkWidth' => null,
		'state.labelHeight' => null,
		'state.miniPadding' => null,
		'state.noteMargin' => null,
		'state.padding' => null,
		'state.radius' => null,
		'state.sizeUnit' => null,
		'state.textHeight' => null,
		'state.titleShift' => null,
		'state.titleTopMargin' => null,

		// timeline
		'timeline.activationWidth' => null,
		'timeline.actorColours' => null,
		'timeline.bottomMarginAdj' => null,
		'timeline.boxMargin' => null,
		'timeline.boxTextMargin' => null,
		'timeline.diagramMarginX' => null,
		'timeline.diagramMarginY' => null,
		'timeline.disableMulticolor' => FILTER_VALIDATE_BOOLEAN,
		'timeline.height' => null,
		'timeline.leftMargin' => null,
		'timeline.messageAlign' => null,
		'timeline.messageMargin' => null,
		'timeline.noteMargin' => null,
		'timeline.padding' => null,
		'timeline.rightAngles' => FILTER_VALIDATE_BOOLEAN,
		'timeline.sectionColours' => null,
		'timeline.sectionFills' => null,
		'timeline.taskFontFamily' => null,
		'timeline.taskFontSize' => null,
		'timeline.taskMargin' => null,
		'timeline.textPlacement' => null,
		'timeline.width' => null,

		// xyChart
		'xyChart.chartOrientation' => null,
		'xyChart.height' => null,
		'xyChart.plotReservedSpacePercent' => null,
		'xyChart.showTitle' => FILTER_VALIDATE_BOOLEAN,
		'xyChart.titleFontSize' => null,
		'xyChart.titlePadding' => null,
		'xyChart.width' => null,
		'xyChart.xAxis.axisLineWidth' => null,
		'xyChart.xAxis.labelFontSize' => null,
		'xyChart.xAxis.labelPadding' => null,
		'xyChart.xAxis.showAxisLine' => FILTER_VALIDATE_BOOLEAN,
		'xyChart.xAxis.showLabel' => FILTER_VALIDATE_BOOLEAN,
		'xyChart.xAxis.showTick' => FILTER_VALIDATE_BOOLEAN,
		'xyChart.xAxis.showTitle' => FILTER_VALIDATE_BOOLEAN,
		'xyChart.xAxis.tickLength' => null,
		'xyChart.xAxis.tickWidth' => null,
		'xyChart.xAxis.titleFontSize' => null,
		'xyChart.xAxis.titlePadding' => null,
		'xyChart.yAxis.axisLineWidth' => null,
		'xyChart.yAxis.labelFontSize' => null,
		'xyChart.yAxis.labelPadding' => null,
		'xyChart.yAxis.showAxisLine' => FILTER_VALIDATE_BOOLEAN,
		'xyChart.yAxis.showLabel' => FILTER_VALIDATE_BOOLEAN,
		'xyChart.yAxis.showTick' => FILTER_VALIDATE_BOOLEAN,
		'xyChart.yAxis.showTitle' => FILTER_VALIDATE_BOOLEAN,
		'xyChart.yAxis.tickLength' => null,
		'xyChart.yAxis.tickWidth' => null,
		'xyChart.yAxis.titleFontSize' => null,
		'xyChart.yAxis.titlePadding' => null,
	];

	/**
	 * Extracts the param array into a tuple of two arrays
	 * @param array $params
	 * @return array [$mermaidConfig, $mediawikiParam]
	 */
	public function extract( array $params ) {
		$configMapKeys = array_keys( $this->configMap );

		// Use reduce to split the param array into two arrays: [$mermaidConfig, $mediawikiParam]
		return array_reduce( $params, function ( $prev, $current ) use ( $configMapKeys ) {
			// De-structures the two arrays
			list( $mermaidConfig, $mwParams ) = $prev;

			// if there is no "=", it belongs in mediawiki params
			if ( strpos( $current, '=' ) === false ) {
				$mwParams[] = $current;
				return [ $mermaidConfig, $mwParams ];
			}

			// split from the first "=" into two parts, then trim both parts
			list( $key, $value ) = array_map( 'trim', explode( '=', $current, 2 ) );

			// test to see if the leftside of the "=" is in the configMap keys
			$normalizedKey = $this->keyNamingNormalizer( $key );
			$inConfigMap = in_array( $normalizedKey, $configMapKeys, true );

			// if not in config map, the value belongs in the mediawiki params
			if ( !$inConfigMap ) {
				$mwParams[] = $current;
				return [ $mermaidConfig, $mwParams ];
			}

			// config key is in the config map
			// check to see if there is a type associated with the key
			$normalizedValue = $value;
			$valueType = $this->configMap[$normalizedKey];
			if ( $valueType !== null ) {
				// normalize: 'true' => true, '1' => true, etc
				$normalizedValue = filter_var( $value, $valueType, FILTER_NULL_ON_FAILURE );
			}

			// set the config with dot.notation
			$this->setWithDotNotation( $mermaidConfig, $normalizedKey, $normalizedValue );
			return [ $mermaidConfig, $mwParams ];
		}, [ [], [] ] );
	}

	/**
	 * Removes "config." from the dot-notationed configuration key
	 * @param string $key
	 * @return false|string
	 */
	protected function keyNamingNormalizer( string $key ) {
		if ( strpos( $key, 'config.' ) === false ) {
			return $key;
		}
		return substr( $key, 7 );
	}

	// Taken from Laravel's Arr::set function
	// https://github.com/laravel/framework/blob/7.x/src/Illuminate/Support/Arr.php
	/**
	 * Sets a value onto an array with keys using dot.notation, in-place
	 * @param &$array
	 * @param $key
	 * @param $value
	 * @return array|mixed
	 */
	protected function setWithDotNotation( &$array, $key, $value ) {
		if ( is_null( $key ) ) {
			return $array = $value;
		}

		$keys = explode( '.', $key );

		foreach ( $keys as $i => $key ) {
			if ( count( $keys ) === 1 ) {
				break;
			}

			unset( $keys[$i] );

			// If the key doesn't exist at this depth, we will just create an empty array
			// to hold the next value, allowing us to create the arrays to hold final
			// values at the correct depth. Then we'll keep digging into the array.
			if ( !isset( $array[$key] ) || !is_array( $array[$key] ) ) {
				$array[$key] = [];
			}

			$array = &$array[$key];
		}

		$array[array_shift( $keys )] = $value;

		return $array;
	}
}
