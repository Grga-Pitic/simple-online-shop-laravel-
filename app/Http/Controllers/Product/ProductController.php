<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductRepository;
use App\Services\CommentListRepository;


class ProductController extends Controller {
	public function show(int $id = null){

		try {
			$container  = app();
			$productRepository = $container->make(ProductRepository::class);
			$commentRepository = $container->make(CommentListRepository::class);

			$model       = $productRepository->getProductByID($id);
			$commentList = $commentRepository->getListByProductId($id);
			return view('product', [
			    'model' => $model,
                'commentList' => $commentList
            ]);
		} catch (\UnderflowException $e){
			abort(404);
		}
		
	}
	
}