<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Products\Interfaces\ProductsControllerInterface;
use App\Models\Products\CreateProductRequest;
use App\Models\Products\UpdateProductRequest;
use App\Services\Products\Interfaces\ProductsCommandServiceInterface;
use App\Services\Products\Interfaces\ProductsQueryServiceInterface;
use App\System\Exceptions\InvalidValueException;
use App\System\Exceptions\ItemDoesNotExistException;
use Illuminate\Http\JsonResponse;
use Psr\Log\LoggerInterface;

class ProductsController implements ProductsControllerInterface
{
    protected $queryService;
    protected $commandService;
    protected $logger;

    public function __construct(
        ProductsQueryServiceInterface $queryService,
        ProductsCommandServiceInterface $commandService,
        LoggerInterface $logger
    ) {
        $this->queryService = $queryService;
        $this->commandService = $commandService;
        $this->logger = $logger;
    }

    public function getProducts(): JsonResponse
    {
        $this->logger->info('GET Rest Request: Get all products.');
        $products = $this->queryService->getAllProducts();
        return response()->json($products);
    }

    public function getProduct(int $id): JsonResponse
    {
        $this->logger->info('GET Rest Request: Get product by ID {id}.', ['id' => $id]);

        try {
            $product = $this->queryService->getProductById($id);
            return response()->json($product);
        } catch (ItemDoesNotExistException $ex) {
            $this->logger->error($ex->getMessage(), ['exception' => $ex]);
            return response()->json(['error' => $ex->getMessage()], 404);
        }
    }

    public function createProduct(CreateProductRequest $request): JsonResponse
    {
        $this->logger->info('POST Rest Request: Create product.');

        try {
            $product = $this->commandService->createProduct($request->validatedDTO());
            return response()->json($product, 201);
        } catch (InvalidValueException $ex) {
            $this->logger->error($ex->getMessage(), ['exception' => $ex]);
            return response()->json(['error' => $ex->getMessage()], 400);
        }
    }

    public function updateProduct(UpdateProductRequest $request): JsonResponse
    {
        $this->logger->info('PUT Rest Request: Update product with ID {id}.', ['id' => $request->id]);

        try {
            $product = $this->commandService->updateProduct($request->validatedDTO());
            return response()->json($product);
        } catch (InvalidValueException $ex) {
            $this->logger->error($ex->getMessage(), ['exception' => $ex]);
            return response()->json(['error' => $ex->getMessage()], 400);
        } catch (ItemDoesNotExistException $ex) {
            $this->logger->error($ex->getMessage(), ['exception' => $ex]);
            return response()->json(['error' => $ex->getMessage()], 404);
        }
    }

    public function deleteProduct(int $id): JsonResponse
    {
        $this->logger->info('DELETE Rest Request: Delete product with ID {id}.', ['id' => $id]);

        try {
            $product = $this->commandService->deleteProduct($id);
            return response()->json($product);
        } catch (ItemDoesNotExistException $ex) {
            $this->logger->error($ex->getMessage(), ['exception' => $ex]);
            return response()->json(['error' => $ex->getMessage()], 404);
        }
    }
}
