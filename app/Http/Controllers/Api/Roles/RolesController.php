<?php

namespace App\Http\Controllers\Api\Roles;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\RolesResource;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends BaseController
{
    // Roles index

    public function index() {
        $roles = Roles::all();
        return $this->sendResponse(RolesResource::collection($roles), 'Roles retrieved successfully');
    }

    // Create roles
    
    public function storeRoles(Request $request) {
        $validator = Validator::make($request->all(), [
            'rolesName' => 'required|string',
        ]);
        
         // Check condition if validator fail
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $roles = Roles::create($input);
        $success['rolesName'] = $roles['rolesName'];

        return $this->sendResponse($success, 'Roles Created Successfully');
    }

    // Update roles

    public function update(Request $request, Roles $roles) {
        $input = $request->all();
        $validator = Validator::make($input, [
            'rolesName' => 'required|string'
        ]);

        // Check condition if validator fail
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        // Request is valid, update roles
        $roles->rolesName = $input['rolesName'];
        $roles->update();
        echo '<pre>';
        print_r($roles);
        echo '</pre>';
        exit;

        return $this->sendResponse(new RolesResource($roles), 'Roles updated successfully');
    }
}