<?php


namespace Modules\Usermanagement\Http\Controllers\Admin;


use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\User\Contracts\Authentication;
use Modules\User\Entities\Sentinel\User;
use Modules\User\Http\Requests\CreateUserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;
use Modules\User\Permissions\PermissionManager;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\UserRepository;

class CompanyController extends AdminBaseController
{
    /**
     * @var UserRepository
     */
    private $user;
    /**
     * @var RoleRepository
     */
    private $role;
    /**
     * @var Authentication
     */
    private $auth;

    /**
     * @param PermissionManager $permissions
     * @param UserRepository    $user
     * @param RoleRepository    $role
     * @param Authentication    $auth
     */
    public function __construct(
        PermissionManager $permissions,
        UserRepository $user,
        RoleRepository $role,
        Authentication $auth
    ) {
        parent::__construct();

        $this->permissions = $permissions;
        $this->user = $user;
        $this->role = $role;
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $companies = $this->user->all();

      return view('usermanagement::admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('usermanagement::admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = $this->mergeRequestWithPermissions($request);

        $this->user->createWithRoles($data, $request->roles, true);

        return redirect()->route('usermanagement::admin.companies.index')
            ->withSuccess(trans('core::core.messages.resource  created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return Response
     */
    public function edit(User $company)
    {
        return view('usermanagement::admin.companies.edit', compact('company'));
    }


    public function update($id, UpdateUserRequest $request)
    {
        $data = $this->mergeRequestWithPermissions($request);

        $this->user->updateAndSyncRoles($id, $data, $request->roles);

        if ($request->get('button') === 'index') {
            return redirect()->route('admin.usermanagement.company.index')
                ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('usermanagement::companies.title.companies')]));

        }

        return redirect()->route('admin.usermanagement.company.index')
            ->withFailure(trans('core::core.messages.resource updated', ['name' => trans('usermanagement::companies.title.companies')]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return Response
     */

    public function destroy($id)
    {
        $this->user->delete($id);

        return redirect()->route('admin.usermanagement.company.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('usermanagement::companies.title.companies')]));
    }
}
