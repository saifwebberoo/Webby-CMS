<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 *
 * @property Image $Image
 */
class ImagesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'admin_upload';
		$this->set('cur_menuh','Media');
		$this->set('cur_url', '/admin/images/index');
	}

	
/**
 * admin_list method
 *
 * @return void
 */
	public function admin_list($clear = 0, $limit = null) {
		
		if($limit){
			$this->admin_setPaging($limit);
		}else{
			$limit = $this->admin_getPaging();
		}
		
		$this->layout = 'ajax';

		if($clear==1){
			$this->Session->delete('AImage');
		}else{
			if(isset($this->data['Image'])){
				$this->Session->delete('AImage');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => $limit   
		);
		
        $this->Image->recursive = 0;        
		$this->set('images', $this->paginate($this->cond));
		
		
		$imageCategories = $this->Image->ImageCategory->find('list');
		$this->set(compact('imageCategories'));
	}

/**
 * admin_filter method
 *
 * @return void
 */
	private function admin_filter() {
		if(isset($this->data['Image'])){
			$input = $this->data['Image'];
			if(isset($input['name']) && strlen(trim($input['name']))>0){
				$this->Session->write('AImage.name',$input['name']);
			}
			if(isset($input['image_category_id']) && strlen(trim($input['image_category_id']))>0){
				$this->Session->write('AImage.image_category_id',$input['image_category_id']);
			}
			if(isset($input['modified'])){
				$this->Session->write('AImage.modified',$input['modified']);
			}
			
		}
		
		$this->cond = array();
		if($this->Session->check('AImage.name')){
			$this->cond['Image.name LIKE'] = $this->Session->read('AImage.name').'%';
		}
		if($this->Session->check('AImage.image_category_id')){
			$this->cond['Image.image_category_id'] = $this->Session->read('AImage.image_category_id');
		}
	}
	
/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		$this->set('image', $this->Image->read(null, $id));
	}

/**
 * admin image cropping method
 *
 * @return void
 */
 
	function admin_crop_image($catId){
		$this->Image->ImageCategory->recursive = -1;
		$imgCat = $this->Image->ImageCategory->read('path_name', $catId);
		$this->AjaxUploadCrop = $this->Components->load('AjaxUploadCrop');
		$this->AjaxUploadCrop->cropImage($imgCat['ImageCategory']['path_name']);
	} 
	
/**
 * admin ajax upload method
 *
 * @return void
 */
	
	function admin_ajax_upload($catId){
		
		$this->layout = 'ajax';
		
		$this->Image->ImageCategory->recursive = -1;
		$imgCat = $this->Image->ImageCategory->read('crop_width, crop_height, path_name', $catId);
		
		$dirPath = $imgCat['ImageCategory']['path_name'];
		
		$this->AjaxUploadCrop = $this->Components->load('AjaxUploadCrop');
  		// list of valid extensions, ex. array("jpeg", "xml", "bmp")
		$allowedExtensions = array();
		// max file size in bytes
		$sizeLimit = 10 * 1024 * 1024;
		$this->AjaxUploadCrop->init($allowedExtensions, $sizeLimit);
		$result = $this->AjaxUploadCrop->handleUpload('uploads/'.$dirPath.'/');
		
		$result['crop_width'] = $imgCat['ImageCategory']['crop_width'];
		$result['crop_height'] = $imgCat['ImageCategory']['crop_height'];
		
		echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		//
		$this->ImageResizer = $this->Components->load('ImageResizer');
		$s_image = WWW_ROOT.'uploads/'.$dirPath.'/'.$result['file_name'];
		$d_image = WWW_ROOT.'uploads/'.$dirPath.'/thumb_images/'.$result['file_name'];
		$options = array('maxWidth' => $imgCat['ImageCategory']['crop_width'], 'maxHeight' => $imgCat['ImageCategory']['crop_height'], 'output'=> $d_image);
		$this->ImageResizer->resizeImage($s_image,$options); 	
	}	
	
/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'ajax';
		if ($this->request->is('post')) {
			$this->Image->create();
			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved'));
				$this->request->data = array();
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		}
		$imageCategories = $this->Image->ImageCategory->find('list');
		$this->set(compact('imageCategories'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->layout = 'ajax';
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Image->save($this->request->data)) {
				$this->request->data = $this->Image->read(null, $id);
				$this->Session->setFlash(__('The image has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		} else {
			$this->request->data = $this->Image->read(null, $id);
		}
		$imageCategories = $this->Image->ImageCategory->find('list');
		$this->set(compact('imageCategories'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		
		$imageInfo = $this->Image->read(null,$id);
		$dirPath = $imageInfo['ImageCategory']['path_name'];
		$file_name = $imageInfo['Image']['image_name'];
		
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		if ($this->Image->delete()) {
			@unlink(WWW_ROOT.'uploads/'.$dirPath.'/'.$file_name);
			@unlink(WWW_ROOT.'uploads/'.$dirPath.'/thumb_images/'.$file_name);
			@unlink(WWW_ROOT.'uploads/'.$dirPath.'/croped_images/'.$file_name);
			$this->Session->setFlash(__('Image deleted'));
		}
		$this->Session->setFlash(__('Image was not deleted'));
		$this->autoRender = false;
	}
	
	
	public function sliderxml($imageCatId = null, $imageCount = null){
		if($imageCatId && $imageCount){
			$this->layout = 'ajax';
			$this->Image->ImageCategory->recursive = -1;
			$imageCatInfo = $this->Image->ImageCategory->read('path_name', $imageCatId);
			$this->set('dirPath', $imageCatInfo['ImageCategory']['path_name']);
			$this->set('images', $this->Image->find('all',array(
				'conditions' => array(
					'image_category_id' => $imageCatId
				),
				'order' => 'rand()',
				'limit' => 9,
				'recursive' => -1,
				'fields' => array(
					'id',
					'image_name',
					'name'
				)
			)));	
		}
	}
}
