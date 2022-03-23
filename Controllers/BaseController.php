<?php 

class BaseController
{
	const VIEW_FOLDER_NAME = 'Views';

	const MODEL_FOLDER_NAME = 'Models';
	/**
	 * Description:
	 *  + path name: folderName.fileName
	 *  + Lấy từ sau thư mục Views
	 */

	protected function view($viewPath, $data)
	{
		
		foreach($data as $key => $value){
			$$key = $value;
		}
		
		$viewPath = self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath) . '.php';
		require $viewPath;
	}

	protected function loadModel($modelPath)
	{
		$modelPath = self::MODEL_FOLDER_NAME . '/' . $modelPath . '.php';
		require $modelPath;
	}

}

?>