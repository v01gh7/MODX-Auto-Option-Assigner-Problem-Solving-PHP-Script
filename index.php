<?php

function prepareSqlQuery($sqlQuery){
	global $modx;
	return $modx->query($sqlQuery);
}


function extractResultsFromQueryObject($sqlQueryResult, $itemsToRetreive, $multiDimensionRetreive=false){
	global $modx;
	$results = array();

	if (is_object($sqlQueryResult)) {
		while ($row = $sqlQueryResult->fetch(PDO::FETCH_ASSOC)) {
			if($multiDimensionRetreive){
				foreach($itemsToRetreive as $key => $value){
					array_push($results, $row[$key], $row[$value]);
				}	    		
			} else {
				foreach($itemsToRetreive as $itemToRetreive){
					array_push($results, $row[$itemToRetreive]);
				}
			}
		}
	}
	return $results;
}


$prepareSqlQueryOfRetreiveCategories = prepareSqlQuery('SELECT modx_site_content.id FROM `modx_site_content` WHERE modx_site_content.class_key = "msCategory"');
$categoriesIds = extractResultsFromQueryObject($prepareSqlQueryOfRetreiveCategories, array('id'));

if(count($categoriesIds) > 0){

	foreach($categoriesIds as $categoryId){

		$productsQueryObject = prepareSqlQuery('SELECT modx_site_content.id FROM `modx_site_content` WHERE modx_site_content.class_key = "msProduct" AND modx_site_content.parent = "'.$categoryId.'"');
		$productsIds = extractResultsFromQueryObject($productsQueryObject, array('id'));

		if(count($productsIds) > 0){
			$productsIds = implode(",", $productsIds);

			$distinctProductOptionsSqlQuery = prepareSqlQuery('SELECT DISTINCT modx_ms2_product_options.key FROM `modx_ms2_product_options` WHERE modx_ms2_product_options.product_id IN ('.$productsIds.")");
			$distinctProductOptions = extractResultsFromQueryObject($distinctProductOptionsSqlQuery, array('key'));

			$uniqueOptions = "";
			$uniqueOptionsLength = count($distinctProductOptions);
			foreach ($distinctProductOptions as $idx => $value) {
				if($idx >= $uniqueOptionsLength - 1){
					$uniqueOptions .= "'$value'";
				} else{
					$uniqueOptions .= "'$value',";
				}
			}


			$uniqueOptionsIdsSqlQuery = prepareSqlQuery('SELECT modx_ms2_options.id,modx_ms2_options.key FROM `modx_ms2_options` WHERE modx_ms2_options.key IN ('.$uniqueOptions.')');
			$uniqueOptionsIds = extractResultsFromQueryObject($uniqueOptionsIdsSqlQuery, array('id'));


			/* #################################### ##################################### */
			foreach($uniqueOptionsIds as $idx => $uniqueOptionId){
				if (!$cop = $modx->getObject('msCategoryOption', array('option_id' => $uniqueOptionId, 'category_id' => $categoryId))) {
					$table = $modx->getTableName('msCategoryOption');
					$sql = "INSERT INTO {$table} (`option_id`,`category_id`,`active`) VALUES ({$uniqueOptionId}, {$categoryId}, 1);";
					$stmt = $modx->prepare($sql);
					$stmt->execute();
				} else {
					$q = $modx->newQuery('msCategoryOption');
					$q->command('UPDATE');
					$q->where(array('option_id' => $uniqueOptionId, 'category_id' => $categoryId));
					$q->set(array('active' => 1));
					$q->prepare();
					$q->stmt->execute();
				}            
				
			}
			/* #################################### ##################################### */
			echo 'Done';
		}
	}
}