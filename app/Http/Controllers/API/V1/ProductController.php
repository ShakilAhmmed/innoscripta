<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $products = Product::query()->get();
            $response = [
                'data' => $products,
                'status' => Response::HTTP_OK,
                'message' => 'products fetched successfully'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (Exception $exception) {
            $errorResponse = [
                'data' => [],
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $exception->getMessage()
            ];
            return response()->json($errorResponse, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function store(ProductRequest $request): JsonResponse
    {
        try {
            $product = new  Product;
            $product->fill($request->all())->save();
            $response = [
                'data' => $product,
                'status' => Response::HTTP_CREATED,
                'message' => 'product created successfully'
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (Exception $exception) {
            $errorResponse = [
                'data' => [],
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $exception->getMessage()
            ];
            return response()->json($errorResponse, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product)
    {
        try {
            $response = [
                'data' => $product->load('category'),
                'status' => Response::HTTP_OK,
                'message' => 'product fetched successfully'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (Exception $exception) {
            $errorResponse = [
                'data' => [],
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $exception->getMessage()
            ];
            return response()->json($errorResponse, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(ProductRequest $request, Product $product): JsonResponse
    {
        try {
            $product->fill($request->all())->save();
            $response = [
                'data' => $product,
                'status' => Response::HTTP_CREATED,
                'message' => 'product updated successfully'
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (Exception $exception) {
            $errorResponse = [
                'data' => [],
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $exception->getMessage()
            ];
            return response()->json($errorResponse, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            $response = [
                'data' => [],
                'status' => Response::HTTP_OK,
                'message' => 'product deleted successfully'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (Exception $exception) {
            $errorResponse = [
                'data' => [],
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $exception->getMessage()
            ];
            return response()->json($errorResponse, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
