<?php

namespace App\Http\Controllers\Api\Roles;

use App\Http\Controllers\Api\BaseController;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends BaseController
{
    // Roles index

    public function index() {
        $roles = Roles::get();
        return $roles;
    }

    // Create roles
    
    public function storeRoles(Request $request) {
        $validator = Validator::make($request->all(), [
            'rolesName' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $roles = Roles::create($input);
        $success['rolesName'] = $roles['rolesName'];

        return $this->sendResponse($success, 'Roles Created Successfully');
    }
}